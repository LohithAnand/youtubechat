<?php
/**
 * Author: Lohith
 */

class Home_View extends View_Controller {
    
    public function process(App_Request $request) {
        $viewer = $this->getViewer();
        $youtubeService = new YoutubeService_Service();
        $broadcastsResponse = $youtubeService->listBroadCasts();
        
        $viewer->assign('BROADCAST_ITEMS', $broadcastsResponse['items']);
        $viewer->view('Home');
    }
    
    public function getScripts() {
        return array("layouts/basic/js/Home.js");
    }
    
}

