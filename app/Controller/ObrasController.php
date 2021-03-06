<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
App::uses('AuthComponent', 'Controller/Component');
App::uses('CakeEmail', 'Network/Email');

/**
 * Obras Controller
 *
 * @property Obra $Obra
 */
class ObrasController extends AppController {

    public $paginate = array();
    public $components = array('RequestHandler');


    /**
     * index method
     *
     * @return void
     */

    public function index($letter = null) {
        parent::searchDataLoader();

        $this->Obra->recursive = 0;

        if($letter != null){
            if(isset($this->passedArgs['sort'])
                 && 'Artista.nome' == $this->passedArgs['sort']){
                $this->paginate['Obra']['conditions'] = array(
                    'Artista.nome REGEXP' => '^' . $letter);
            } else {
                $this->paginate['Obra']['conditions'] = array(
                    'Obra.nome REGEXP' => '^' . $letter);
            }
        }

        $this->Obra->Behaviors->load('Containable');

        $this->paginate['Obra']['contain'] = array('Artista');
        $this->paginate['Obra']['order'] = 'Artista.nome asc';
        $this->set('obras', $this->paginate());
        $obraTipos = $this->Obra->ObraTipo->find('list');
        $iconografias = $this->Obra->Iconografia->find('list');
        $this->set('obraTipos', $obraTipos);
        $this->set('iconografias', $iconografias);
    }

    private function fetchRelacionadas($current = null) {
        $relacionadas = $this->Obra->find('list' , array(
            'fields' => array('ObrasRelacionada.obra_id', 'ObrasRelacionada.relacionada_id', 'ObrasRelacionada.id'),
            'joins' => array(
                array(
                    'table' => 'obras_relacionadas',
                    'alias' => 'ObrasRelacionada',
                    'type' => 'LEFT',
                    'conditions' => array(
                        'or' => array(
                            'Obra.id = ObrasRelacionada.obra_id',
                            'Obra.id = ObrasRelacionada.relacionada_id'
                        )
                    )
                )
            ),
            'conditions' => array('Obra.id' => $current),
        ));
        $exclude = array();
        foreach($relacionadas as $_relacionadas){
            foreach($_relacionadas as $key => $value) {
                array_push($exclude, $key, $value);
            }
        }
        return array_unique($exclude);
    }


    public function index_filtered() {
        $this->Obra->Behaviors->load('Containable');
        $query_params =  array(
            'fields' => array(
                'Obra.id',
                'Obra.nome',
                'Artista.nome'
            ),
            'contain' => array('Artista'),
            'order' => array('Obra.nome' => 'ASC'),
            'conditions' => array()
        );
        if(isset($this->request->query['filter'])) {
            $query_params['conditions'] =  array(
                'Obra.nome like' => '%' . $this->request->query['filter'] . '%'
            );
        } else {
            $query_params['limit'] = 10;
        }
        if(isset($this->request->query['current'])){
            $exclude = $this->fetchRelacionadas($this->request->query['current']);
            $query_params['conditions']['NOT'] = array('Obra.id' => array_unique($exclude));
        }
        $obras = $this->Obra->find('list', $query_params);
        $this->set('obras', $obras);
    }

    public function admin_index() {
        $this->Obra->recursive = 0;
        $data = $this->request->query;
        $this->paginate = array();

        $this->paginate['order'] = array('Obra.nome' => 'ASC');
        if($this->request->is('get')
             && !empty($data) && isset($data['Search']['filter'])){
            if('artista' == $data['Search']['filter']){
                $this->paginate['conditions'] = array(
                    'Artista.id' => $data['Artista'],
                );
            } else if('obra' == $data['Search']['filter']){
                $this->paginate['conditions'] = array(
                    'Obra.nome LIKE' => '%' . $data['Search']['query'] . '%',
                );
            }
        }
        $this->set('obras', $this->paginate());
        $this->loadModel('Artista');
        $this->set('artistas', $this->Artista->find('list',
                    array('order' => array('Artista.nome' => 'ASC'))));
    }

