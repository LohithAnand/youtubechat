<?php
/**
 * Author: Lohith
 */
require_once 'libraries/Smarty/libs/SmartyBC.class.php';

class App_Viewer extends SmartyBC {
    
    function __construct() {
        parent::__construct();

        $templatesDir = 'templates/';
        $compileDir = 'templates_c/';

        $this->setTemplateDir(array($templatesDir));
        $this->setCompileDir($compileDir);	
    }
    
    function view($templateName) {
        $templatePath = 'templates/' . $templateName . '.tpl';
        $this->display($templatePath);
    }
    
}

