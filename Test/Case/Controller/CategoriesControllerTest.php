<?php
App::uses('CategoriesController', 'Category.Controller');

/**
 * CategoriesController Test Case
 *
 */
class CategoriesControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.category.category'
	);


	public function startTest() {
		$this->Category = ClassRegistry::init('Category.Category');
	}

	public function endTest() {
		unset($this->Category);
		ClassRegistry::flush();
	}

/**
 * testAdminIndex method
 *
 * @return void
 */
	public function testAdminIndex() {
		$result = $this->_testAction('/admin/category');
		$this->assertContains(1, Set::classicExtract($this->vars['categories'], '{n}.Category.id'));
		debug($result);
	}

/**
 * testAdminViewWithInvalidId method
 *
 * @return void
 */
	public function testAdminViewWithInvalidId() {
		$this->setExpectedException('NotFoundException');
		$result = $this->_testAction('/admin/category/categories/view/0');
		debug($result);
	}

/**
 * testAdminViewUno method
 *
 * @return void
 */
	public function testAdminViewUno() {
		$result = $this->_testAction('/admin/category/categories/view/1');
		$this->assertEqual(1, $this->vars['category']['Category']['id']);
		debug($result);
	}

/**
 * testAdminAddWithInvalidData method
 *
 * @return void
 */
	public function testAdminAddWithInvalidData() {
		$data = array(
			'Category' => array(
				'label' => '',
				'slug' => '',
			)
		);

		$oldCount = $this->Category->find('count');
		$result = $this->_testAction('/admin/category/categories/add', array('data' => $data));
		$newCount = $this->Category->find('count');
		$this->assertSame($oldCount, $newCount);
		debug($result);
	}

/**
 * testAdminAddUno method
 *
 * @return void
 */
	public function testAdminAddUno() {
		$data = array(
			'Category' => array(
				'label' => 'foo',
				'slug' => 'bar',
			)
		);

		$oldCount = $this->Category->find('count');
		$result = $this->_testAction('/admin/category/categories/add', array('data' => $data));
		$newCount = $this->Category->find('count');

		$this->assertSame($oldCount + 1, $newCount);
		$this->assertContains('/admin/category', $this->headers['Location']);
		debug($result);
	}

/**
 * testAdminEditInvalidId method
 *
 * @return void
 */
	public function testAdminEditInvalidId() {
		$this->setExpectedException('NotFoundException');
		$result = $this->_testAction('/admin/category/categories/edit/0');
	}

/**
 * testAdminEditWithInvalidData method
 *
 * @return void
 */
	public function testAdminEditWithInvalidData() {
		$data = array(
			'Category' => array(
				'id' => 1,
				'alias' => '',
				'slug' => '',
			)
		);

		$oldCount = $this->Category->find('count');
		$result = $this->_testAction('/admin/category/categories/edit/1', array('data' => $data));
		$newCount = $this->Category->find('count');
		$this->assertSame($oldCount, $newCount);
		debug($result);
	}

/**
 * testAdminEditUno method
 *
 * @return void
 */
	public function testAdminEditUno() {
		$data = array(
			'Category' => array(
				'id' => 1,
				'alias' => 'foo',
				'slug' => 'bar',
			)
		);

		$oldModified = $this->Category->field('modified', array('id' => 1));
		$result = $this->_testAction('/admin/category/categories/edit/1', array('data' => $data));
		$newModified = $this->Category->field('modified', array('id' => 1));

		$this->assertNotEquals($oldModified, $newModified);
		$this->assertContains('/admin/category', $this->headers['Location']);
		debug($result);
	}

/**
 * testAdminDeleteWithInvalidId method
 *
 * @return void
 */
	public function testAdminDeleteWithInvalidId() {
		$this->setExpectedException('NotFoundException');
		$result = $this->_testAction('/admin/category/categories/delete/0');
		debug($result);
	}

/**
 * testAdminDeleteWithNotAllowedMethod method
 *
 * @return void
 */
	public function testAdminDeleteWithNotAllowedMethod() {
		$this->setExpectedException('MethodNotAllowedException');
		$result = $this->_testAction('/admin/category/categories/delete/1', array('method' => 'GET'));
		debug($result);
	}

/**
 * testAdminDeleteUno method
 *
 * @return void
 */
	public function testAdminDeleteUno() {
		$oldCount = $this->Category->find('count');
		$result = $this->_testAction('/admin/category/categories/delete/1');
		$newCount = $this->Category->find('count');
		$this->assertSame($oldCount - 1, $newCount);
		debug($result);
	}

/**
 * testAdminMoveup method
 *
 * @return void
 */
	public function testAdminMoveup() {
		$this->markTestIncomplete('testAdminMoveup not implemented.');
	}

/**
 * testAdminMovedown method
 *
 * @return void
 */
	public function testAdminMovedown() {
		$this->markTestIncomplete('testAdminMovedown not implemented.');
	}

}
