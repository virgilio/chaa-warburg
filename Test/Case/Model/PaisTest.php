<?php
App::uses('Pais', 'Model');

/**
 * Pais Test Case
 *
 */
class PaisTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.pais',
		'app.cidade',
		'app.instituicao',
		'app.obra',
		'app.obra_tipos',
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
		$this->Pais = ClassRegistry::init('Pais');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Pais);

		parent::tearDown();
	}

}
