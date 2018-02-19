<?php
/**
 * Author: Lohith
 */

//Not used - Changed the way login so that google api samples works as it is
//TODO: clean up
class Login_View extends View_Controller {
    
    public function loginNotRequired() {
        return true;
    }
    
    public function process(App_Request $request) {
        $viewer = $this->getViewer();
        $viewer->assign("GOOGLE_AUTH_URL", $request->get('authUrl'));
        $viewer->view('Login');
    }
    
}

