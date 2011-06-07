<?php
/* Body Test cases generated on: 2011-05-18 08:40:12 : 1305726012*/
App::import('Model', 'Body');

class BodyTestCase extends CakeTestCase {
	var $fixtures = array('app.body', 'app.auto');

	function startTest() {
		$this->Body =& ClassRegistry::init('Body');
	}

	function endTest() {
		unset($this->Body);
		ClassRegistry::flush();
	}

}
?>