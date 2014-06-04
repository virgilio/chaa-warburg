<?php
    class MergeShell extends AppShell {
        public $uses = array('Obra', 'Instituicao');
        public function main() {
            $this->out('Opcoes disponiveis: ');
            $this->out('instituicoes_check, instituicoes');
            $this->out('obras_check');
        }

        public function obras_check(){
            $this->out("Lista de obras sem instituicao: ");

            $limit = 20;
            $n_pages = $this->Obra->find('count') / $limit;
            
            $n = 0;
            while($n < $n_pages){
                $obras = $this->Obra->find('all', 
                        array("recursive" => 0, 
                            "page" => $n + 1, 
                            'limit' => $limit,
                            'conditions' => array(
                                'Obra.instituicao_id !=' => 0
                            )));
                foreach($obras as $obra){
                    $inst = $obra['Instituicao'];
                    if(empty($inst['id'])){
                       //$this->out(pr($obra['Instituicao']));
                        $this->out(pr($obra['Obra']));
                    }
                }
                //sleep(10);
                $n++;
            }
            $this->out("Lista de obras com instituicoes invalidas: ");
            $n = 0;
            $total = 0;
            while($n < $n_pages){
                $obras = $this->Obra->find('all', 
                        array("recursive" => 0, 
                            "page" => $n + 1, 
                            'limit' => $limit,
                            'conditions' => array(
                                'Obra.instituicao_id' => 0
                            )));
                foreach($obras as $obra){
                    $inst = $obra['Instituicao'];
                    if(empty($inst['id'])){
                        $this->out($obra['Obra']['id'] . "::" 
                                . $obra['Obra']['nome']);
                    }
                }
                $total = $total + count($obras);
                $n++;
            }
            $this->out("Total de obras com instituicao invalida: " . $total);
        }

        public function instituicoes_check(){
            $this->out("Buscando instituicoes com nomes repetidos... ");
            $repeated_query = "select id, nome, cidade_id, count(*) as c from instituicoes group by nome,cidade_id having c > 1;";
            $repeated = $this->Instituicao->query($repeated_query);
            foreach($repeated as $row){
                $inst = $row['instituicoes'];
                $c = $row[0]['c'];
                $this->out($inst['nome']);
            }
        }

        public function instituicoes (){
            $fields = array("id", "nome", "cidade_id");
            
            $params = array(
                        "fields" => $fields,
                        "recursive" => 0,
                      );
            // Query to select instituicoes with repeated names
            $repeated_query = "select id, nome, cidade_id, count(*) as c from instituicoes group by nome,cidade_id having c > 1;";
            $repeated = $this->Instituicao->query($repeated_query);
            foreach($repeated as $row){
                $inst = $row['instituicoes'];
                $c = $row[0]['c'];
                /**
                 * Com a lista de todas as Instituicoes que se repetem, eu posso
                 * pegar cada uma delas e dar merge em uma (deletar as 'irmãs')
                 * 1 - Pega as irmãs e encontra as obras que estão associadas 
                 *   a elas
                 * 2 - Pra cada obra encontrada, marca essa obra com o id da 
                 *   primeira
                 * 3 - Deleta todas as irmãs
                 */
                $this->out('Tratando instituicao: ' . $inst['nome']);
                $group_conditions = array('Instituicao.nome' => $inst['nome'], 
                        'Instituicao.cidade_id' => $inst['cidade_id']);
                $group = $this->Instituicao->find('all', 
                        array('conditions' => $group_conditions,
                                'recursive' => -1));
                $group_ids = Set::classicExtract($group, '{n}.Instituicao.id');

                $obras_conditions = array("Obra.instituicao_id" => $group_ids);
                $obras_fields = array('Obra.id', 'Instituicao.nome', 
                        'Instituicao.cidade_id', 'Instituicao.id');
                $obras = $this->Obra->find('all', 
                        array('conditions' => $obras_conditions,
                            'fields' => $obras_fields,
                            'recursive' => 0)); 
                                
                foreach ($obras as $obra){
                    $this->Obra->read(null, $obra['Obra']['id']);
                    $this->Obra->set('instituicao_id', $inst['id']);
                    $this->Obra->save();
                }
                
                $group_conditions['Instituicao.id !='] = $inst['id'];
                $this->Instituicao->deleteAll($group_conditions, false);
            }
        }
    }
?>