    public function admin_get_imagem_by_id($id = null) {
        $this->Obra->recursive = -1;
        $imagem = $this->Obra->findById($id, array('imagem'));
        $this->autoRender = false;
        $this->layout = 'ajax';
        return json_encode($imagem['Obra']);
    }


    public function search($letter = null) {
        $this->Obra->recursive = 0;
        $data = $this->request->query;

        /**
         * When the request is made it can have:
         *
         *  1 - First letter
         *  2 - PassedArgs
         *  3 - Query string
         *
         */


        $search_url = "";
        foreach($this->passedArgs as $k => $v){
            if(is_int($k)){
                $search_url .= $v . "/";
            } else {
                $search_url .= $k . ":" . $v . "/";
            }
        }

        $search_url .=  '?' . http_build_query($this->request->query);

        $this->Session->write('SearchQuery', $search_url);

        if($this->request->is('get') && !empty($data)) {
            if(isset($data['Search']['type']) && $data['Search']['type'] == 'fast'){
                $query = $data['Search']['query'];
                $and = array();
                if($letter != null){
                    if(isset($this->passedArgs['sort'])
                         && 'Artista.nome' == $this->passedArgs['sort']){
                        $and['Artista.nome REGEXP'] = '^' . $letter;
                    } else {
                        $and['Obra.nome REGEXP'] = '^' . $letter;
                    }
                }
                $queryArray = array(
                                'pais' => $query,
                                'cidade' => $query,
                                );
                $paisQuery = $this->getPaisIdsQuery($queryArray);
                $cidadesQuery = $this->getCidadeIdsQuery($queryArray, $paisQuery);
                $this->paginate = array(
                    'fields' => array(
                        'Obra.id',
                        'Obra.nome',
                        'Obra.imagem',
                        'Artista.id',
                        'Artista.nome',
                        'Obra.ano_inicio',
                        'Obra.ano_fim'),
                    'conditions' => array(
                        'OR' => array(
                            'Artista.nome LIKE' => '%' . $query . '%',
                            'Obra.nome LIKE' => '%' . $query . '%',
                            'Obra.descricao LIKE' => '%' . $query . '%',
                            'Obra.tags LIKE' => '%' . $query . '%',
                            'Obra.ano_inicio LIKE' => '%' . $query . '%',
                            'Obra.ano_fim LIKE' => '%' . $query . '%',
                            'Instituicao.nome LIKE' => '%' . $query . '%',
                            'Iconografia.nome LIKE' => '%' . $query . '%',
                            'Instituicao.id IN (' . $this->getInstituicaoIdsQuery($cidadesQuery) . ')',

                        ),
                        'AND' => $and,
                    ),
                    'order' => 'Artista.nome asc',
                );
            } else if(isset($data['Search']['type'])
                                && $data['Search']['type'] == 'advanced') {
                $query = $data['Search'];

                $or = array();
                $and = array();

                if(!empty($query['artista']))
                    $and['Artista.nome LIKE'] = '%' . $query['artista'] . '%';


                if(!empty($query['obra'])){
                    $and[0] = '(Obra.nome LIKE \'%'
                        . $query['obra']
                        . '%\' OR Obra.descricao LIKE \'%'
                        . $query['obra'] . '%\')';
                    //$and['Obra.nome LIKE'] = '%' . $query['obra'] . '%';
                    //$and['Obra.descricao LIKE'] = '%' . $query['obra'] . '%';
                }
                if(!empty($query['instituicao']))
                    $and['Instituicao.nome LIKE'] = '%' . $query['instituicao'] . '%';

                /**
                 *
                 *  If there is city or country setted, we add a OR search
                 *  on 'Obra.instituicao_id IN (ids)' too. To discover which ids,
                 *  we should put in the conditions array, we search for instituicoes
                 *  which have cidade_id that has Cidade.nome like $query['cidade'] or
                 *  cidades which has Cidade.pais_id which have Pais.nome like
                 *  $query['pais']
                 *
                 */

                $paisQuery = "";
                if(!empty($query['pais'])){
                    //create query to select Pais.id
                    $paisQuery = $this->getPaisIdsQuery($query);
                }

                $cidadesQuery = "";
                if(!empty($paisQuery) || !empty($query['cidade'])) {
                    //create query to select Cidade.id
                    $cidadesQuery = $this->getCidadeIdsQuery($query, $paisQuery);

                    $instituicaoQuery = '';
                    $instituicaoQuery = 'Obra.instituicao_id IN ('
                        . $this->getInstituicaoIdsQuery($cidadesQuery) . ')';
                    $and = array_merge(array($instituicaoQuery), $and);
                }

                if(!empty($query['tags']))
                    $and['Obra.tags LIKE'] = '%' . $query['tags'] . '%';

                if(!empty($data['ObraTipo']))
                    $and['Obra.obra_tipos_id'] = $data['ObraTipo'];

                if(!empty($data['Iconografia']))
                    $and['Obra.iconografia_id'] = $data['Iconografia'];

                /**
                 * semdata
                 * case 0: Show only the images with no date set
                 * case 1: Show all images with or without dates
                 * if is not set, don't show images without dates
                 *
                 */

                if(!empty($query['inicio']) && empty($query['ano'])
                     && ((isset($query['semdata'])
                                && $query['semdata'] != 0)
                             || !isset($query['semdata']))){
                    $or['Obra.ano_inicio BETWEEN ? AND ?'] =
                        array(
                            $query['inicio'],
                            $query['fim'],
                        );
                }

                if(!empty($query['fim']) && empty($query['ano'])
                     && ((isset($query['semdata'])
                                && $query['semdata'] != 0)
                             || !isset($query['semdata']))){

                    $or['Obra.ano_fim BETWEEN ? AND ?'] =
                        array(
                            $query['inicio'],
                            $query['fim'],
                        );
                }

                if(!empty($query['ano'])){
                    $or['Obra.ano_fim'] = $query['ano'];
                    $or['Obra.ano_inicio'] = $query['ano'];
                } else if(isset($query['semdata'])
                                    && $query['semdata'] == 1) {
                    $or['Obra.ano_fim'] = NULL;
                } else if(isset($query['semdata'])
                                    && $query['semdata'] == 0){
                    $and['Obra.ano_fim'] = NULL;
                }

                if($letter != null){
                    if(isset($this->passedArgs['sort'])
                         && 'Artista.nome' == $this->passedArgs['sort']){
                        $and['Artista.nome REGEXP'] = '^' . $letter;
                    } else {
                        $and['Obra.nome REGEXP'] = '^' . $letter;
                    }
                }

                $this->paginate['Obra'] = array(
                    'fields' => array(
                        'Obra.id',
                        'Obra.nome',
                        'Obra.imagem',
                        'Artista.id',
                        'Artista.nome',
                        'Obra.ano_inicio',
                        'Obra.ano_fim'),
                    'conditions' => array(
                        'AND' => $and,
                        'OR' => $or,
                    ),
                    'order' => 'Artista.nome desc',
                );
            } else {
                $this->Flash->set(__('Busca inválida'));
            }
        }

        //pr($data);
        $this->set('data', $data);
        parent::searchDataLoader();

        $obras = $this->paginate('Obra');
        $this->set('obras', $obras);
        $obraTipos = $this->Obra->ObraTipo->find('list');
        $iconografias = $this->Obra->Iconografia->find('list');
        $this->set('obraTipos', $obraTipos);
        $this->set('iconografias', $iconografias);
    }

