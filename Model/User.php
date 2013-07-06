<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');
/**
 * User Model
 *
 */
class User extends AppModel {

  public $name = "User";


  public $displayField = "nome";


  /**
   * Validation rules
   *
   * @var array
   */
  public $validate = 
    array(
          'nome' => array (
                 'notempty' => array(
                       'rule' => 
                       array('notempty'),
                       ),
                           ),
          'email' => array(
                'email' => array(
                      'rule' => array('email'),
                      ),
                ),
          'password' => array(
                              'required' => array(
                                                  'rule' => array('notEmpty'),
                                                  'message' => 'Insira a senha'
                                                  ),
                              'notempty' => array(
                                                  'rule' => array('notempty'),
                                                  ),
                              ),
          'password_confirm'  => array(
                                       'match' => array(
                                                        'rule' => array('matchPassword'),
                                                        'message' => 'Senhas não conferem'
                                                        )
                                       ),
          'newpassword' => array(
                                 'rule' => array('checkCurrentPassword')
                                 ),
          'checkpassword' => array(
                                 'match' => array(
                                                  'rule' => array('matchNewPassword'),
                                                  'message' => 'Senhas não conferem'
                                                  )
                                 ),
          'role' => array(
                          'allowedChoice' => array(
                                           'rule' => array('inList', array('admin', 'author', 'user')),
                                           'message' => 'Please enter a valid role',
                                           'allowEmpty' => false
                                           )
                )
          );

  public function beforeSave($options = array()) {
    if (isset($this->data[$this->alias]['password'])) {
      $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
    }
    return true;
  }


  public function matchNewPassword(){
    return $this->data['User']['newpassword'] == $this->data['User']['checkpassword'];
  }

  public function matchPassword(){    
    return $this->data['User']['password'] == $this->data['User']['password_confirm'];
  }

  public function checkCurrentPassword(){
    if(AuthComponent::password($this->data['User']['currentpassword']) == User::get('password')){
      $this->data['User']['password'] = $this->data['User']['newpassword'];
      return true;
    }
    return false;
  }

  public $hasMany = 'Obra';


  function &getInstance($user = null) {
    static $instance = array();
    
    if ($user) {
      $instance[0] =& $user;
    }
    
    if (!$instance) {
      trigger_error(__("User not set.", true), E_USER_WARNING);
      return false;
    }
    return $instance[0];
  }

  function store($user) {
    if (empty($user)) {
      return false;
    }
    User::getInstance($user);
  }

  function get($path) {
    $_user =& User::getInstance();

    $path = str_replace('.', '/', $path);
    if (strpos($path, 'User') !== 0) {
      $path = sprintf('User/%s', $path);
    }
    
    if (strpos($path, '/') !== 0) {
      $path = sprintf('/%s', $path);
    }

    $value = Set::extract($path, $_user);
        
    if (!$value) {
      return false;
    }

    return $value[0];
  }

}
