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
        $this->Session->setFlash(__('The user has been saved'));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
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
      $this->Session->setFlash(__('Invalid username or password, try again'));
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
			throw new NotFoundException(__('Invalid user'));
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
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
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
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
