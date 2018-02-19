<?php
/**
 * Author: Lohith
 */
class SendMessage_Action extends Action_Controller {

    function process(App_Request $request) {
        $response = new App_Response();
        $yotubeService = new YoutubeService_Service();
        $yotubeService->postMessage($request->get('liveChatId'), $request->get('liveChatMessage'));
        $response->setResult(array('success'=>'true'));
        $response->emit();
    }

}
