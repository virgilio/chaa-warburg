<?php
App::uses('ObraTipo', 'Model');

/**
 * ObraTipo Test Case
 *
 */
class ObraTipoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.obra_tipo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ObraTipo = ClassRegistry::init('ObraTipo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ObraTipo);

		parent::tearDown();
	}

}
