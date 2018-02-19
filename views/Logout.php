<?php
/**
 * Author: Lohith
 */

//Not used - Changed the way login so that google api samples works as it is
//TODO: clean up
class Logout_View extends View_Controller {
    
    public function process(\App_Request $request) {
        App_Session::end();
        header("Location: index.php");
    }

}