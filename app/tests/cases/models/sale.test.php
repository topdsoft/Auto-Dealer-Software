<?php
/* Sale Test cases generated on: 2011-05-18 08:43:22 : 1305726202*/
App::import('Model', 'Sale');

class SaleTestCase extends CakeTestCase {
	var $fixtures = array('app.sale', 'app.user', 'app.customer', 'app.auto');

	function startTest() {
		$this->Sale =& ClassRegistry::init('Sale');
	}

	function endTest() {
		unset($this->Sale);
		ClassRegistry::flush();
	}

}
?>