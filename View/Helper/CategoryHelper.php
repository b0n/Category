<?php
App::uses('AppHelper', 'View/Helper');
/**
 * QuestionsForm Helper
 *
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @author   Toshimasa Oguni <tsmsogn@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 */
class CategoryHelper extends AppHelper {

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Html');

/**
 * nestedCategories method
 *
 * @param $categories
 * @param $options
 * @param int $depth
 * @return string
 */
	public function nestedCategories($categories, $options, $depth = 1) {
		$_options = array();
		$options = array_merge($_options, $options);

		$output = '';
		foreach ($categories as $category) {
			if ($options['link']) {
				$categoryAttr = array(
					'id' => 'category-' . $category['Category']['id'],
				);
				$categoryOutput = $this->Html->link($category['Category']['label'], array(
					'plugin' => $options['plugin'],
					'controller' => $options['controller'],
					'action' => $options['action'],
					$category['Category']['id'],
				), $categoryAttr);
			} else {
				$categoryOutput = $category['Category']['label'];
			}
			if (isset($category['children']) && count($category['children']) > 0) {
				$categoryOutput .= $this->nestedCategories($category['children'], $options, $depth + 1);
			}
			$categoryOutput = $this->Html->tag('li', $categoryOutput);
			$output .= $categoryOutput;
		}
		if ($output != null) {
			$output = $this->Html->tag($options['tag'], $output, $options['tagAttributes']);
		}

		return $output;
	}

}
