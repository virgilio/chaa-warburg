<?php
App::uses('Artista', 'Model');

/**
 * Artista Test Case
 *
 */
class ArtistaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.artista',
		'app.obra',
		'app.obra_tipos',
		'app.instituicao',
		'app.cidade',
		'app.pais',
		'app.iconografia'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Artista = ClassRegistry::init('Artista');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Artista);

		parent::tearDown();
	}

}
