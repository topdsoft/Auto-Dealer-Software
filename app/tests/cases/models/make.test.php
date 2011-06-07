<?php
/* Make Test cases generated on: 2011-05-18 08:38:19 : 1305725899*/
App::import('Model', 'Make');

class MakeTestCase extends CakeTestCase {
	var $fixtures = array('app.make', 'app.auto');

	function startTest() {
		$this->Make =& ClassRegistry::init('Make');
	}

	function endTest() {
		unset($this->Make);
		ClassRegistry::flush();
	}

}
?>