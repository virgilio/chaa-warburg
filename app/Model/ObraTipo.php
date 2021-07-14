<?php
App::uses('AppModel', 'Model');
/**
 * ObraTipo Model
 *
 */
class ObraTipo extends AppModel {

  public $name = "ObraTipo";


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
}
