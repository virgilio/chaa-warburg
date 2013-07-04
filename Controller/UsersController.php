<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

  /*public function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow('logout');
    }*/


  public function admin_add() {
    if ($this->request->is('post')) {
      $this->User->create();
      if ($this->User->save($this->request->data)) {
        $this->Session->setFlash(__('Usuário salvo com sucesso'));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('Erro ao salvar, por favor tente novamente.'));
      }
    }
  }

  public function register(){
    if($this->Auth->loggedIn()){
      return $this->redirect($this->Auth->loginRedirect);
    }
    
    if ($this->request->is('post')) {
      if($this->request->data['User']['password'] != $this->request->data['User']['password_confirm']){
        $this->Session->setFlash("Problemas na confirmação de senha");
      } else {
        $this->request->data['User']['active'] = 0; 
        $this->request->data['User']['role'] = "author";
        if ($this->User->save($this->request->data)) {
          $id = $this->User->id;
          $this->request->data['User'] = array_merge($this->request->data['User'], array('id' => $id));
          $this->Auth->login($this->request->data['User']);
        }
        return $this->redirect($this->Auth->loginRedirect);
      }
    }
  }


  public function login() {
    if ($this->Auth->login()) {
      $this->redirect($this->Auth->redirect());
    } else {
      if($this->request->is('post'))
        $this->Session->setFlash(__('Senha ou usuário inválidos. Tente novamente.'));
    }
  }
  
  public function logout() {
    $this->redirect($this->Auth->logout());
  }


/**
 * index method
 *
 * @return void
 */
  public function admin_index() {
    $this->User->recursive = 0;
    $this->set('users', $this->paginate());
  }
  
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Usuário inválido'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
/*	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
	}
*/
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Usuário'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Usuário salvo com sucesso!'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Erro ao salvar usuário, por favor tente novamente'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Usuário inválido'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('Usuário deletado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('O usuário não foi deletado'));
		$this->redirect(array('action' => 'index'));
	}
}
