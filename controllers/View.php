<?php
/**
 * Author: Lohith
 */
require_once 'includes/Viewer.php';

abstract class View_Controller extends Action_Controller {
    
    function __construct() {
		parent::__construct();
	}
    
    function getViewer() {
        return new App_Viewer();
    }
    
    function getPageTitle() {
        return Config::get("APP_NAME");
    }
    
    function preProcess(App_Request $request) {
        $viewer = $this->getViewer();
        $viewer->assign("APP_TITLE", $this->getPageTitle());
        $viewer->view("Header");
    }
    
    function postProcess(App_Request $request) {
        $viewer = $this->getViewer();
        $viewer->assign("SCRIPTS", $this->getScripts());
        $viewer->view("Footer");
    }
    
    function getScripts() {
        return array();
    }
    
}

