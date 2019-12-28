<?php
App::uses('Iconografia', 'Model');

/**
 * Iconografia Test Case
 *
 */
class IconografiaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.iconografia',
		'app.obra',
		'app.obra_tipos',
		'app.instituicao',
		'app.cidade',
		'app.pais',
		'app.artista'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Iconografia = ClassRegistry::init('Iconografia');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Iconografia);

		parent::tearDown();
	}

}
