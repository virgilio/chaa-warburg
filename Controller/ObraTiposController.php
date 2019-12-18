<?php
App::uses('AppController', 'Controller');
/**
 * ObraTipos Controller
 *
 * @property ObraTipo $ObraTipo
 */
class ObraTiposController extends AppController {

/**
 * index method
 *
 * @return void
 */
  public function index() {
    $this->ObraTipo->recursive = 0;
    $this->set('obraTipos', $this->paginate());
  }
  public function admin_index() {
    $this->ObraTipo->recursive = 0;
    $this->set('obraTipos', $this->paginate());
  }

  /**
   * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
  public function view($id = null) {
    if (!$this->ObraTipo->exists($id)) {
      throw new NotFoundException(__('Técnica inválida'));
    }
    $options = array('conditions' => array('ObraTipo.' . $this->ObraTipo->primaryKey => $id));
    $this->set('obraTipo', $this->ObraTipo->find('first', $options));
  }

  /**
   * add method
   *
   * @return void
   */

  public function admin_add() {
    if ($this->request->is('post')) {
      $this->ObraTipo->create();
      if ($this->ObraTipo->save($this->request->data)) {
        $this->Session->setFlash(__('A técnica foi salva'));
        if(!$this->request->is('ajax')) {
          $this->redirect(array('action' => 'index'));
        } else {
          $obraTipos = $this->ObraTipo->find('list');
          $this->set(compact('obraTipos'));


          
          $this->set('obratipo', $this->ObraTipo->id);

          $this->autoRender = false;
          $this->layout = 'ajax';
               
          $this->render(DS.'Elements'.DS.'select_obratipo');
        }
      } else {
        if(!$this->request->is('ajax')) {
          $this->Session->setFlash(__('A técnica não pode ser salva. Por favor, tente novamente.'));
        } else {
          $this->autoRender = false;
          $this->layout = 'ajax';
          return '{"error" : "Não foi possível adicionar técnica"}';
        }
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
    if (!$this->ObraTipo->exists($id)) {
      throw new NotFoundException(__('Técnica inválida'));
    }
    if ($this->request->is('post') || $this->request->is('put')) {
      if ($this->ObraTipo->save($this->request->data)) {
        $this->Session->setFlash(__('A técnica foi salva com sucesso!'));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('A técnica não foi salva. Por favor, tente novamente.'));
      }
    } else {
      $options = array('conditions' => array('ObraTipo.' . $this->ObraTipo->primaryKey => $id));
      $this->request->data = $this->ObraTipo->find('first', $options);
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
    $this->ObraTipo->id = $id;
    if (!$this->ObraTipo->exists()) {
      throw new NotFoundException(__('Técnica inválida'));
    }
    $this->request->allowMethod('post', 'delete');
    if ($this->ObraTipo->delete()) {
      $this->Session->setFlash(__('Técnica deletada'));
      $this->redirect(array('action' => 'index'));
    }
    $this->Session->setFlash(__('Técnica não deletada'));
    $this->redirect(array('action' => 'index'));
  }
}
