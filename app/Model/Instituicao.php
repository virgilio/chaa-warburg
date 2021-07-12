<?php
App::uses('AppModel', 'Model');
/**
 * Instituicao Model
 *
 * @property Cidade $Cidade
 * @property Obra $Obra
 */
class Instituicao extends AppModel {

  public $name = "Instituicao";
  public $actsAs = array('Containable');

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
    'cidade_id' => array(
      'numeric' => array(
        'rule' => array('numeric'),
        //'message' => 'Your custom message here',
        'allowEmpty' => true,
        //'required' => false,
        //'last' => false, // Stop validation after this rule
        //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
    ),
  );
  
  //The Associations below have been created with all possible keys, those that are not needed can be removed
  
  /**
   * belongsTo associations
   *
   * @var array
   */
  public $belongsTo = array(
    'Cidade' => array(
      'className' => 'Cidade',
      'foreignKey' => 'cidade_id',
      'conditions' => '',
      'fields' => '',
      'order' => ''
    )
  );
  
  /**
   * hasMany associations
   *
   * @var array
   */
  public $hasMany = array(
    'Obra' => array(
      'className' => 'Obra',
      'foreignKey' => 'instituicao_id',
      'dependent' => true,
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
