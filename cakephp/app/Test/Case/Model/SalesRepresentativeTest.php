<?php
App::uses('SalesRepresentative', 'Model');

/**
 * SalesRepresentative Test Case
 */
class SalesRepresentativeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.sales_representative',
		'app.branch',
		'app.company'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SalesRepresentative = ClassRegistry::init('SalesRepresentative');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SalesRepresentative);

		parent::tearDown();
	}

}
