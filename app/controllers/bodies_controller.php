<?php
class BodiesController extends AppController {

	var $name = 'Bodies';

	function index() {
		if ($this->Auth->user('role')==3) {
			$this->Body->recursive = 0;
			$this->set('bodies', $this->paginate());
		} else {
			$this->Session->setFlash(__('You do not have access to this feature', true));
			$this->redirect(array('controller'=>'autos','action' => 'index'));
		}
	}

	function view($id = null) {
		if ($this->Auth->user('role')==3) {
			if (!$id) {
				$this->Session->setFlash(__('Invalid body', true));
				$this->redirect(array('action' => 'index'));
			}
			$this->set('body', $this->Body->read(null, $id));
		} else {
			$this->Session->setFlash(__('You do not have access to this feature', true));
			$this->redirect(array('controller'=>'autos','action' => 'index'));
		}
	}

	function add() {
		if ($this->Auth->user('role')==3) {
			if (!empty($this->data)) {
				$this->Body->create();
				if ($this->Body->save($this->data)) {
					$this->Session->setFlash(__('The body has been saved', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The body could not be saved. Please, try again.', true));
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
				$this->Session->setFlash(__('Invalid body', true));
				$this->redirect(array('action' => 'index'));
			}
			if (!empty($this->data)) {
				if ($this->Body->save($this->data)) {
					$this->Session->setFlash(__('The body has been saved', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The body could not be saved. Please, try again.', true));
				}
			}
			if (empty($this->data)) {
				$this->data = $this->Body->read(null, $id);
			}
		} else {
			$this->Session->setFlash(__('You do not have access to this feature', true));
			$this->redirect(array('controller'=>'autos','action' => 'index'));
		}
	}

	function delete($id = null) {
		if ($this->Auth->user('role')==3) {
			if (!$id) {
				$this->Session->setFlash(__('Invalid id for body', true));
				$this->redirect(array('action'=>'index'));
			}
			if ($this->Body->delete($id)) {
				$this->Session->setFlash(__('Body deleted', true));
				$this->redirect(array('action'=>'index'));
			}
			$this->Session->setFlash(__('Body was not deleted', true));
			$this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('You do not have access to this feature', true));
			$this->redirect(array('controller'=>'autos','action' => 'index'));
		}
	}
}
?>