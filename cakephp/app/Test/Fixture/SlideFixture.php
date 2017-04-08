<?php
/**
 * Slide Fixture
 */
class SlideFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'branch_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'image1' => array('type' => 'binary', 'null' => true, 'default' => null),
		'image2' => array('type' => 'binary', 'null' => true, 'default' => null),
		'image3' => array('type' => 'binary', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'branch_id' => 1,
			'image1' => 'Lorem ipsum dolor sit amet',
			'image2' => 'Lorem ipsum dolor sit amet',
			'image3' => 'Lorem ipsum dolor sit amet',
			'created' => '2017-03-26 23:07:03',
			'modified' => '2017-03-26 23:07:03'
		),
	);

}
