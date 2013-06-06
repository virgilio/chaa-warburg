<?php
/**
 * ObraFixture
 *
 */
class ObraFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'nome' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'imagem' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'ano_inicio' => array('type' => 'integer', 'null' => false, 'default' => null),
		'ano_fim' => array('type' => 'integer', 'null' => false, 'default' => null),
		'tamanho_obra' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'descricao' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'tags' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'obra_tipos_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'instituicao_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'pais_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'cidade_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'artista_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'incerta' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'circa' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'aproximado' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'iconografia_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'nome' => 'Lorem ipsum dolor sit amet',
			'imagem' => 'Lorem ipsum dolor sit amet',
			'ano_inicio' => 1,
			'ano_fim' => 1,
			'tamanho_obra' => 'Lorem ipsum dolor sit amet',
			'descricao' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'tags' => 'Lorem ipsum dolor sit amet',
			'obra_tipos_id' => 1,
			'instituicao_id' => 1,
			'pais_id' => 1,
			'cidade_id' => 1,
			'artista_id' => 1,
			'incerta' => 1,
			'circa' => 1,
			'aproximado' => 1,
			'iconografia_id' => 1
		),
	);

}
