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
			throw new NotFoundException(__('Invalid pais'));
		}
		$options = array('conditions' => array('Pais.' . $this->Pais->primaryKey => $id));
		$this->set('pais', $this->Pais->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Pais->create();
			if ($this->Pais->save($this->request->data)) {
				$this->Session->setFlash(__('The pais has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pais could not be saved. Please, try again.'));
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
			throw new NotFoundException(__('Invalid pais'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Pais->save($this->request->data)) {
				$this->Session->setFlash(__('The pais has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pais could not be saved. Please, try again.'));
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
	public function delete($id = null) {
		$this->Pais->id = $id;
		if (!$this->Pais->exists()) {
			throw new NotFoundException(__('Invalid pais'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Pais->delete()) {
			$this->Session->setFlash(__('Pais deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Pais was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
