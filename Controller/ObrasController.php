<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');

/**
 * Obras Controller
 *
 * @property Obra $Obra
 */
class ObrasController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Obra->recursive = 0;
		$this->set('obras', $this->paginate());
                $obraTipos = $this->Obra->ObraTipo->find('list');
                $iconografias = $this->Obra->Iconografia->find('list');
                $this->set('obraTipos', $obraTipos);
                $this->set('iconografias', $iconografias);
	}

	public function admin_index() {
          $this->Obra->recursive = 0;
          $this->set('obras', $this->paginate());
	}



        public function search() {
          $this->Obra->recursive = 0;
          $data = $this->request->query;

          if($this->request->is('get') && !empty($data)) {
            if(isset($data['Search']['type']) && $data['Search']['type'] == 'fast'){
              $query = $data['Search']['query'];
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
                                                                          'Obra.ano_inicio LIKE' => '%' . $query . '%',
                                                                          'Obra.ano_fim LIKE' => '%' . $query . '%',
                                                                          'Instituicao.nome LIKE' => '%' . $query . '%',
                                                                          'Iconografia.nome LIKE' => '%' . $query . '%',
                                                                          )
                                                            )
                                      );
            } else if(isset($data['Search']['type']) && $data['Search']['type'] == 'advanced') {
              $query = $data['Search'];
              //die("<pre>" . print_r($data, true) . "</pre>");
              $or = array();
              if(!empty($query['artista']))
                $or['Artista.nome LIKE'] = '%' . $query['artista'] . '%';
              if(!empty($query['obra'])){
                $or['Obra.nome LIKE'] = '%' . $query['obra'] . '%';
                $or['Obra.descricao LIKE'] = '%' . $query['obra'] . '%';
              }
              if(!empty($query['instituicao']))
                $or['Instituicao.nome LIKE'] = '%' . $query['instituicao'] . '%';
              if(!empty($query['pais']))
                $or['Pais.nome LIKE'] = '%' . $query['pais'] . '%';
              if(!empty($query['cidade']))
                $or['Cidade.nome LIKE'] = '%' . $query['cidade'] . '%';
              if(!empty($query['tags']))
                $or['Obra.tags LIKE'] = '%' . $query['tags'] . '%';
              
              $and = array();
              if(!empty($data['ObraTipo']))
                $and['Obra.obra_tipos_id'] = $data['ObraTipo'];
              if(!empty($data['Iconografia']))
                $and['Obra.iconografia_id'] = $data['Iconografia'];

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
                                                            'OR' => $or,
                                                            'AND' => $and
                                                            )
                                      );
            } else {
              $this->Session->setFlash(__('Busca inválida'));
            }
          }
          $obras = $this->paginate('Obra');
          $this->set('obras', $obras);
          $obraTipos = $this->Obra->ObraTipo->find('list');
          $iconografias = $this->Obra->Iconografia->find('list');
          $this->set('obraTipos', $obraTipos);
          $this->set('iconografias', $iconografias);
        }
        

        public function advanced_search() {
          $this->Obra->recursive = 0;
          $data = $this->request->query;
          
          if($this->request->is('get') && !empty($data)) {
            //die(print_r($data, true));
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
                                                                        'Obra.nome LIKE' => '%' . $data['query'] . '%',
                                                                        'Artista.nome LIKE' => '%' . $data['query'] . '%',
                                                                        'Obra.descricao LIKE' => '%' . $data['query'] . '%',
                                                                        'Obra.ano_inicio LIKE' => '%' . $data['query'] . '%',
                                                                        'Obra.ano_fim LIKE' => '%' . $data['query'] . '%',
                                                                        'Instituicao.nome LIKE' => '%' . $data['query'] . '%',
                                                                        'Iconografia.nome LIKE' => '%' . $data['query'] . '%',
                                                                        )
                                                          )
                                    );
          }
          $obras = $this->paginate('Obra');
          $this->set('obras', $obras);
        }

        
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Obra->recursive = 2;
		if (!$this->Obra->exists($id)) {
			throw new NotFoundException(__('Obra não encontrada'));
		}
		$options = array('conditions' => array('Obra.' . $this->Obra->primaryKey => $id));
		$this->set('obra', $this->Obra->find('first', $options));
	}

	public function admin_view($id = null) {
		if (!$this->Obra->exists($id)) {
			throw new NotFoundException(__('Invalid obra'));
		}
		$options = array('conditions' => array('Obra.' . $this->Obra->primaryKey => $id));
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
            $obra['imagem'] =  $this->processFile($data['Obra']['imagem'], $data['Thumb']);
            $obra['tamanho_obra'] = $data['Thumb']['filedim'];
            $this->Obra->create();
            if ($this->Obra->save($obra)) {
              $this->Session->setFlash(__('A Imagem foi salva!'));
              $this->redirect(array('action' => 'edit', $this->Obra->id));                          
            } else {
              $this->Session->setFlash(__('A obra Obra não pode ser salva, tente novamente'));
            }
          }
        }
        
        
        private function _ext($uploaded){ 
           return strrchr($uploaded['name'],"."); 
        }
        
        
        private function processFile($uploaded, $thumb){ 
          $uploaded['name'] = strtolower(str_replace(" ", "-", $uploaded['name'])); 

                    
          $up_dir = WWW_ROOT . "img/obras"; 
          $thumb_up_dir = WWW_ROOT . "img/obras/thumbs"; 

          $target_path = $up_dir . DS . $uploaded['name']; 
          $thumb_target_path = $thumb_up_dir . DS . $uploaded['name']; 

          $temp_path = substr($target_path, 0, strlen($target_path) - strlen($this->_ext($uploaded))); //temp path without the ext 
          $thumb_temp_path = substr($thumb_target_path, 0, strlen($thumb_target_path) - strlen($this->_ext($uploaded))); //temp path without the ext 

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
            $this->createThumb($target_path, $thumb, $thumb_target_path);           
          } else { 
            //$this->_error('ObrasController::processFile() - Unable to save temp file to file system.'); 
            die('ObrasController::processFile() - Unable to save temp file to file system.'); 
          }
          return $finalFile;
        } 
        

        private function createThumb($sTempFileName, $thumb, $target){
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
            
            // copy and resize part of an image with resampling
            imagecopyresampled($vDstImg, $vImg, 
                               0, 0, 
                               (int)$thumb['x1'], (int)$thumb['y1'], 
                               (int)$thumb['w'], (int)$thumb['h'], 
                               (int)$thumb['w'], (int)$thumb['h']);
            
            // define a result image filename
            //$sResultFileName = $sTempFileName . $sExt;
            //            die($target);
            $sResultFileName = $target;
            //die($target);
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
        
	public function add() {
		if ($this->request->is('post')) {
			$this->Obra->create();
			if ($this->Obra->save($this->request->data)) {
				$this->Session->setFlash(__('The obra has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The obra could not be saved. Please, try again.'));
			}
		}
		$obraTipos = $this->Obra->ObraTipo->find('list');
                $iconografias = $this->Obra->Iconografia->find('list');
		$instituicoes = $this->Obra->Instituicao->find('list');
		$paises = $this->Obra->Pais->find('list');
		$cidades = $this->Obra->Cidade->find('list');
		$artistas = $this->Obra->Artista->find('list');
		$relacionadas = $this->Obra->Relacionada->find('list');
		$this->set(compact('obraTipos', 'instituicoes', 'paises', 'cidades', 'artistas', 'iconografias', 'relacionadas'));
	}

  public function admin_add() {
    if ($this->request->is('post')) {
      $this->Obra->create();
      if ($this->Obra->save($this->request->data)) {
        $this->Session->setFlash(__('The obra has been saved'));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The obra could not be saved. Please, try again.'));
      }
    }
    $obraTipos = $this->Obra->ObraTipo->find('list');
    $instituicoes = $this->Obra->Instituicao->find('list');
    $paises = $this->Obra->Pais->find('list');
    $cidades = $this->Obra->Cidade->find('list');
    $artistas = $this->Obra->Artista->find('list');
    $iconografias = $this->Obra->Iconografia->find('list');
    $relacionadas = $this->Obra->Relacionada->find('list');
    $this->set(compact('obraTipos', 'instituicoes', 'paises', 'cidades', 'artistas', 'iconografias', 'relacionadas'));
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
            throw new NotFoundException(__('Invalid obra'));
          }
          if ($this->request->is('post') || $this->request->is('put')) {
            //die("<pre>" . print_r($this->request->data, true) . "</pre>");
            if($this->request->data['Obra']['imagem']['error'] == 0){
              $this->request->data['Obra']['imagem'] =  $this->processFile($this->request->data['Obra']['imagem'], 
                                                                           $this->request->data['Thumb']);
            } else {
              if(!empty($this->request->data['Thumb']['w'])){
                $this->Obra->id = $this->request->data['Obra']['id'];
                //die($this->Obra->field('imagem'));
                $this->createThumb((WWW_ROOT . "img/obras/" . $this->Obra->field('imagem')), 
                                   $this->request->data['Thumb'], 
                                   (WWW_ROOT . "img/obras/thumbs/" . $this->Obra->field('imagem')));
              }              
              unset($this->request->data['Obra']['imagem']);
            }

            if ($this->Obra->save($this->request->data)) {
              $this->Session->setFlash(__('The obra has been saved'));
              $this->redirect(array('action' => 'index'));
            } else {
              $this->Session->setFlash(__('The obra could not be saved. Please, try again.'));
            }
          } else {
            $options = array('conditions' => array('Obra.' . $this->Obra->primaryKey => $id));
            $this->request->data = $this->Obra->find('first', $options);
          }
          $obraTipos = $this->Obra->ObraTipo->find('list');
          $instituicoes = $this->Obra->Instituicao->find('list');
          $paises = $this->Obra->Pais->find('list');
          $cidades = $this->Obra->Cidade->find('list');
          $artistas = $this->Obra->Artista->find('list');
          $iconografias = $this->Obra->Iconografia->find('list');
          $relacionadas = $this->Obra->Relacionada->find('list');
          $this->set(compact('obraTipos', 'instituicoes', 'paises', 'cidades', 'artistas', 'iconografias', 'relacionadas'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Obra->id = $id;
		if (!$this->Obra->exists()) {
			throw new NotFoundException(__('Invalid obra'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Obra->delete()) {
			$this->Session->setFlash(__('Obra deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Obra was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
