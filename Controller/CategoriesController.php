<?php
App::uses('CategoryAppController', 'Category.Controller');
/**
 * Categories Controller
 *
 * @property Category $Category
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CategoriesController extends CategoryAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Category->recursive = 0;
		$this->paginate = array('order' => array('Category.lft' => 'ASC'));
		$this->set('categories', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
		$this->set('category', $this->Category->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Category->create();
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash(__('The category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.'));
			}
		}
		$parentCategories = $this->Category->find('list', array('fields' => array('Category.id', 'Category.label')));
		$this->set(compact('parentCategories'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash(__('The category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
			$this->request->data = $this->Category->find('first', $options);
		}
		$parentCategories = $this->Category->find('list', array('fields' => array('Category.id', 'Category.label')));
		$this->set(compact('parentCategories'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Category->delete()) {
			$this->Session->setFlash(__('The category has been deleted.'));
		} else {
			$this->Session->setFlash(__('The category could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_moveup method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_moveup($id = null, $delta = null) {
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}

		if ($delta > 0) {
			if ($this->Category->moveUp($this->Category->id, abs($delta))) {
				$this->Session->setFlash(__('Moved up successfully'));
			} else {
				$this->Session->setFlash(__('Could not move up'));
			}
		} else {
			$this->Session->setFlash(__('Please provide the number of positions the field should be moved down.'));
		}

		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_movedown method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_movedown($id = null, $delta = null) {
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}

		if ($delta > 0) {
			if ($this->Category->moveDown($this->Category->id, abs($delta))) {
				$this->Session->setFlash(__('Moved down successfully'));
			} else {
				$this->Session->setFlash(__('Could not move down'));
			}
		} else {
			$this->Session->setFlash(__('Please provide a number of positions the category should be moved up.'));
		}

		return $this->redirect(array('action' => 'index'));
	}

}
