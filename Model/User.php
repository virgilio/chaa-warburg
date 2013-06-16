<?php
App::uses('AppModel', 'Model');
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
          'role' => array(
                'valid' => array(
                      'rule' => array('inList', array('admin', 'author')),
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


}
