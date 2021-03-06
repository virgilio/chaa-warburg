<?php
App::uses('AppModel', 'Model');
/**
 * Pais Model
 *
 * @property Cidade $Cidade
 * @property Obra $Obra
 */
class Pais extends AppModel {

  public $name = "Pais";


  public $displayField = "nome";

/**
 * Validation rules
 *
 * @var array
 */
  public $validate = array(
    'nome' => array(
      'notempty' => array(
        'rule' => array('notblank'),
        //'message' => 'Your custom message here',
        //'allowEmpty' => false,
        //'required' => false,
        //'last' => false, // Stop validation after this rule
        //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
    ),
  );
  
  //The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
  public $hasMany = array(
    'Cidade' => array(
      'className' => 'Cidade',
      'foreignKey' => 'pais_id',
      'dependent' => false,
      'conditions' => '',
      'fields' => '',
      'order' => '',
      'limit' => '',
      'offset' => '',
      'exclusive' => '',
      'finderQuery' => '',
      'counterQuery' => ''
    )
  );
  
}
