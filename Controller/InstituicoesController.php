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
      throw new NotFoundException(__('Instituição inválida'));
    }
    $options = array('conditions' => array('Instituicao.' . $this->Instituicao->primaryKey => $id));
    $this->set('instituicao', $this->Instituicao->find('first', $options));
  }

/**
 * add method
 *
 * @return void
 */
  /*public function admin_add() {
    if ($this->request->is('post')) {
      $this->Instituicao->create();
      if ($this->Instituicao->save($this->request->data)) {
        $this->Session->setFlash(__('The instituicao has been saved'));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The instituicao could not be saved. Please, try again.'));
      }
      }*/









  public function admin_add() {
    if ($this->request->is('post')) {
      $this->Instituicao->create();
      if ($this->Instituicao->save($this->request->data)) {
        $this->Session->setFlash(__('A Instituicao foi salva!'));
        if(!$this->request->is('ajax')) {
          $this->redirect(array('action' => 'index'));
        } else {
          $instituicoes = $this->Instituicao->find('all', 
                                         array(
                                               'fields' => 'Instituicao.id, Instituicao.nome, Cidade.nome',
                                               'recursive' => 1
                                               )
                                         );
          $instituicoes = Set::combine($instituicoes, '{n}.Instituicao.id', array('{0} - {1}', '{n}.Instituicao.nome', '{n}.Cidade.nome'));
          $this->set('instituicoes', $instituicoes);

          $this->set('instituicao', $this->Instituicao->id);

          $this->autoRender = false;
          $this->layout = 'ajax';
          $this->render(DS.'Elements'.DS.'select_instituicao');
        }
      } else {
        if(!$this->request->is('ajax')) {
          $this->Session->setFlash(__('A instituição não pode ser salva. Por favor, tente novamente.'));
        } else {
          $this->autoRender = false;
          $this->layout = 'ajax';
          return '{"error" : "Não foi possível adicionar instituição"}';
        }
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
			throw new NotFoundException(__('Instituição inválida'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Instituicao->save($this->request->data)) {
				$this->Session->setFlash(__('A instituição foi salva!'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('A instituição não foi salva. Por favor, tente novamente.'));
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
			throw new NotFoundException(__('Instituição inválida'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Instituicao->delete()) {
			$this->Session->setFlash(__('Instituição deletada'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('A instituição não foi deletada!'));
		$this->redirect(array('action' => 'index'));
	}
}