    private function getPaisIdsQuery($query) {
        $this->loadModel('Pais');
        $csq['Pais.nome LIKE'] = '%' . $query['pais'] . '%';

        $db = $this->Pais->getDataSource();
        $subQuery = $db->buildStatement(
            array(
                'fields'         => array('Pais.id'),
                'table'          => $db->fullTableName($this->Pais),
                'alias'          => 'Pais',
                'limit'          => null,
                'offset'         => null,
                'joins'          => array(),
                'conditions' => $csq,
                'order'          => null,
                'group'          => null
            ),
            $this->Pais);
        return $db->expression($subQuery)->value;
    }

    private function getCidadeIdsQuery($query, $paisesQuery) {
        $this->loadModel('Cidade');

        if(!empty($paisesQuery))
            $or[0] = 'Cidade.pais_id IN (' . $paisesQuery . ')';

        if(!empty($query['cidade']))
            $or['Cidade.nome LIKE'] = '%' . $query['cidade'] . '%';

        $db = $this->Cidade->getDataSource();
        $subQuery = $db->buildStatement(
            array(
                'fields'         => array('Cidade.id'),
                'table'          => $db->fullTableName($this->Cidade),
                'alias'          => 'Cidade',
                'limit'          => null,
                'offset'         => null,
                'joins'          => array(),
                'conditions' => array('OR' => $or),
                'order'          => null,
                'group'          => null
            ),
            $this->Cidade);
        return $db->expression($subQuery)->value;
    }

