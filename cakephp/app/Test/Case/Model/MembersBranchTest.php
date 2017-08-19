<?php
App::uses('MembersBranch', 'Model');

/**
 * MembersBranch Test Case
 */
class MembersBranchTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.members_branch',
		'app.branch',
		'app.company',
		'app.area',
		'app.users'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MembersBranch = ClassRegistry::init('MembersBranch');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MembersBranch);

		parent::tearDown();
	}

}
