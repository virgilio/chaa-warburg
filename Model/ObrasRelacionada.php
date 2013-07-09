<?php
App::uses('AppModel', 'Model');
/**
 * ObrasRelacionada Model
 *
 * @property Obra $Obra
 * @property Relacionada $Relacionada
 */
class ObrasRelacionada extends AppModel {

  public $name = "ObrasRelacionada";

  /**
   * Validation rules
   *
   * @var array
   */
  public $validate = array(
                           'obra_id' => array(
                                              'numeric' => array(
                                                                 'rule' => array('numeric'),
                                                                 //'message' => 'Your custom message here',
                                                                 //'allowEmpty' => false,
                                                                 //'required' => false,
                                                                 //'last' => false, // Stop validation after this rule
                                                                 //'on' => 'create', // Limit validation to 'create' or 'update' operations
                                                                 ),
		),
                           'relacionada_id' => array(
                                                     'numeric' => array(
                                                                        'rule' => array('numeric'),
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
   * belongsTo associations
   *
   * @var array
   */
  public $belongsTo = 
    array(
          'Obra' => array(
                          'className' => 'Obra',
                          'foreignKey' => 'obras_id',
                          'conditions' => '',
                          'fields' => '',
                          'order' => ''
                          ),
          'Relacionada' => array(
                                 'className' => 'Obra',
                                 'foreignKey' => 'relacionada_id',
                                 'conditions' => '',
                                 'fields' => '',
                                 'order' => ''
                                 )
          );
}
