<?php
App::uses('AppController', 'Controller');
/**
 * Artistas Controller
 *
 * @property Artista $Artista
 */
class ArtistasController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Artista->recursive = 0;
		$this->set('artistas', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Artista->exists($id)) {
			throw new NotFoundException(__('Invalid artista'));
		}
		$options = array('conditions' => array('Artista.' . $this->Artista->primaryKey => $id));
		$this->set('artista', $this->Artista->find('first', $options));
	}
	public function admin_view($id = null) {
		if (!$this->Artista->exists($id)) {
			throw new NotFoundException(__('Invalid artista'));
		}
		$options = array('conditions' => array('Artista.' . $this->Artista->primaryKey => $id));
		$this->set('artista', $this->Artista->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Artista->create();
			if ($this->Artista->save($this->request->data)) {
				$this->Session->setFlash(__('The artista has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The artista could not be saved. Please, try again.'));
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
	public function edit($id = null) {
		if (!$this->Artista->exists($id)) {
			throw new NotFoundException(__('Invalid artista'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Artista->save($this->request->data)) {
				$this->Session->setFlash(__('The artista has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The artista could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Artista.' . $this->Artista->primaryKey => $id));
			$this->request->data = $this->Artista->find('first', $options);
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
		$this->Artista->id = $id;
		if (!$this->Artista->exists()) {
			throw new NotFoundException(__('Invalid artista'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Artista->delete()) {
			$this->Session->setFlash(__('Artista deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Artista was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
