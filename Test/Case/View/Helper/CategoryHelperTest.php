<?php
App::uses('View', 'View');
App::uses('Helper', 'View');
App::uses('CategoryHelper', 'Category.View/Helper');

/**
 * CategoryHelper Test Case
 *
 */
class CategoryHelperTest extends CakeTestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$View = new View();
		$this->Category = new CategoryHelper($View);
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

/**
 * testNestedCategories method
 *
 * @return void
 */
	public function testNestedCategories() {
		$this->markTestIncomplete('testNestedCategories not implemented.');
	}

}
