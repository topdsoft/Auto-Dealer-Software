<?php
class CustomersController extends AppController {

	var $name = 'Customers';

	function index($auto_id = null) {
		if ($this->Auth->user('role')>1) {
			$this->Customer->recursive = 0;
			$this->set('customers', $this->paginate());
			$this->set('role',$this->Auth->user('role'));
			$this->set('auto_id',$auto_id);
		} else {
			$this->Session->setFlash(__('You do not have access to this feature', true));
			$this->redirect(array('controller'=>'autos','action' => 'index'));
		}
	}

	function view($id = null) {
		if ($this->Auth->user('role')>1) {
			if (!$id) {
				$this->Session->setFlash(__('Invalid customer', true));
				$this->redirect(array('action' => 'index'));
			}
			$this->set('customer', $this->Customer->read(null, $id));
		} else {
			$this->Session->setFlash(__('You do not have access to this feature', true));
			$this->redirect(array('controller'=>'autos','action' => 'index'));
		}
	}

	function add($auto_id = null) {
		if ($this->Auth->user('role')>1) {
			if (!empty($this->data)) {
				$this->Customer->create();
				if ($this->Customer->save($this->data)) {
					$this->Session->setFlash(__('The customer has been saved', true));
					//check if this customer is buying a car
					if($this->data['Customer']['auto_id']) $this->redirect(array('controller' => 'sales','action' => 'add',$this->data['Customer']['auto_id'],$this->Customer->getLastInsertID()));
					else $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The customer could not be saved. Please, try again.', true));
				}
			}
		} else {
			$this->Session->setFlash(__('You do not have access to this feature', true));
			$this->redirect(array('controller'=>'autos','action' => 'index'));
		}
		$this->set('auto_id',$auto_id);
	}

	function edit($id = null) {
		if ($this->Auth->user('role')>1) {
			if (!$id && empty($this->data)) {
				$this->Session->setFlash(__('Invalid customer', true));
				$this->redirect(array('action' => 'index'));
			}
			if (!empty($this->data)) {
				if ($this->Customer->save($this->data)) {
					$this->Session->setFlash(__('The customer has been saved', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The customer could not be saved. Please, try again.', true));
				}
			}
			if (empty($this->data)) {
				$this->data = $this->Customer->read(null, $id);
			}
		} else {
			$this->Session->setFlash(__('You do not have access to this feature', true));
			$this->redirect(array('controller'=>'autos','action' => 'index'));
		}
	}

	function delete($id = null) {
		if ($this->Auth->user('role')==3) {
			if (!$id) {
				$this->Session->setFlash(__('Invalid id for customer', true));
				$this->redirect(array('action'=>'index'));
			}
			if ($this->Customer->delete($id)) {
				$this->Session->setFlash(__('Customer deleted', true));
				$this->redirect(array('action'=>'index'));
			}
			$this->Session->setFlash(__('Customer was not deleted', true));
			$this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('You do not have access to this feature', true));
			$this->redirect(array('controller'=>'autos','action' => 'index'));
		}
	}
}
?>