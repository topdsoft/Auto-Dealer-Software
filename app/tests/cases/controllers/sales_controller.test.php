<?php
/* Sales Test cases generated on: 2011-05-18 09:07:28 : 1305727648*/
App::import('Controller', 'Sales');

class TestSalesController extends SalesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class SalesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.sale', 'app.user', 'app.customer', 'app.auto', 'app.make', 'app.body');

	function startTest() {
		$this->Sales =& new TestSalesController();
		$this->Sales->constructClasses();
	}

	function endTest() {
		unset($this->Sales);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

}
?>