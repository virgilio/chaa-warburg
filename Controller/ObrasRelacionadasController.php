<?php
App::uses('AppController', 'Controller');
/**
 * ObrasRelacionadas Controller
 *
 * @property ObrasRelacionada $ObrasRelacionada
 */
class ObrasRelacionadasController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ObrasRelacionada->recursive = 0;
		$this->set('obrasRelacionadas', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
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
	public function add() {
		if ($this->request->is('post')) {
			$this->ObrasRelacionada->create();
			if ($this->ObrasRelacionada->save($this->request->data)) {
				$this->Session->setFlash(__('The obras relacionada has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The obras relacionada could not be saved. Please, try again.'));
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
	public function delete($id = null) {
		$this->ObrasRelacionada->id = $id;
		if (!$this->ObrasRelacionada->exists()) {
			throw new NotFoundException(__('Obra relacionada inválida'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ObrasRelacionada->delete()) {
			$this->Session->setFlash(__('Obras relacionada deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Obras relacionada was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
