<?php
/* Auto Test cases generated on: 2011-05-18 08:46:52 : 1305726412*/
App::import('Model', 'Auto');

class AutoTestCase extends CakeTestCase {
	var $fixtures = array('app.auto', 'app.make', 'app.body', 'app.sale', 'app.user', 'app.customer');

	function startTest() {
		$this->Auto =& ClassRegistry::init('Auto');
	}

	function endTest() {
		unset($this->Auto);
		ClassRegistry::flush();
	}

}
?>