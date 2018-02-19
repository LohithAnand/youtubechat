<?php
/**
 * Author: Lohith
 */
class Home_Action extends Action_Controller {

    function process(App_Request $request) {
        $response = new App_Response();
        $response->setResult(array('response'=>'responsedata'));
        $response->emit();
    }

}
