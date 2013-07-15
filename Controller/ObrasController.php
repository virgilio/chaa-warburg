<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
App::uses('AuthComponent', 'Controller/Component');

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

  public $paginate = array();

  public function index($letter = null) {
    parent::searchDataLoader();

    $this->Obra->recursive = 0;
    if($letter != null){
      $this->paginate['Obra']['conditions'] = array('Obra.nome REGEXP' => '^' . $letter);
    }
    $this->paginate['Obra']['order'] = 'Artista.nome asc';
    $this->set('obras', $this->paginate());
    $obraTipos = $this->Obra->ObraTipo->find('list');
    $iconografias = $this->Obra->Iconografia->find('list');
    $this->set('obraTipos', $obraTipos);
    $this->set('iconografias', $iconografias);
  }
  
  public function admin_index() {
    $this->Obra->recursive = 0;
    $data = $this->request->query;
    $this->paginate['Obra']['order'] = 'Artista.nome asc';
    if($this->request->is('get') && !empty($data) && isset($data['Search']['filter'])){
      if('artista' == $data['Search']['filter']){
        $this->paginate = array(
                                'conditions' => array(
                                                      'Artista.id' => $data['Artista'],
                                                      )
                                );
      } else if('obra' == $data['Search']['filter']){
        $this->paginate = array(
                                'conditions' => array(
                                                      'Obra.nome LIKE' => '%' . $data['Search']['query'] . '%',
                                                      )
                                );
      }
    }
    $this->set('obras', $this->paginate());
    $this->loadModel('Artista');
    $this->set('artistas', $this->Artista->find('list'));
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
                                                                    'Obra.tags LIKE' => '%' . $query . '%',
                                                                    'Obra.ano_inicio LIKE' => '%' . $query . '%',
                                                                    'Obra.ano_fim LIKE' => '%' . $query . '%',
                                                                    'Instituicao.nome LIKE' => '%' . $query . '%',
                                                                    'Iconografia.nome LIKE' => '%' . $query . '%',
                                                                    )
                                                      ),
                                'order' => 'Artista.nome asc',
                                );
      } else if(isset($data['Search']['type']) && $data['Search']['type'] == 'advanced') {
        $query = $data['Search'];
        
        $or = array();
        $and = array();

        if(!empty($query['artista']))
          $and['Artista.nome LIKE'] = '%' . $query['artista'] . '%';
        
        if(!empty($query['obra'])){
          $and['Obra.nome LIKE'] = '%' . $query['obra'] . '%';
          $and['Obra.descricao LIKE'] = '%' . $query['obra'] . '%';
        }
        if(!empty($query['instituicao']))
          $and['Instituicao.nome LIKE'] = '%' . $query['instituicao'] . '%';
        
        /**
         *  If there is city or country setted, we add a OR search 
         *  on 'Obra.instituicao_id IN (ids)' too. To discover which ids, we should put
         *  in the conditions array, we search for instituicoes which have
         *  cidade_id that has Cidade.nome like $query['cidade'] or cidades
         *  which has Cidade.pais_id which have Pais.nome like $query['pais']
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
          $instituicaoQuery = 'Obra.instituicao_id IN (' . $this->getInstituicaoIdsQuery($cidadesQuery) . ')';
          $or = array_merge(array($instituicaoQuery), $or);
        }

        if(!empty($query['tags']))
          $and['Obra.tags LIKE'] = '%' . $query['tags'] . '%';
              
        if(!empty($data['ObraTipo']))
          $and['Obra.obra_tipos_id'] = $data['ObraTipo'];
        if(!empty($data['Iconografia']))
          $and['Obra.iconografia_id'] = $data['Iconografia'];

        if(!empty($query['inicio'])){
          $and['Obra.ano_inicio >= ?'] = array($query['inicio']);
        }

        if(!empty($query['fim'])){
          $and['Obra.ano_fim <= ?'] = array($query['fim']);
        }
        
        if(!empty($query['ano'])){
          $or['Obra.ano_fim'] = $query['ano'];
          $or['Obra.ano_inicio'] = $query['ano'];
        }

        if($letter != null){
          $and['Obra.nome REGEXP'] = '^' . $letter;
        }

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
                                                      ),
                                'order' => 'Artista.nome asc',
                                );
      } else {
        $this->Session->setFlash(__('Busca inválida'));
      }
    }

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
                                          'fields'     => array('Pais.id'),
                                          'table'      => $db->fullTableName($this->Pais),
                                          'alias'      => 'Pais',
                                          'limit'      => null,
                                          'offset'     => null,
                                          'joins'      => array(),
                                          'conditions' => $csq,
                                          'order'      => null,
                                          'group'      => null
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
                                          'fields'     => array('Cidade.id'),
                                          'table'      => $db->fullTableName($this->Cidade),
                                          'alias'      => 'Cidade',
                                          'limit'      => null,
                                          'offset'     => null,
                                          'joins'      => array(),
                                          'conditions' => array('OR' => $or),
                                          'order'      => null,
                                          'group'      => null
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
                                          'fields'     => array('Instituicao.id'),
                                          'table'      => $db->fullTableName($this->Instituicao),
                                          'alias'      => 'Instituicao',
                                          'limit'      => null,
                                          'offset'     => null,
                                          'joins'      => array(),
                                          'conditions' => $conditions,
                                          'order'      => null,
                                          'group'      => null
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
                                               )
                                );
    $this->loadModel('ObrasRelacionada');
    $this->ObrasRelacionada->Behaviors->load('Containable');
    $this->ObrasRelacionada->bindModel(array('belongsTo' => array('User', 'Obra',  'Relacionada' => array(
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
                                                                                                   )
                                                                                     ),
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
      $obra['imagem'] =  $this->processFile($data['Obra']['imagem'], $data['Thumbnail']);
      $obra['tamanho_obra'] = $data['Thumbnail']['filedim'];
      $obra['user_id'] = $this->Auth->user('id');
      $this->Obra->create();
      if ($this->Obra->save($obra)) {
        $this->Obra->Thumbnail->create();
        
        $data['Thumbnail']['obra_id'] = $this->Obra->id;
        $this->Obra->Thumbnail->save($data['Thumbnail']);
        
        $this->Session->setFlash(__('A Imagem foi salva!'));
        $this->redirect(array('action' => 'edit', $this->Obra->id));                          
      } else {
        $this->Session->setFlash(__('A obra não pode ser salva, tente novamente'));
      }
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
      if($this->request->data['Obra']['imagem']['error'] == 0){ //Nova imagem
        $this->request->data['Obra']['imagem'] =  $this->processFile($this->request->data['Obra']['imagem'], 
                                                                     $this->request->data['Thumbnail']);
        
      } else { //Mesma imagem utilizada, só cria thumb
        if(!empty($this->request->data['Thumbnail']['w'])){
          $this->Obra->id = $this->request->data['Obra']['id'];
          $this->createThumbnail((WWW_ROOT . "img/obras/" . $this->Obra->field('imagem')), 
                                 $this->request->data['Thumbnail'], 
                                 (WWW_ROOT . "img/obras/thumbs/" . $this->Obra->field('imagem')));
        }              
        unset($this->request->data['Obra']['imagem']);
      }
      
      if(!empty($this->request->data['Obra']['ano_inicio'])){
        $this->request->data['Obra']['ano_inicio'] = $this->request->data['Obra']['ano_inicio'] * $this->request->data['Obra']['ano_inicio_signal'];
      }
      if(!empty($this->request->data['Obra']['ano_fim'])){
        $this->request->data['Obra']['ano_fim'] = $this->request->data['Obra']['ano_fim'] * $this->request->data['Obra']['ano_fim_signal'];
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
        $this->Session->setFlash(__('A obra não foi salva. Por favor, tente novamente.'));
      }
    } else {
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
                                                 )
                                  );
      
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
    }
    
    $obraTipos = $this->Obra->ObraTipo->find('list');

    $this->loadModel('Pais');
    $this->loadModel('Cidade');
    $this->loadModel('Instituicao');
    $cidades = $this->Cidade->find('all', 
                                   array(
                                         'fields' => 'Cidade.id, Cidade.nome, Pais.nome',
                                         'recursive' => 1
                                         )
                                   );
    $cidades = Set::combine($cidades, '{n}.Cidade.id', array('{0} - {1}', '{n}.Cidade.nome', '{n}.Pais.nome'));
    $instituicoes = $this->Obra->Instituicao->find('all', array(
                                                                'fields' => 'Instituicao.id, Instituicao.nome, Cidade.nome',
                                                                'recursive' => 0
                                                                ));
    $instituicoes = Set::combine($instituicoes, 
                                 '{n}.Instituicao.id', 
                                 array('{0} - {1}', '{n}.Instituicao.nome', '{n}.Cidade.nome'));

    $paises = $this->Pais->find('list');    
    $artistas = $this->Obra->Artista->find('list');
    $iconografias = $this->Obra->Iconografia->find('list');
    
    $relacionadas = $this->Obra->Relacionada->find('list');


    foreach($result['Relacionada'] as $rel){
      unset($relacionadas[$rel['id']]);
    }
    
    foreach($result['Relacionada2'] as $rel){
      unset($relacionadas[$rel['id']]);
    }

    unset($relacionadas[$result['Obra']['id']]);

    $this->set(compact('obraTipos', 'instituicoes', 'paises', 'cidades', 'artistas', 'iconografias', 'relacionadas'));
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
                                          'fields'     => array('ObrasRelacionada.relacionada_id'),
                                          'table'      => $db->fullTableName($this->ObrasRelacionada),
                                          'alias'      => 'ObrasRelacionada',
                                          'limit'      => null,
                                          'offset'     => null,
                                          'joins'      => array(),
                                          'conditions' => $conditions,
                                          'order'      => null,
                                          'group'      => null
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
    $this->request->onlyAllow('post', 'delete');
    if ($this->Obra->delete()) {
      $this->Session->setFlash(__('Obra deletada'));
      $this->redirect(array('action' => 'index'));
    }
    $this->Session->setFlash(__('A obra não foi deletada'));
    $this->redirect(array('action' => 'index'));
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
      $this->createThumbnail($target_path, $thumb, $thumb_target_path);           
    } else { 
       $this->Session->setFlash(__('ObrasController::processFile() - Unable to save temp file to file system.'));
       $this->redirect(array('action' => 'index'));
    }
    return $finalFile;
  } 
        

  private function createThumbnail($sTempFileName, $thumb, $target){
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
      //            die($target);
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

  /*public function add() {
    if ($this->request->is('post')) {
    $this->Obra->create();
    if ($this->Obra->save($this->request->data)) {
    $this->Session->setFlash(__('The obra has been saved'));
    $this->redirect(array('action' => 'index'));
    } else {
    $this->Session->setFlash(__('A obra não foi salva. Por favor, tente novamente.'));
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
    $this->Session->setFlash(__('A obra não foi salva. Por favor, tente novamente.'));
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
    }*/


}
