<?php
App::uses('AppController', 'Controller');
App::uses('AuthComponent', 'Controller/Component');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

    public function register(){
        if($this->Auth->loggedIn()){
            return $this->redirect($this->Auth->loginRedirect);
        }

        if ($this->request->is('post')) {
            if($this->request->data['User']['password'] != $this->request->data['User']['password_confirm']){
                $this->Flash->set("Problemas na confirmação de senha");
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

    public function admin_register(){
        if ($this->request->is('post')) {
            if($this->request->data['User']['password'] != $this->request->data['User']['password_confirm']){
                $this->Flash->set("Problemas na confirmação de senha");
            } else {
                //$this->request->data['User']['active'] = 0; 
                //$this->request->data['User']['role'] = "author";
                $this->User->create();
                if ($this->User->save($this->request->data)) {
                    $id = $this->User->id;
                    $this->request->data['User'] = array_merge($this->request->data['User'], array('id' => $id));
                    //$this->Auth->login($this->request->data['User']);
                } else {
                    $this->Flash->set("Problemas ao inserir usuário");
                    return;
                }
                return $this->redirect(array("action" => "edit", $id));
            }
        }
    }

    public function login() {
        if ($this->Auth->login()) {
            $this->redirect($this->Auth->loginRedirect);
        } else {
            if($this->request->is('post'))
                $this->Flash->set(__('Senha ou usuário inválidos. Tente novamente.'));
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
    public function admin_view($id = null) {
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
        $this->Flash->set(__('The user has been saved'));
        $this->redirect(array('action' => 'index'));
        } else {
        $this->Flash->set(__('The user could not be saved. Please, try again.'));
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
    public $paginate = array(
            'Obra' => array(
                'limit' => 25,
                'recursive'=> 0
                )
            );
    public function admin_edit($id = null) {
        if (!$this->User->hasAny(array('User.id' => $id))) {
            $this->Flash->set(__('Usuário não encontrado'));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if(empty($this->request->data['User']['password']) || 
                    empty($this->request->data['User']['password_confirm'])){
                unset($this->request->data['User']['password']);
                unset($this->request->data['User']['password_confirm']);
            }

            $this->User->id = $this->request->data['User']['id'];
            if($this->User->save($this->request->data)) {
                $this->Flash->set(__('Usuário salvo com sucesso!'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->set(__('Erro ao salvar usuário, por favor tente novamente'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id), 'recursive' => 0);
            $this->request->data = $this->User->find('first', $options);
            $this->paginate['Obra']['conditions'] = array('Obra.user_id' => $id);

            $obras = $this->paginate('Obra');
            $this->set(compact('obras'));
        }
    }

    public function admin_perfil() {
        $id = $this->Auth->user('id');

        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Usuário'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            if(!empty($this->request->data['User']['password']) &&
                    !empty($this->request->data['User']['newpassword']) &&
                    !empty($this->request->data['User']['checkpassword'])) {
                $pass = AuthComponent::password($this->request->data['User']['password']);
                $passCheck = $this->Auth->user('password');
                //pr($this->Auth->user());
                //pr(array($pass, $passCheck));
            }
            unset($this->request->data['User']['password']);
            if ($this->User->save($this->request->data)) {
                $this->Flash->set(__('Usuário salvo com sucesso!'));
            } else {
                $this->Flash->set(__('Erro ao salvar usuário, por favor tente novamente'));
            }
        } 

        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id), 'recursive' => 0);
        $this->request->data = $this->User->find('first', $options);
        $this->paginate['Obra']['conditions'] = array('Obra.user_id' => $id);

        $obras = $this->paginate('Obra');
        $this->set(compact('obras'));
    }


    public function admin_change_password (){
        if (!empty($this->data)) {
            //$this->User->id = $this->Auth->user('id');
            if ($this->User->save($this->data)) {
                $this->Flash->set(__('Senha alterada com sucesso'));
                $this->redirect(array('action' => 'perfil'));
            } else {
                $this->Flash->set(__('Erro ao alterar senha, favor tente novamente'));
                $this->redirect(array('action' => 'perfil'));        
            }
        } else {
            $this->data = $this->User->findById($this->Auth->user('id'));
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
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuário inválido'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->User->delete()) {
            $this->Flash->set(__('Usuário deletado'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Flash->set(__('O usuário não foi deletado'));
        $this->redirect(array('action' => 'index'));
    }
}
