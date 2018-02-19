<?php
/**
 * Author: Lohith
 */
class App_Session {

	static function start() {
		@session_start();
	}
	
	static function end() {
		@session_destroy();
	}
	
	static function get($key, $defvalue='') {
		if (isset($_SESSION) && isset($_SESSION[$key])) return $_SESSION[$key];
		return $defvalue;
	}
	
	static function set($key, $value) {
		$_SESSION[$key] = $value;
	}
}
