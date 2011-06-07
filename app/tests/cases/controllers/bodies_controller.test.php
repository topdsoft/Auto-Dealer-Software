<?php
/* Bodies Test cases generated on: 2011-05-18 09:06:37 : 1305727597*/
App::import('Controller', 'Bodies');

class TestBodiesController extends BodiesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class BodiesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.body', 'app.auto', 'app.make', 'app.sale', 'app.user', 'app.customer');

	function startTest() {
		$this->Bodies =& new TestBodiesController();
		$this->Bodies->constructClasses();
	}

	function endTest() {
		unset($this->Bodies);
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