<?php
App::uses('AppModel', 'Model');
/**
 * Obra Model
 *
 * @property ObraTipos $ObraTipos
 * @property Instituicao $Instituicao
 * @property Pais $Pais
 * @property Cidade $Cidade
 * @property Artista $Artista
 * @property Iconografia $Iconografia
 */
class Obra extends AppModel {

  public $name = "Obra";


  public $displayField = "nome";


/**
 * Validation rules
 *
 * @var array
 */
  public $validate = array(
    'nome' => array(
      'rule' => 'notEmpty',
      'message' => 'Insira um Nome para obra',
    ),
    
    'imagem' => array(
      'notempty' => array(
        'rule' => array('notempty'),
        //'message' => 'Your custom message here',
        //'allowEmpty' => false,
        //'required' => false,
        //'last' => false, // Stop validation after this rule
        //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
    ),
    'tamanho_obra' => array(
      //'notempty' => array(
      //'rule' => array('notempty'),
      //'message' => 'Your custom message here',
      //'allowEmpty' => false,
      //'required' => false,
      //'last' => false, // Stop validation after this rule
      //'on' => 'create', // Limit validation to 'create' or 'update' operations
      //),
    ),
    'descricao' => array(
      //'notempty' => array(
      //'rule' => array('notempty'),
      //'message' => 'Your custom message here',
      //'allowEmpty' => false,
      //'required' => false,
      //'last' => false, // Stop validation after this rule
      //'on' => 'create', // Limit validation to 'create' or 'update' operations
      //),
    ),
    'tags' => array(
      //'notempty' => array(
      //'rule' => array('notempty'),
      //'message' => 'Your custom message here',
      //'allowEmpty' => false,
      //'required' => false,
      //'last' => false, // Stop validation after this rule
      //'on' => 'create', // Limit validation to 'create' or 'update' operations
      //),
    ),
    'obra_tipos_id' => array(
      'numeric' => array(
        'rule' => array('numeric'),
        //'message' => 'Your custom message here',
        'allowEmpty' => true,
        //'required' => false,
        //'last' => false, // Stop validation after this rule
        //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
    ),
    'instituicao_id' => array(
      'numeric' => array(
        'rule' => array('numeric'),
        //'message' => 'Your custom message here',
        'allowEmpty' => true,
        //'required' => false,
        //'last' => false, // Stop validation after this rule
        //'on' => 'create', // Limit validation to 'create' or 'update' operations
      ),
    ),
    'artista_id' => array(
      'notempty' => array(
        'rule' => array('notEmpty'),
        'allowEmpty' => false,
        'required' => true,
        'message' => "Selecione um Artista"
      ),
      'numeric' => array(
        'rule' => array('numeric'),
        'allowEmpty' => false,
        'required' => true,
      ),
    ),
    'iconografia_id' => array(
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
                            'ObraTipo' => array(
                                                'className' => 'ObraTipo',
                                                'foreignKey' => 'obra_tipos_id',
                                                'conditions' => '',
                                                'fields' => '',
                                                'order' => ''
                                                ),
                            'Instituicao' => array(
                                                   'className' => 'Instituicao',
                                                   'foreignKey' => 'instituicao_id',
                                                   'conditions' => '',
                                                   'fields' => '',
                                                   'order' => ''
                                                   ),
                            'User' => array(
                                            'className' => 'User',
                                            'foreignKey' => 'user_id',
                                            'conditions' => '',
                                            'fields' => '',
                                            'order' => ''
                                            ),
                            'Artista' => array(
                                               'className' => 'Artista',
                                               'foreignKey' => 'artista_id',
                                               'conditions' => '',
                                               'fields' => '',
                                               'order' => ''
                                               ),
                            'Iconografia' => array(
                                                   'className' => 'Iconografia',
                                                   'foreignKey' => 'iconografia_id',
                                                   'conditions' => '',
                                                   'fields' => '',
                                                   'order' => ''
                                                   )
                
                            );

  public $hasAndBelongsToMany = 
    array(
          'Relacionada' =>  array(
                                  'className'  => 'Obra',
                                  'joinTable'  => 'obras_relacionadas',
                                  'foreignKey' => 'obra_id',
                                  'associationForeignKey'  => 'relacionada_id',
                                  'unique'=> true
                                  ),
          'Relacionada2' => array(
                                  'className'  => 'Obra',
                                  'joinTable'  => 'obras_relacionadas',
                                  'foreignKey' => 'relacionada_id',
                                  'associationForeignKey'  => 'obra_id',
                                  'unique'=> true
                                  )
          );

  public $hasOne = 'Thumbnail';       
}
