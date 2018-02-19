<?php
/**
 * Author: Lohith
 */
class SearchMessages_Action extends Action_Controller {

    function process(App_Request $request) {
        $response = new App_Response();
        $lcModel = LiveChat_Model::getInstance();
        $username = $request->get('username');
        $liveChatId = $request->get('liveChatId');
        $queryResults = array();
        $response->setResult(array('success'=>'false'));
        if($username) {
            $queryResults = $lcModel->getMessageByUserName($liveChatId, $username);
            $response->setResult(array('success'=>'true', 'searchResult' => $queryResults));
        }
        $response->emit();
    }

}

