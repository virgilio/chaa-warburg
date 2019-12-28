<?php
App::uses('Obra', 'Model');

/**
 * Obra Test Case
 *
 */
class ObraTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.obra',
		'app.obra_tipos',
		'app.instituicao',
		'app.cidade',
		'app.pais',
		'app.artista',
		'app.iconografia'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Obra = ClassRegistry::init('Obra');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Obra);

		parent::tearDown();
	}

}
