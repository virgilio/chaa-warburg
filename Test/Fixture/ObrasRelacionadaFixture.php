<?php
/**
 * ObrasRelacionadaFixture
 *
 */
class ObrasRelacionadaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'obra_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'relacionada_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'obra_id' => 1,
			'relacionada_id' => 1,
			'created' => '2013-06-06 11:09:47',
			'modified' => '2013-06-06 11:09:47'
		),
	);

}
