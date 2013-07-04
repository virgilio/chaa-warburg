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
			throw new NotFoundException(__('Artista inválido'));
		}
		$options = array('conditions' => array('Artista.' . $this->Artista->primaryKey => $id));
		$this->set('artista', $this->Artista->find('first', $options));
	}
	public function admin_view($id = null) {
		if (!$this->Artista->exists($id)) {
			throw new NotFoundException(__('Artista inválido'));
		}
		$options = array('conditions' => array('Artista.' . $this->Artista->primaryKey => $id));
		$this->set('artista', $this->Artista->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Artista->create();
			if ($this->Artista->save($this->request->data)) {
				$this->Session->setFlash(__('O artista foi salvo!'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O artista não foi salvo. Por favor, tente novamente.'));
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
		if (!$this->Artista->exists($id)) {
			throw new NotFoundException(__('Artista inválido'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Artista->save($this->request->data)) {
				$this->Session->setFlash(__('Artista salvo'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O artista não foi salvo. Por favor, tente novamente.'));
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
	public function admin_delete($id = null) {
		$this->Artista->id = $id;
		if (!$this->Artista->exists()) {
			throw new NotFoundException(__('Artista inválido'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Artista->delete()) {
			$this->Session->setFlash(__('Artista deletado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('O artista não foi deletado'));
		$this->redirect(array('action' => 'index'));
	}
}
