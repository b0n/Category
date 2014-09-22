<?php
class AllTestsTest extends PHPUnit_Framework_TestSuite {

/**
 * suite
 *
 * @return CakeTestSuite
 */
	public static function suite() {
		$suite = new CakeTestSuite('All Category tests');
		$suite->addTestDirectoryRecursive(CakePlugin::path('Category') . 'Test' . DS . 'Case' . DS);
		return $suite;
	}

}
