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
      $this->request->data['ObrasRelacionada']['user_id'] = $this->Auth->user('id');
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
        $this->set('relacao_descricao', $this->request->data['ObrasRelacionada']['descricao']);
        $this->set('relacao_user_id', $this->ObrasRelacionada->field('user_id'));

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
  public function admin_edit() {
    if ($this->request->is('post') || $this->request->is('put')) {
      $data = $this->request->data;
      if (!$this->ObrasRelacionada->exists($data['ObrasRelacionada']['id'])) {
        $this->autoRender = false;
        $this->layout = 'ajax';
        return '{"error" : "Relacionamento não encontrado"}';
      }
      if ($this->ObrasRelacionada->save($this->request->data)) {
        $this->autoRender = false;
        $this->layout = 'ajax';
        
        return '{"success" : "Descrição atualizada", "descricao" : "' . $data['ObrasRelacionada']['descricao'] . '"}';
      } else {
        $this->autoRender = false;
        $this->layout = 'ajax';
        return '{"error" : "Erro ao atualizar a descrição"}';
      }
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
    $this->request->allowMethod('post', 'delete');
    if ($this->ObrasRelacionada->delete()) {
      //$this->Flash->set(__('Obras relacionada deleted'));
      //$this->redirect(array('action' => 'index'));
      $this->autoRender = false;
      return '{"result" : "success"}';       
    }
    $this->autoRender = false;
    return '{"result" : "fail"}';       
  }
}