    private function getInstituicaoIdsQuery($cidadesQuery) {
        $this->loadModel('Instituicao');

        $conditions = 'Instituicao.cidade_id IN (' . $cidadesQuery . ')';

        $db = $this->Instituicao->getDataSource();
        $subQuery = $db->buildStatement(
            array(
                'fields'         => array('Instituicao.id'),
                'table'          => $db->fullTableName($this->Instituicao),
                'alias'          => 'Instituicao',
                'limit'          => null,
                'offset'         => null,
                'joins'          => array(),
                'conditions' => $conditions,
                'order'          => null,
                'group'          => null
            ),
            $this->Instituicao);
        return $db->expression($subQuery)->value;
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        parent::searchDataLoader();

        if (!$this->Obra->exists($id)) {
            throw new NotFoundException(__('Obra não encontrada'));
        }


        $this->Obra->Behaviors->load('Containable');

        $result = $this->Obra->find('first', array(
            'conditions' => array('Obra.' . $this->Obra->primaryKey => $id),
            'contain' => array(
                'Artista' => array('fields' => array('id', 'nome')),
                'Instituicao' => array(
                    'Cidade' => array('Pais')
                ),
                'Iconografia',
                'ObraTipo',
            ),
        ));
        $this->loadModel('ObrasRelacionada');
        $this->ObrasRelacionada->Behaviors->load('Containable');
        $this->ObrasRelacionada->bindModel(
            array('belongsTo' => array(
                'User',
                'Obra',
                'Relacionada' => array(
                    'className' => 'Obra',
                    'foreignKey' => 'relacionada_id',
                    'conditions' => '',
                    'fields' => '',
                    'order' => ''
                ),)));
        $relacionadas = $this->ObrasRelacionada->find('all', array(
            'conditions' => array('or' => array(
                'ObrasRelacionada.relacionada_id' => $id,
                'ObrasRelacionada.obra_id' => $id,
            )),
            'contain' => array(
                'User',
                'Obra' => array('Artista'),
                'Relacionada' => array('Artista'),
            ),
        ));
        $this->set('relacionadas', $relacionadas);
        $this->set('obra', $result);
    }

