<?php
class AutosController extends AppController {

	var $name = 'Autos';

	function index() {
		$this->Auto->recursive = 0;
		$this->paginate=array('conditions'=>'sold is null');
		$this->set('autos', $this->paginate());
		$this->set('role',$this->Auth->user('role'));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid auto', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('auto', $this->Auto->read(null, $id));
		$this->set('role',$this->Auth->user('role'));
	}

	function add() {
		if ($this->Auth->user('role')==3) {
			if (!empty($this->data)) {
				$this->Auto->create();
				if ($this->Auto->save($this->data)) {
					$this->Session->setFlash(__('The auto has been saved', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The auto could not be saved. Please, try again.', true));
				}
			}
			$makes = $this->Auto->Make->find('list');
			$bodies = $this->Auto->Body->find('list');
			$this->set(compact('makes', 'bodies'));
		} else {
			$this->Session->setFlash(__('You do not have access to this feature', true));
			$this->redirect(array('controller'=>'autos','action' => 'index'));
		}
	}

	function edit($id = null) {
		if ($this->Auth->user('role')==3) {
			if (!$id && empty($this->data)) {
				$this->Session->setFlash(__('Invalid auto', true));
				$this->redirect(array('action' => 'index'));
			}
			if (!empty($this->data)) {
				if ($this->Auto->save($this->data)) {
					$this->Session->setFlash(__('The auto has been saved', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The auto could not be saved. Please, try again.', true));
				}
			}
			if (empty($this->data)) {
				$this->data = $this->Auto->read(null, $id);
			}
			$makes = $this->Auto->Make->find('list');
			$bodies = $this->Auto->Body->find('list');
			$this->set(compact('makes', 'bodies'));
		} else {
			$this->Session->setFlash(__('You do not have access to this feature', true));
			$this->redirect(array('controller'=>'autos','action' => 'index'));
		}
	}

	function editscancode($id = null) {
		if ($this->Auth->user('role')==3) {
			if (!$id && empty($this->data)) {
				$this->Session->setFlash(__('Invalid auto', true));
				$this->redirect(array('action' => 'index'));
			}
			if (!empty($this->data)) {
				if ($this->Auto->save($this->data)) {
					$this->Session->setFlash(__('The auto has been saved', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The auto could not be saved. Please, try again.', true));
				}
			}
			if (empty($this->data)) {
				$this->data = $this->Auto->read(null, $id);
				$this->data['Auto']['scancode']='';
			}
			$makes = $this->Auto->Make->find('list');
			$bodies = $this->Auto->Body->find('list');
			$this->set(compact('makes', 'bodies'));
		} else {
			$this->Session->setFlash(__('You do not have access to this feature', true));
			$this->redirect(array('controller'=>'autos','action' => 'index'));
		}
	}

	function delete($id = null) {
		if ($this->Auth->user('role')==3) {
			if (!$id) {
				$this->Session->setFlash(__('Invalid id for auto', true));
				$this->redirect(array('action'=>'index'));
			}
			if ($this->Auto->delete($id)) {
				//also delete any image files
				$q=$this->Auto->query("select * from images where auto_id=$id");
				if ($q) {
					//delete all files
					foreach($q as $img) unlink(WWW_ROOT.'files/'.$img['images']['filename']);
					$this->Auto->query("delete from images where auto_id=$id");
				}
				$this->Session->setFlash(__('Auto deleted', true));
				$this->redirect(array('action'=>'index'));
			}
			$this->Session->setFlash(__('Auto was not deleted', true));
			$this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('You do not have access to this feature', true));
			$this->redirect(array('controller'=>'autos','action' => 'index'));
		}
	}
	
	function upload($id=null) {
		if ($this->data) $id=$this->data['Auto']['autoID'];
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for auto', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->data) {
			// Validate the type. Should be JPEG or PNG.
			$allowed = array ('image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png');
//			debug($_FILES);exit();
			if (in_array($_FILES['data']['type']['Auto']['upload'], $allowed)) {
				// Move the file over.
				if (move_uploaded_file ($_FILES['data']['tmp_name']['Auto']['upload'], WWW_ROOT."files/$id{$_FILES['data']['name']['Auto']['upload']}")) {
					$this->Session->setFlash(__('The file has been uploaded.', true));
					//add to images
					$this->Auto->query("insert into images (filename,auto_id) values ('$id{$_FILES['data']['name']['Auto']['upload']}',$id)");
					$this->redirect(array('action'=>'edit',$id));
				} // End of move... IF.
			} else { // Invalid type.
				$this->Session->setFlash(__('Please upload a JPEG or PNG image.', true));
			}//endif
		}
		$this->set('autoID',$id);
		$this->set('role', $this->Auth->user('role'));
	}
	
	function delImage($id=null) {
		if ($this->Auth->user('role')==3) {
			if (!$id) {
				$this->redirect(array('action'=>'index'));
			}
			//validate $id
			$q=$this->Auto->query("select * from images,autos where images.id=$id and images.auto_id=autos.id limit 1");
//			debug($q);exit();
			if($q) {
				//ok remove file
				unlink(WWW_ROOT.'files/'.$q[0]['images']['filename']);
				//and remove image entry
				$this->Auto->query("delete from images where id=$id limit 1");
				$this->redirect(array('action'=>'edit',$q[0]['autos']['id']));
			} else $this->redirect(array('action'=>'index'));
		} else {
			$this->Session->setFlash(__('You do not have access to this feature', true));
			$this->redirect(array('controller'=>'autos','action' => 'index'));
		}
	}
	
	function scancode() {
		//find vehicle by scancode
		if (!empty($this->data)) {
			//check for vehicle
			$q=$this->Auto->find('first',array('conditions'=>'scancode='.$this->data['Auto']['scancode']));
			if($q) $this->redirect(array('action'=>'view',$q['Auto']['id']));
			$this->Session->setFlash(__('Invalid scancode for auto', true));
			unset($this->data);
		}
	}
}
?>