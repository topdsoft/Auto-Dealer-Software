<?php
/* Makes Test cases generated on: 2011-05-18 09:07:07 : 1305727627*/
App::import('Controller', 'Makes');

class TestMakesController extends MakesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class MakesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.make', 'app.auto', 'app.body', 'app.sale', 'app.user', 'app.customer');

	function startTest() {
		$this->Makes =& new TestMakesController();
		$this->Makes->constructClasses();
	}

	function endTest() {
		unset($this->Makes);
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