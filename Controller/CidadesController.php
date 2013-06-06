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
	public function index() {
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
			throw new NotFoundException(__('Invalid cidade'));
		}
		$options = array('conditions' => array('Cidade.' . $this->Cidade->primaryKey => $id));
		$this->set('cidade', $this->Cidade->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
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
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Cidade->exists($id)) {
			throw new NotFoundException(__('Invalid cidade'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Cidade->save($this->request->data)) {
				$this->Session->setFlash(__('The cidade has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cidade could not be saved. Please, try again.'));
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
	public function delete($id = null) {
		$this->Cidade->id = $id;
		if (!$this->Cidade->exists()) {
			throw new NotFoundException(__('Invalid cidade'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Cidade->delete()) {
			$this->Session->setFlash(__('Cidade deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Cidade was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
