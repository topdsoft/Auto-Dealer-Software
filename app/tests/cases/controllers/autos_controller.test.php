<?php
/* Autos Test cases generated on: 2011-05-18 09:06:20 : 1305727580*/
App::import('Controller', 'Autos');

class TestAutosController extends AutosController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class AutosControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.auto', 'app.make', 'app.body', 'app.sale', 'app.user', 'app.customer');

	function startTest() {
		$this->Autos =& new TestAutosController();
		$this->Autos->constructClasses();
	}

	function endTest() {
		unset($this->Autos);
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