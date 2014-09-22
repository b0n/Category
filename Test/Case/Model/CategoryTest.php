<?php
App::uses('Category', 'Category.Model');

/**
 * Category Test Case
 *
 */
class CategoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.category.category'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Category = ClassRegistry::init('Category.Category');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Category);

		parent::tearDown();
	}

	public function testLink() {
		$this->Category->save(array(
			'id' => 2,
			'parent_id' => 1,
			'label' => 'Lorem ipsum dolor sit amet',
			'slug' => 'cat2'
		));
		$this->Category->save(array(
			'id' => 3,
			'parent_id' => 2,
			'label' => 'Lorem ipsum dolor sit amet',
			'slug' => 'cat3'
		));
		$this->Category->save(array(
			'id' => 4,
			'parent_id' => null,
			'label' => 'Lorem ipsum dolor sit amet',
			'slug' => 'cat4'
		));

		// Test when category added
		$data = $this->Category->findById(2);
		$this->assertEqual($data['Category']['link'], '/cat1/cat2');
		$data = $this->Category->findById(3);
		$this->assertEqual($data['Category']['link'], '/cat1/cat2/cat3');
		$data = $this->Category->findById(4);
		$this->assertEqual($data['Category']['link'], '/cat4');

		// Test when parent category's slug modified
		$this->Category->save(array(
			'id' => 1,
			'slug' => 'cat1-2'
		));
		$data = $this->Category->findById(2);
		$this->assertEqual($data['Category']['link'], '/cat1-2/cat2');
		$data = $this->Category->findById(3);
		$this->assertEqual($data['Category']['link'], '/cat1-2/cat2/cat3');

		$this->markTestIncomplete('testRemoveFromTree not implemented.');
	}

}
