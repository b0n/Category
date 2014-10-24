<?php
App::uses('CategoryAppModel', 'Category.Model');
/**
 * Category Model
 *
 */
class Category extends CategoryAppModel {

/**
 * Behabior
 *
 * @var array
 */
	public $actsAs = array('Tree');

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'label' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'カテゴリ名を入力してください',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'slug' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'スラッグを入力してください',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'alphaNumeric' => array(
				'rule' => array('custom', '/^[a-z0-9_-]+$/'),
				'message' => 'スラッグを半角英数字,_,-で入力してください',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'isUnique' => array(
				'rule' => 'isUnique',
				'message' => 'そのスラッグは使用されています',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	public function beforeSave($options = array()) {
		return true;
	}

/**
 * @param bool $created
 * @param array $options
 */
	public function afterSave($created, $options = array()) {
		$this->__updateLink($this->id);
		$children = $this->children($this->id);
		if (!empty($children)) {
			foreach ($children as $child) {
				$this->__updateLink($child[$this->alias][$this->primaryKey]);
			}
		}
	}

/**
 * @param null $id
 * @return bool
 */
	private function __updateLink($id = null) {
		if ($id === null) {
			$id = $this->getID();
		}
		if ($id === false) {
			return false;
		}

		$data = $this->read(null, $id);

		$parentNode = $this->getParentNode($id);
		$link = '';
		if (!empty($parentNode)) {
			$link .= $parentNode[$this->alias]['link'];
		}

		$link .= '/' . $data[$this->alias]['slug'];

		$this->save(array(
			'link' => $link
		), array('callbacks' => false));
	}

}
