<?php
App::uses('AppController', 'Controller');
/**
 * Instituicoes Controller
 *
 * @property Instituicao $Instituicao
 */
class InstituicoesController extends AppController {

/**
 * index method
 *
 * @return void
 */
  public function admin_index() {
    $this->Instituicao->recursive = 0;
    $this->set('instituicoes', $this->paginate());
  }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
  public function view($id = null) {
    if (!$this->Instituicao->exists($id)) {
      throw new NotFoundException(__('Invalid instituicao'));
    }
    $options = array('conditions' => array('Instituicao.' . $this->Instituicao->primaryKey => $id));
    $this->set('instituicao', $this->Instituicao->find('first', $options));
  }

/**
 * add method
 *
 * @return void
 */
  public function admin_add() {
    if ($this->request->is('post')) {
      $this->Instituicao->create();
      if ($this->Instituicao->save($this->request->data)) {
        $this->Session->setFlash(__('The instituicao has been saved'));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The instituicao could not be saved. Please, try again.'));
      }
    }
    $this->loadModel('Pais');
    $this->loadModel('Cidade');
    $paises = $this->Pais->find('list');
    $cidades = $this->Cidade->find('all', 
                                   array(
                                         'fields' => 'Cidade.id, Cidade.nome, Pais.nome',
                                         'recursive' => 1
                                         )
                                   );
    $cidades_list = Set::combine($cidades, '{n}.Cidade.id', array('{0} - {1}', '{n}.Cidade.nome', '{n}.Pais.nome'));
    $this->set(compact('paises'));
    $this->set('cidades', $cidades_list);
  }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Instituicao->exists($id)) {
			throw new NotFoundException(__('Invalid instituicao'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Instituicao->save($this->request->data)) {
				$this->Session->setFlash(__('The instituicao has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The instituicao could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Instituicao.' . $this->Instituicao->primaryKey => $id));
			$this->request->data = $this->Instituicao->find('first', $options);
		}
		$cidades = $this->Instituicao->Cidade->find('list');
		$this->set(compact('cidades'));

                $this->loadModel('Pais');
                $paises = $this->Pais->find('list');
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
		$this->Instituicao->id = $id;
		if (!$this->Instituicao->exists()) {
			throw new NotFoundException(__('Invalid instituicao'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Instituicao->delete()) {
			$this->Session->setFlash(__('Instituicao deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Instituicao was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
