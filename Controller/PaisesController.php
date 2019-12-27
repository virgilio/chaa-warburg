<?php
App::uses('AppController', 'Controller');
/**
 * Paises Controller
 *
 * @property Pais $Pais
 */
class PaisesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Pais->recursive = 0;
		$this->set('paises', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Pais->exists($id)) {
			throw new NotFoundException(__('País inválido'));
		}
		$options = array('conditions' => array('Pais.' . $this->Pais->primaryKey => $id));
		$this->set('pais', $this->Pais->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
          if ($this->request->is('post')) {
            $this->Pais->create();
            if ($this->Pais->save($this->request->data)) {
              $this->Flash->set(__('O país foi salvo com sucesso'));
              if(!$this->request->is('ajax')) {
                $this->redirect(array('action' => 'index'));
              } else {
                $paises = $this->Pais->find('list');
		$this->set(compact('paises'));

                $this->set('pais', $this->Pais->id);

                $this->autoRender = false;
                $this->layout = 'ajax';
               
                $this->render(DS.'Elements'.DS.'select_pais');
              }
            } else {
              if(!$this->request->is('ajax')) {
                $this->Flash->set(__('O país não pode ser salvo. Por favor, tente novamente.'));
              } else {
                $this->autoRender = false;
                $this->layout = 'ajax';
                return '{"error" : "Não foi possível adicionar o país"}';
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
		if (!$this->Pais->exists($id)) {
			throw new NotFoundException(__('País inválido'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Pais->save($this->request->data)) {
				$this->Flash->set(__('O país foi salvo com sucesso!'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->set(__('O país não pode ser salvo. Por favor, tente novamente.'));
			}
		} else {
			$options = array('conditions' => array('Pais.' . $this->Pais->primaryKey => $id));
			$this->request->data = $this->Pais->find('first', $options);
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
		$this->Pais->id = $id;
		if (!$this->Pais->exists()) {
			throw new NotFoundException(__('País inválido'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Pais->delete()) {
			$this->Flash->set(__('País deletado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Flash->set(__('O país não foi deletado.'));
		$this->redirect(array('action' => 'index'));
	}
}
