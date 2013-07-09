<?php
App::uses('AppController', 'Controller');
/**
 * ObrasRelacionadas Controller
 *
 * @property ObrasRelacionada $ObrasRelacionada
 */
class ObrasRelacionadasController extends AppController {

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 *
	public function view($id = null) {
		if (!$this->ObrasRelacionada->exists($id)) {
			throw new NotFoundException(__('Obra relacionada inválida'));
		}
		$options = array('conditions' => array('ObrasRelacionada.' . $this->ObrasRelacionada->primaryKey => $id));
		$this->set('obrasRelacionada', $this->ObrasRelacionada->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
  public function admin_add() {
    if ($this->request->is('post')) {
      $this->ObrasRelacionada->create();
      if($this->ObrasRelacionada->save($this->request->data)) {
        $obra_id = $this->request->data['ObrasRelacionada']['obra_id'];
        $relacionada_id = $this->request->data['ObrasRelacionada']['relacionada_id'];
        $this->loadModel('Obra');        
        $this->Obra->Behaviors->load('Containable');
        $obra = $this->Obra->find('first', array(
                                                 'conditions' => array('Obra.' . $this->Obra->primaryKey => $obra_id),
                                                 'contain' => array(
                                                                    'Artista' => array('fields' => array('id', 'nome')),
                                                                    ),
                                                 )
                                  );
        
        $relacionada = $this->Obra->find('first', array(
                                                        'conditions' => array('Obra.' . $this->Obra->primaryKey => $relacionada_id),
                                                        'contain' => array(
                                                                           'Artista' => array('fields' => array('id', 'nome')),
                                                                           ),
                                                        )
                                         );
        $this->set('obra', $obra);
        $this->set('relacionada', $relacionada);
        $this->set('relacao_id', $this->ObrasRelacionada->id);
        
        
        $this->autoRender = false;
        $this->layout = 'ajax';
        $this->render(DS.'Elements'.DS.'box_relacionada_ajax');       
      } else {
        $this->autoRender = false;
        $this->layout = 'ajax';
        return '{"error" : "Não foi possivel realizar o relacionamento"}';
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
    if (!$this->ObrasRelacionada->exists($id)) {
      throw new NotFoundException(__('Obra relacionada inválida'));
    }
    if ($this->request->is('post') || $this->request->is('put')) {
      if ($this->ObrasRelacionada->save($this->request->data)) {
        $this->Session->setFlash(__('The obras relacionada has been saved'));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The obras relacionada could not be saved. Please, try again.'));
      }
    } else {
      $options = array('conditions' => array('ObrasRelacionada.' . $this->ObrasRelacionada->primaryKey => $id));
      $this->request->data = $this->ObrasRelacionada->find('first', $options);
    }
  }

  /**
   * delete method
   *
   * @throws NotFoundException
   * @param string $id
   * @return void
   */
  public function admin_delete($id = null) {
    $this->ObrasRelacionada->id = $id;
    if (!$this->ObrasRelacionada->exists()) {
      throw new NotFoundException(__('Obra relacionada inválida'));
    }
    $this->request->onlyAllow('post', 'delete');
    if ($this->ObrasRelacionada->delete()) {
      //$this->Session->setFlash(__('Obras relacionada deleted'));
      //$this->redirect(array('action' => 'index'));
      $this->autoRender = false;
      return '{"result" : "success"}';       
    }
    $this->autoRender = false;
    return '{"result" : "fail"}';       
  }
}
