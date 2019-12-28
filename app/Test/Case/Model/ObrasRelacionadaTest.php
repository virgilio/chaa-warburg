<?php
App::uses('ObrasRelacionada', 'Model');

/**
 * ObrasRelacionada Test Case
 *
 */
class ObrasRelacionadaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.obras_relacionada',
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
		$this->ObrasRelacionada = ClassRegistry::init('ObrasRelacionada');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ObrasRelacionada);

		parent::tearDown();
	}

}
