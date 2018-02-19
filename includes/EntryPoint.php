<?php
/**
 * Author: Lohith
 */

require_once 'includes/Utils.php';
require_once 'includes/Loader.php';
require_once 'includes/http/Request.php';
require_once 'includes/http/Response.php';
require_once 'includes/http/Session.php';

abstract class App_EntryPoint {

	protected $login = false;

	function getLogin() {
		return $this->login;
	}

	function setLogin($login) {
		if ($this->login) throw new Exception('Login is already set.');
		$this->login = $login;
	}

	function hasLogin() {
		return $this->getLogin()? true: false;
	}

	abstract function process (App_Request $request);
    
}

