<?php
App::uses('AppController', 'Controller');
/**
 * Obras Controller
 *
 * @property Obra $Obra
 */
class ObrasController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Obra->recursive = 0;
		$this->set('obras', $this->paginate());
	}
	public function admin_index() {
		$this->Obra->recursive = 0;
		$this->set('obras', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Obra->recursive = 2;
		if (!$this->Obra->exists($id)) {
			throw new NotFoundException(__('Invalid obra'));
		}
		$options = array('conditions' => array('Obra.' . $this->Obra->primaryKey => $id));
		$this->set('obra', $this->Obra->find('first', $options));
	}

	public function admin_view($id = null) {
		if (!$this->Obra->exists($id)) {
			throw new NotFoundException(__('Invalid obra'));
		}
		$options = array('conditions' => array('Obra.' . $this->Obra->primaryKey => $id));
		$this->set('obra', $this->Obra->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Obra->create();
			if ($this->Obra->save($this->request->data)) {
				$this->Session->setFlash(__('The obra has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The obra could not be saved. Please, try again.'));
			}
		}
		$obraTipos = $this->Obra->ObraTipo->find('list');
		$instituicoes = $this->Obra->Instituicao->find('list');
		$paises = $this->Obra->Pais->find('list');
		$cidades = $this->Obra->Cidade->find('list');
		$artistas = $this->Obra->Artista->find('list');
		$iconografias = $this->Obra->Iconografia->find('list');
		$relacionadas = $this->Obra->Relacionada->find('list');
		$this->set(compact('obraTipos', 'instituicoes', 'paises', 'cidades', 'artistas', 'iconografias', 'relacionadas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Obra->exists($id)) {
			throw new NotFoundException(__('Invalid obra'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Obra->save($this->request->data)) {
				$this->Session->setFlash(__('The obra has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The obra could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Obra.' . $this->Obra->primaryKey => $id));
			$this->request->data = $this->Obra->find('first', $options);
		}
		$obraTipos = $this->Obra->ObraTipo->find('list');
		$instituicoes = $this->Obra->Instituicao->find('list');
		$paises = $this->Obra->Pais->find('list');
		$cidades = $this->Obra->Cidade->find('list');
		$artistas = $this->Obra->Artista->find('list');
		$iconografias = $this->Obra->Iconografia->find('list');
		$relacionadas = $this->Obra->Relacionada->find('list');
		$this->set(compact('obraTipos', 'instituicoes', 'paises', 'cidades', 'artistas', 'iconografias', 'relacionadas'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Obra->id = $id;
		if (!$this->Obra->exists()) {
			throw new NotFoundException(__('Invalid obra'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Obra->delete()) {
			$this->Session->setFlash(__('Obra deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Obra was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
