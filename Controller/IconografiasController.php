<?php
App::uses('AppController', 'Controller');
/**
 * Iconografias Controller
 *
 * @property Iconografia $Iconografia
 */
class IconografiasController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Iconografia->recursive = 0;
		$this->set('iconografias', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Iconografia->exists($id)) {
			throw new NotFoundException(__('Invalid iconografia'));
		}
		$options = array('conditions' => array('Iconografia.' . $this->Iconografia->primaryKey => $id));
		$this->set('iconografia', $this->Iconografia->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Iconografia->create();
			if ($this->Iconografia->save($this->request->data)) {
				$this->Session->setFlash(__('The iconografia has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The iconografia could not be saved. Please, try again.'));
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
		if (!$this->Iconografia->exists($id)) {
			throw new NotFoundException(__('Invalid iconografia'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Iconografia->save($this->request->data)) {
				$this->Session->setFlash(__('The iconografia has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The iconografia could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Iconografia.' . $this->Iconografia->primaryKey => $id));
			$this->request->data = $this->Iconografia->find('first', $options);
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
		$this->Iconografia->id = $id;
		if (!$this->Iconografia->exists()) {
			throw new NotFoundException(__('Invalid iconografia'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Iconografia->delete()) {
			$this->Session->setFlash(__('Iconografia deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Iconografia was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
