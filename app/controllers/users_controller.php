<?php
class UsersController extends AppController {

	var $name = 'Users';

	function beforeFilter() {
		parent::beforeFilter();
		//if there are ano users in system allow 1st user to be added
		$q=$this->paginate();
		if(!$q) $this->Auth->allow('add');
	} 
	
	function index() {
		if ($this->Auth->user('role')>1) {
			$this->User->recursive = 0;
			$this->set('users', $this->paginate());
		} else {
			$this->Session->setFlash(__('You do not have access to this feature', true));
			$this->redirect(array('controller'=>'autos','action' => 'index'));
		}
	}

	function view($id = null) {
		if ($this->Auth->user('role')>1) {
			if (!$id) {
				$this->Session->setFlash(__('Invalid user', true));
				$this->redirect(array('action' => 'index'));
			}
			$this->set('user', $this->User->read(null, $id));
		} else {
			$this->Session->setFlash(__('You do not have access to this feature', true));
			$this->redirect(array('controller'=>'autos','action' => 'index'));
		}
	}

	function add() {
		$q=$this->paginate();
		if ($this->Auth->user('role')==3 || !$q) {
			if (!empty($this->data)) {
				$this->User->create();
				if ($this->User->save($this->data)) {
					$this->Session->setFlash(__('The user has been saved', true));
					if ($this->Auth->user('role')<3) $this->Auth->login($this->data);
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
				}
			}
			$this->set('userlist',$this->paginate());
		} else {
			$this->Session->setFlash(__('You do not have access to this feature', true));
			$this->redirect(array('controller'=>'autos','action' => 'index'));
		}
	}

	function edit($id = null) {
		if ($this->Auth->user('role')==3) {
			if (!$id && empty($this->data)) {
				$this->Session->setFlash(__('Invalid user', true));
				$this->redirect(array('action' => 'index'));
			}
			if (!empty($this->data)) {
				if ($this->User->save($this->data)) {
					$this->Session->setFlash(__('The user has been saved', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
				}
			}
			if (empty($this->data)) {
				$this->data = $this->User->read(null, $id);
				$this->data['User']['password']='';
			}
		} else {
			$this->Session->setFlash(__('You do not have access to this feature', true));
			$this->redirect(array('controller'=>'autos','action' => 'index'));
		}
	}

	function delete($id = null) {
		if ($this->Auth->user('role')==3) {
			if (!$id) {
				$this->Session->setFlash(__('Invalid id for user', true));
				$this->redirect(array('action'=>'index'));
			}
			if ($this->User->delete($id)) {
				$this->Session->setFlash(__('User deleted', true));
				$this->redirect(array('action'=>'index'));
			}
			$this->Session->setFlash(__('User was not deleted', true));
			$this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('You do not have access to this feature', true));
			$this->redirect(array('controller'=>'autos','action' => 'index'));
		}
	}
	
	function login() {
		//check for first ever login
		$q=$this->paginate();
		if(!$q) $this->redirect(array('action' => 'add'));
	}
	
	function logout() {        
		$this->redirect($this->Auth->logout());    
	}
}
?>