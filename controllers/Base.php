<?php
/**
 * Author: Lohith
 */
abstract class Base_Controller {
    
    function __construct() {}
    
    abstract function process (App_Request $request);
    
    function loginNotRequired() {
        return false;
    }
    
}

