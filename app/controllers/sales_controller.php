<?php
class SalesController extends AppController {

	var $name = 'Sales';

	function index() {
		if ($this->Auth->user('role')>1) {
			$this->Sale->recursive = 0;
			//only managers get to see all sales, sulespeople see only theirs
			if ($this->Auth->user('role')==2) $this->paginate=array('conditions'=>'user_id='.$this->Auth->user('id'));
			$this->set('sales', $this->paginate());
			$this->set('role',$this->Auth->user('role'));
		} else {
			$this->Session->setFlash(__('You do not have access to this feature', true));
			$this->redirect(array('controller'=>'autos','action' => 'index'));
		}
	}

	function view($id = null) {
		if ($this->Auth->user('role')>1) {
			if (!$id) {
				$this->Session->setFlash(__('Invalid sale', true));
				$this->redirect(array('action' => 'index'));
			}
			$this->set('sale', $this->Sale->read(null, $id));
			if ($this->Auth->user('role')==2) {
				//check that this sale was by this user
				$q=$this->Sale->find('first',array('conditions'=>array('user_id='.$this->Auth->user('id'),"Sale.id=$id")));
				if (!$q) {
					$this->Session->setFlash(__('Invalid sale', true));
					$this->redirect(array('action' => 'index'));
				}
			}
			$this->set('role',$this->Auth->user('role'));
		} else {
			$this->Session->setFlash(__('You do not have access to this feature', true));
			$this->redirect(array('controller'=>'autos','action' => 'index'));
		}
	}

	function add($auto_id = null,$customer_id = null) {
		if ($this->Auth->user('role')>1) {
			if (!empty($this->data)) {
				$this->Sale->create();
				if ($this->Sale->save($this->data)) {
					$this->Session->setFlash(__('The sale has been saved', true));
					//set auto to sold
					$this->Sale->query("update autos set sold=now() where autos.id={$this->data['Sale']['auto_id']} limit 1");
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The sale could not be saved. Please, try again.', true));
				}
			}
			//validate auto_id
			$q=$this->Sale->Auto->find('first',array('conditions'=>array("Auto.id=$auto_id",'sold is null')));
			if ($q) {
				//auto ok to sell
				$this->set('auto',$q);
				$q=$this->Sale->Customer->find('first',array('conditions'=>"Customer.id=$customer_id"));
				if ($q) {
					$this->set('customer',$q);
					$this->set('uid',$this->Auth->user('id'));
				} else {
					$this->Session->setFlash(__('Select or add a new customer', true));
					$this->redirect(array('controller'=>'customers','action' => 'index',$auto_id));
				}
			} else {
				$this->Session->setFlash(__('Select an auto to sell', true));
				$this->redirect(array('controller'=>'autos','action' => 'index'));
			}
//			$users = $this->Sale->User->find('list');
//			$customers = $this->Sale->Customer->find('list');
//			$autos = $this->Sale->Auto->find('list');
//			$this->set(compact('users', 'customers', 'autos'));
		} else {
			$this->Session->setFlash(__('You do not have access to this feature', true));
			$this->redirect(array('controller'=>'autos','action' => 'index'));
		}
	}

	function edit($id = null) {
		if ($this->Auth->user('role')==3) {
			if (!$id && empty($this->data)) {
				$this->Session->setFlash(__('Invalid sale', true));
				$this->redirect(array('action' => 'index'));
			}
			if (!empty($this->data)) {
				if ($this->Sale->save($this->data)) {
					$this->Session->setFlash(__('The sale has been saved', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The sale could not be saved. Please, try again.', true));
				}
			}
			if (empty($this->data)) {
				$this->data = $this->Sale->read(null, $id);
			}
			$users = $this->Sale->User->find('list');
			$customers = $this->Sale->Customer->find('list');
			$autos = $this->Sale->Auto->find('list');
			$this->set(compact('users', 'customers', 'autos'));
		} else {
			$this->Session->setFlash(__('You do not have access to this feature', true));
			$this->redirect(array('controller'=>'autos','action' => 'index'));
		}
	}

	function delete($id = null) {
		if ($this->Auth->user('role')==3) {
			if (!$id) {
				$this->Session->setFlash(__('Invalid id for sale', true));
				$this->redirect(array('action'=>'index'));
			}
			$q=$this->Sale->find('first',$id);
			if ($this->Sale->delete($id)) {
				$this->Session->setFlash(__('Sale deleted', true));
				$this->Sale->query("update autos set sold=null where autos.id={$q['Sale']['auto_id']} limit 1");
				$this->redirect(array('action'=>'index'));
			}//*/
			$this->Session->setFlash(__('Sale was not deleted', true));
			$this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('You do not have access to this feature', true));
			$this->redirect(array('controller'=>'autos','action' => 'index'));
		}
	}
}
?>