    public function admin_view($id = null) {
        if (!$this->Obra->exists($id)) {
            throw new NotFoundException(__('Obra inválida'));
        }
        $options = array('conditions' => array(
            'Obra.' . $this->Obra->primaryKey => $id));
        $this->set('obra', $this->Obra->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */

    public function admin_insert() {
        if ($this->request->is('post')) {
            $obra = array('nome' => '');

            $data = $this->request->data;

            $obra['nome'] =  $data['Obra']['nome'];
            $obra['artista_id'] = $data['Obra']['artista_id'];
            $obra['imagem'] = $this->processFile(
                $data['Obra']['imagem'], $data['Thumbnail']);

            $obra['tamanho_obra'] = $data['Thumbnail']['filedim'];
            $obra['user_id'] = $this->Auth->user('id');
            $this->Obra->create();
            if ($this->Obra->save($obra)) {
                /*$this->Obra->Thumbnail->create();

                $data['Thumbnail']['obra_id'] = $this->Obra->id;
                $this->Obra->Thumbnail->save($data['Thumbnail']);*/

                $this->Flash->set(__('A Imagem foi salva!'));
                if(Configure::read('debug') < 1){
                    $this->sendMail($this->Obra);
                }

                $this->redirect(array('action' => 'edit', $this->Obra->id));

            } else {
                $this->Flash->set(
                    __('A obra não pode ser salva, tente novamente'));
            }
        }
        $artistas = $this->Obra->Artista->find('list',
                array('order' => array('Artista.nome' => 'ASC')));
        $this->set(compact('artistas'));
    }

    /**
     *
     * sendMail method
     *
     * Sends mail to all users that
     * are admin users or has notification
     * level equals to 2 and the current user
     *
     */

    private function sendMail($obra){
        $this->loadModel('User');
        $this->User->recursive = -1;
        $users = $this->User->find('all',
                array(
                    'fields' => array('User.id', 'User.nome', 'User.email'),
                    'conditions' => array(
                        'OR' => array(
                            'User.role' => 'admin',
                            'User.notification_level' => 2,
                            'User.id' => $this->Auth->user('id'),
                            ),
                        'AND' => array(
                            'User.notification_level >' => 0
                            )
                        )
                    ));

        // The users are selected, now, send mail to them!
        $email = new CakeEmail();
        $email->from(array('contato@chaa-unicamp.com.br' => 'Equipe Warburg'));
        $users = Set::combine($users,
                                                    "{n}.User.email",
                                                    "{n}.User.nome",
                                                    "{n}.User.id");
        $url = Router::url(array('controller' => 'obras', 'action' => 'view', 'admin' => false, $obra->field('id')), true);
        foreach($users as $user) {
            $email->to($user);
            $email->subject('[CHAA-Warburg] Cadastro de nova obra [#' . $obra->field('id') . ']');

            $email->send("
Olá,

Foi cadastrada uma nova obra pelo usuário: " . $this->Auth->user('nome') . "

Título: " . $obra->field('nome') . "

Você pode acessá-la através do link: " . $url . "

                                 ");
        }

    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Obra->exists($id)) {
            throw new NotFoundException(__('Obra inválida'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $data = $this->request->data;
            if(!isset($this->request->data['Obra']['ante_post_quam'])) {
                $this->request->data['Obra']['ante_post_quam'] = 2;
            }
            if($this->request->data['Obra']['imagem']['error'] == 0){
                //Nova imagem
                $this->request->data['Obra']['imagem'] =
                    $this->processFile($this->request->data['Obra']['imagem'],
                                        $this->request->data['Thumbnail']);

            } else { //Mesma imagem utilizada, só cria thumb
                if(!empty($this->request->data['Thumbnail']['w'])){
                    $this->Obra->id = $this->request->data['Obra']['id'];
                    $this->createThumbnail(
                        (WWW_ROOT . "img/obras/" . $this->Obra->field('imagem')),
                        $this->request->data['Thumbnail'],
                        (WWW_ROOT
                         . "img/obras/thumbs/"
                         . $this->Obra->field('imagem')));
                }
                unset($this->request->data['Obra']['imagem']);
            }

            if(!empty($this->request->data['Obra']['ano_inicio'])){
                $this->request->data['Obra']['ano_inicio'] =
                    $this->request->data['Obra']['ano_inicio']
                    * $this->request->data['Obra']['ano_inicio_signal'];
            }
            if(!empty($this->request->data['Obra']['ano_fim'])){
                $this->request->data['Obra']['ano_fim'] =
                    $this->request->data['Obra']['ano_fim']
                    * $this->request->data['Obra']['ano_fim_signal'];
            }

            if ($this->Obra->save($this->request->data)) {
                $thumbnail = $this->Obra->Thumbnail->findByObraId($this->Obra->id);

                if(isset($thumbnail['Thumbnail'])) {
                    $this->Obra->Thumbnail->id = $thumbnail['Thumbnail']['id'];
                }

                $data['Thumbnail']['obra_id'] = $this->Obra->id;
                if($this->Obra->Thumbnail->save($data['Thumbnail'])){

                }

                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->set(
                    __('A obra não foi salva. Por favor, tente novamente.'));
                return;
            }
        } //else {

        $this->Obra->Behaviors->load('Containable');
        $result = $this->Obra->find('first', array(
            'conditions' => array('Obra.' . $this->Obra->primaryKey => $id),
            'contain' => array(
                'Artista' => array('fields' => array('id', 'nome')),
                'Instituicao' => array(
                    'Cidade' => array('Pais')
                ),
                'Iconografia',
                'ObraTipo',
                'Thumbnail',
                'Relacionada' => array(
                    'Artista' => array('id', 'nome'),
                ),
                'Relacionada2' => array(
                    'Artista' => array('id', 'nome'),
                ),
            ),
        ));

        if(!empty($result['Obra']['ano_inicio'])){
            if($result['Obra']['ano_inicio'] == 0) {
                $result['Obra']['ano_inicio_signal'] = 0;
            } else if($result['Obra']['ano_inicio'] < 0){
                $result['Obra']['ano_inicio_signal'] = -1;
                $result['Obra']['ano_inicio'] = -1 * $result['Obra']['ano_inicio'];
            } else {
                $result['Obra']['ano_inicio_signal'] = 1;
            }
        }

        if(!empty($result['Obra']['ano_fim'])){
            if($result['Obra']['ano_fim'] == 0) {
                $result['Obra']['ano_fim_signal'] = 0;
            } else if($result['Obra']['ano_fim'] < 0){
                $result['Obra']['ano_fim_signal'] = -1;
                $result['Obra']['ano_fim'] = -1 * $result['Obra']['ano_fim'];
            } else {
                $result['Obra']['ano_fim_signal'] = 1;
            }
        }
        $this->request->data = $result;

        if($result['Obra']['ante_post_quam'])
            //die(pr($result));

        $obraTipos = $this->Obra->ObraTipo->find('list',
                array('order' => array('ObraTipo.nome' => 'ASC')));

        $this->loadModel('Pais');
        $this->loadModel('Cidade');
        $this->loadModel('Instituicao');
        $this->loadModel('User');

        $cidades = $this->Cidade->find(
            'all',
            array(
                'fields' => 'Cidade.id, Cidade.nome, Pais.nome',
                'recursive' => 0,
                'order' => array('Cidade.nome' => 'ASC'),
            )
        );
        $cidades = Set::combine($cidades,
                '{n}.Cidade.id',
                array(
                    '{0} - {1}',
                    '{n}.Cidade.nome',
                    '{n}.Pais.nome'));

        $instituicoes = $this->Obra->Instituicao->find('all', array(
                    'fields' => 'Instituicao.id, Instituicao.nome, Cidade.nome',
                    'recursive' => 0,
                    'order' => array('Instituicao.nome' => 'ASC'),
        ));
        $instituicoes = Set::combine($instituicoes,
                '{n}.Instituicao.id',
                array(
                    '{0} - {1}',
                    '{n}.Instituicao.nome',
                    '{n}.Cidade.nome'));

        $paises = $this->Pais->find('list',
                array('order' => array('Pais.nome' => 'ASC')));
        $artistas = $this->Obra->Artista->find('list',
                array('order' => array('Artista.nome' => 'ASC')));
        $iconografias = $this->Obra->Iconografia->find('list',
                array('order' => array('Iconografia.nome' => 'ASC')));

        $users = $this->User->find('list');

        // $this->Obra->Relacionada->Behaviors->load('Containable');
        // $relacionadas = $this->Obra->Relacionada->find('list', array(
        //     'fields' => array(
        //         'Relacionada.id',
        //         'Relacionada.nome',
        //         'Artista.nome'
        //     ),
        //     'contain' => array('Artista'),
        //     'order' => array('Relacionada.nome' => 'ASC'),
        //     'limit' => 10
        // ));

        // foreach($result['Relacionada'] as $rel){
        //     unset($relacionadas[$rel['id']]);
        // }

        // foreach($result['Relacionada2'] as $rel){
        //     unset($relacionadas[$rel['id']]);
        // }

        // unset($relacionadas[$result['Obra']['id']]);
        $relacionadas = array();
        $this->set(compact('obraTipos', 'instituicoes', 'paises', 'cidades',
                    'artistas', 'iconografias', 'relacionadas', 'users'));

    }

    /**
     * Getting the ids of all Relacionadas of a Obra
     * given its ID
     */

    private function getRelacionadasIdsQuery($id) {
        $this->loadModel('ObrasRelacionada');

        $conditions = array('ObrasRelacionada.obra_id' => $id);

        $db = $this->ObrasRelacionada->getDataSource();
        $subQuery = $db->buildStatement(
                array(
                    'fields'         => array('ObrasRelacionada.relacionada_id'),
                    'table'          => $db->fullTableName($this->ObrasRelacionada),
                    'alias'          => 'ObrasRelacionada',
                    'limit'          => null,
                    'offset'         => null,
                    'joins'          => array(),
                    'conditions' => $conditions,
                    'order'          => null,
                    'group'          => null
                    ),
                $this->ObrasRelacionada);
        return $db->expression($subQuery)->value;
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Obra->id = $id;
        if (!$this->Obra->exists()) {
            throw new NotFoundException(__('Obra inválida'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Obra->delete()) {
            $this->Flash->set(__('Obra deletada'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Flash->set(__('A obra não foi deletada'));
        $this->redirect(array('action' => 'index'));
    }


    private function _ext($uploaded){
        return strrchr($uploaded['name'],".");
    }

    private function processFile($uploaded, $thumb){
        $uploaded['name'] = strtolower(str_replace(" ", "-", $uploaded['name']));


        $up_dir = WWW_ROOT . "img/obras";
        $thumb_up_dir = WWW_ROOT . "img/obras/mini";

        $target_path = $up_dir . DS . $uploaded['name'];
        $thumb_target_path = $thumb_up_dir . DS . $uploaded['name'];

        //temp path without the ext
        $temp_path = substr($target_path, 0,
            strlen($target_path) - strlen($this->_ext($uploaded)));
        //temp path without the ext
        $thumb_temp_path = substr($thumb_target_path, 0,
            strlen($thumb_target_path) - strlen($this->_ext($uploaded)));

        $i = 1;
        while(file_exists($target_path)){
            $target_path = $temp_path . "-" . $i . $this->_ext($uploaded);
            $thumb_target_path = $thumb_temp_path . "-" . $i .
                $this->_ext($uploaded);
            $i++;
        }

        $save_data = array();

        if(move_uploaded_file($uploaded['tmp_name'], $target_path)){
            //Final File Name
            $finalFile = basename($target_path);
            @chmod($target_path, 0644);
            $this->createThumbnail($target_path, $thumb, $thumb_target_path);
        } else {
             $this->Flash->set(__('ObrasController::processFile() - Unable to save temp file to file system.'));
             $this->redirect(array('action' => 'index'));
        }
        return $finalFile;
    }

    /**
    * this function is deprecated
    */
    private function oldProcessFile($uploaded, $thumb){
        $uploaded['name'] = strtolower(str_replace(" ", "-", $uploaded['name']));


        $up_dir = WWW_ROOT . "img/obras";
        $thumb_up_dir = WWW_ROOT . "img/obras/thumbs";

        $target_path = $up_dir . DS . $uploaded['name'];
        $thumb_target_path = $thumb_up_dir . DS . $uploaded['name'];

        //temp path without the ext
        $temp_path = substr($target_path, 0, strlen($target_path) -
            strlen($this->_ext($uploaded)));

        //temp path without the ext
        $thumb_temp_path = substr($thumb_target_path, 0,
            strlen($thumb_target_path) - strlen($this->_ext($uploaded)));

        $i = 1;
        while(file_exists($target_path)){
            $target_path = $temp_path . "-" . $i . $this->_ext($uploaded);
            $thumb_target_path = $thumb_temp_path . "-" . $i . $this->_ext($uploaded);
            $i++;
        }

        $save_data = array();

        if(move_uploaded_file($uploaded['tmp_name'], $target_path)){
            //Final File Name
            $finalFile = basename($target_path);
            @chmod($target_path, 0644);
            $this->createThumbnail($target_path, $thumb, $thumb_target_path);
        } else {
             $this->Flash->set(__('ObrasController::processFile() - Unable to save temp file to file system.'));
             $this->redirect(array('action' => 'index'));
        }
        return $finalFile;
    }

    private function createThumbnail($sTempFileName, $thumb, $target){
        if (file_exists($sTempFileName) && filesize($sTempFileName) > 0) {

            list($width, $height, $type) = getimagesize($sTempFileName);

            // check for image type
            switch($type) {
            case IMAGETYPE_JPEG:
                $sExt = '.jpg';
                $vImg = imagecreatefromjpeg($sTempFileName);
                break;
            case IMAGETYPE_GIF:
                $sExt = '.gif';
                $vImg = @imagecreatefromgif($sTempFileName);
                break;
            case IMAGETYPE_PNG:
                $sExt = '.png';
                $vImg = imagecreatefrompng($sTempFileName);
                break;
            default:
                return;
            }

            // Get the
            $thumb['w'] = MINI_IMAGE_WIDTH;
            $thumb['h'] = $height * MINI_IMAGE_WIDTH / $width;
            // create a new true color image
            $vDstImg = imagecreatetruecolor((int)$thumb['w'], (int)$thumb['h']);
            if(!$vDstImg) return false;

            // copy and resize part of an image with resampling
            /*
                imagecopyresampled ($dst_image, $src_image,
                $dst_x, $dst_y,
                $src_x, $src_y,
                $dst_w, $dst_h,
                $src_w, $src_h )
            */

            imagecopyresampled($vDstImg, $vImg,
                    0, 0, 0, 0,
                    (int)$thumb['w'], (int)$thumb['h'],
                    $width, $height);

            // define a result image filename
            //$sResultFileName = $sTempFileName . $sExt;
            //                      die($target);
            $sResultFileName = $target;

            // output image to file
            if('.jpg' === $sExt) {
                $iJpgQuality = 90;
                imagejpeg($vDstImg, $sResultFileName, $iJpgQuality);
                //@unlink($sTempFileName);
            } else {
                imagepng($vDstImg, $sResultFileName);
            }
        }
    }

    /**
    * this function is deprecated
    */

    private function oldCreateThumbnail($sTempFileName, $thumb, $target){
        if (file_exists($sTempFileName) && filesize($sTempFileName) > 0) {
            $aSize = getimagesize($sTempFileName); // try to obtain image info
            if (!$aSize) {
                //@unlink($sTempFileName);
                return;
            }

            // check for image type
            switch($aSize[2]) {
            case IMAGETYPE_JPEG:
                $sExt = '.jpg';
                $vImg = imagecreatefromjpeg($sTempFileName);
                break;
            case IMAGETYPE_GIF:
                $sExt = '.gif';
                $vImg = @imagecreatefromgif($sTempFileName);
                break;
            case IMAGETYPE_PNG:
                $sExt = '.png';
                $vImg = imagecreatefrompng($sTempFileName);
                break;
            default:
                return;
            }

            // create a new true color image
            $vDstImg = imagecreatetruecolor((int)$thumb['w'], (int)$thumb['h']);
            if(!$vDstImg) return false;

            // copy and resize part of an image with resampling
            /*
                imagecopyresampled ($dst_image, $src_image,
                $dst_x, $dst_y,
                $src_x, $src_y,
                $dst_w, $dst_h,
                $src_w, $src_h )
            */

            imagecopyresampled($vDstImg, $vImg,
                    0, 0,
                    (int)$thumb['x1'], (int)$thumb['y1'],
                    (int)$thumb['w'], (int)$thumb['h'],
                    (int)$thumb['w'], (int)$thumb['h']);

            // define a result image filename
            //$sResultFileName = $sTempFileName . $sExt;
            //                      die($target);
            $sResultFileName = $target;

            // output image to file
            if('.jpg' === $sExt) {
                $iJpgQuality = 90;
                imagejpeg($vDstImg, $sResultFileName, $iJpgQuality);
                //@unlink($sTempFileName);
            } else {
                imagepng($vDstImg, $sResultFileName);
            }
        }
    }
}
