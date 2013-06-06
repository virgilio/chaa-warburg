<?php
App::uses('Cidade', 'Model');

/**
 * Cidade Test Case
 *
 */
class CidadeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cidade',
		'app.pais',
		'app.obra',
		'app.obra_tipos',
		'app.instituicao',
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
		$this->Cidade = ClassRegistry::init('Cidade');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Cidade);

		parent::tearDown();
	}

}
