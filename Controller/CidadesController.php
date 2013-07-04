<?php
App::uses('AppController', 'Controller');
/**
 * Cidades Controller
 *
 * @property Cidade $Cidade
 */
class CidadesController extends AppController {

/**
 * index method
 *
 * @return void
 */
  public function admin_index() {
    $this->Cidade->recursive = 0;
    $this->set('cidades', $this->paginate());
  }
  
  /**
   * view method
   *
   * @throws NotFoundException
   * @param string $id
   * @return void
   */
  public function view($id = null) {
    if (!$this->Cidade->exists($id)) {
      throw new NotFoundException(__('Cidade inválida'));
    }
    $options = array('conditions' => array('Cidade.' . $this->Cidade->primaryKey => $id));
    $this->set('cidade', $this->Cidade->find('first', $options));
  }
  
/**
 * add method
 *
 * @return void
 */
	/*public function admin_add() {
          if ($this->request->is('post')) {
            $this->Cidade->create();
            if ($this->Cidade->save($this->request->data)) {
              $this->Session->setFlash(__('The cidade has been saved'));
              $this->redirect(array('action' => 'index'));
            } else {
              $this->Session->setFlash(__('The cidade could not be saved. Please, try again.'));
            }
          }
          $paises = $this->Cidade->Pais->find('list');
          $this->set(compact('paises'));
          }*/


  public function admin_add() {
    if ($this->request->is('post')) {
      $this->Cidade->create();
      if ($this->Cidade->save($this->request->data)) {
        $this->Session->setFlash(__('A Cidade foi salva!'));
        if(!$this->request->is('ajax')) {
          $this->redirect(array('action' => 'index'));
        } else {
          $cidades = $this->Cidade->find('all', 
                                         array(
                                               'fields' => 'Cidade.id, Cidade.nome, Pais.nome',
                                               'recursive' => 1
                                               )
                                         );
          $cidades_list = Set::combine($cidades, '{n}.Cidade.id', array('{0} - {1}', '{n}.Cidade.nome', '{n}.Pais.nome'));
          $this->set('cidades', $cidades_list);

          $this->set('cidade', $this->Cidade->id);

          $this->autoRender = false;
          $this->layout = 'ajax';
          $this->render(DS.'Elements'.DS.'select_cidade');
        }
      } else {
        if(!$this->request->is('ajax')) {
          $this->Session->setFlash(__('A cidade não pode ser salva. Por favor, tente novamente.'));
        } else {
          $this->autoRender = false;
          $this->layout = 'ajax';
          return '{"error" : "Não foi possível adicionar cidade"}';
        }
      }
    }
    $paises = $this->Cidade->Pais->find('list');
    $this->set(compact('paises'));
  }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
  public function admin_edit($id = null) {
    if (!$this->Cidade->exists($id)) {
      throw new NotFoundException(__('Cidade inválida'));
    }
    if ($this->request->is('post') || $this->request->is('put')) {
      if ($this->Cidade->save($this->request->data)) {
        $this->Session->setFlash(__('A cidade foi salva!'));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('A cidade não foi salva. Por favor, tente novamente.'));
      }
    } else {
      $options = array('conditions' => array('Cidade.' . $this->Cidade->primaryKey => $id));
      $this->request->data = $this->Cidade->find('first', $options);
    }
    $paises = $this->Cidade->Pais->find('list');
    $this->set(compact('paises'));
  }
  
/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Cidade->id = $id;
		if (!$this->Cidade->exists()) {
			throw new NotFoundException(__('Cidade inválida'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Cidade->delete()) {
			$this->Session->setFlash(__('Cidade deletada'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('A cidade não foi deletada.'));
		$this->redirect(array('action' => 'index'));
	}
}
