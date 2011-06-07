<?php
/* User Test cases generated on: 2011-05-18 08:44:46 : 1305726286*/
App::import('Model', 'User');

class UserTestCase extends CakeTestCase {
	var $fixtures = array('app.user', 'app.sale', 'app.customer', 'app.auto');

	function startTest() {
		$this->User =& ClassRegistry::init('User');
	}

	function endTest() {
		unset($this->User);
		ClassRegistry::flush();
	}

}
?>