<?php
class MakesController extends AppController {

	var $name = 'Makes';

	function index() {
		if ($this->Auth->user('role')==3) {
			$this->Make->recursive = 0;
			$this->paginate=array('order'=>'name');
			$this->set('makes', $this->paginate());
		} else {
			$this->Session->setFlash(__('You do not have access to this feature', true));
			$this->redirect(array('controller'=>'autos','action' => 'index'));
		}
	}

	function view($id = null) {
		if ($this->Auth->user('role')==3) {
			if (!$id) {
				$this->Session->setFlash(__('Invalid make', true));
				$this->redirect(array('action' => 'index'));
			}
			$this->set('make', $this->Make->read(null, $id));
		} else {
			$this->Session->setFlash(__('You do not have access to this feature', true));
			$this->redirect(array('controller'=>'autos','action' => 'index'));
		}
	}

	function add() {
		if ($this->Auth->user('role')==3) {
			if (!empty($this->data)) {
				$this->Make->create();
				if ($this->Make->save($this->data)) {
					$this->Session->setFlash(__('The make has been saved', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The make could not be saved. Please, try again.', true));
				}
			}
		} else {
			$this->Session->setFlash(__('You do not have access to this feature', true));
			$this->redirect(array('controller'=>'autos','action' => 'index'));
		}
	}

	function edit($id = null) {
		if ($this->Auth->user('role')==3) {
			if (!$id && empty($this->data)) {
				$this->Session->setFlash(__('Invalid make', true));
				$this->redirect(array('action' => 'index'));
			}
			if (!empty($this->data)) {
				if ($this->Make->save($this->data)) {
					$this->Session->setFlash(__('The make has been saved', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The make could not be saved. Please, try again.', true));
				}
			}
			if (empty($this->data)) {
				$this->data = $this->Make->read(null, $id);
			}
		} else {
			$this->Session->setFlash(__('You do not have access to this feature', true));
			$this->redirect(array('controller'=>'autos','action' => 'index'));
		}
	}

	function delete($id = null) {
		if ($this->Auth->user('role')==3) {
			if (!$id) {
				$this->Session->setFlash(__('Invalid id for make', true));
				$this->redirect(array('action'=>'index'));
			}
			if ($this->Make->delete($id)) {
				$this->Session->setFlash(__('Make deleted', true));
				$this->redirect(array('action'=>'index'));
			}
			$this->Session->setFlash(__('Make was not deleted', true));
			$this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('You do not have access to this feature', true));
			$this->redirect(array('controller'=>'autos','action' => 'index'));
		}
	}
}
?>