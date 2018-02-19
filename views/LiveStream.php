<?php
/**
 * Author: Lohith
 */

class LiveStream_View extends View_Controller {
    
    public function process(\App_Request $request) {
        global $client;
        global $youtube;
        $viewer = $this->getViewer();
        
        $youtubeService = new YoutubeService_Service();
        
        if($request->has('id') && $request->get('id')) {
            
            //To be modified or removed
            $broadCastId = $request->get('id');
                $broadcastsResponse = $youtube->liveBroadcasts->transition(
                        'testing', $broadCastId, 'id,snippet,contentDetails,status');
            
        } else {
            
            //create new broadcast and go live
            $broadcastsResponse = $youtubeService->liveStreamNow();
            $newbroadcastsResponse = $youtubeService->getBroadcast($broadcastsResponse['id']);
            $viewer->assign("BROADCAST_RESPONSE", $newbroadcastsResponse);
            //post 5 test chat messages
            for($i = 0; $i < 5; $i++) {
                $youtubeService->postMessage($newbroadcastsResponse['items'][0]['snippet']['liveChatId'], "Hi, This is a test message - ".Utils::generateRandomString());
            }
            //getchat and show
            $livechatResponse = $youtubeService->getChatMessages($broadcastsResponse['snippet']['liveChatId']);
            
            $liveChatModel = LiveChat_Model::getInstance();
            
            foreach($livechatResponse["items"] as $item) {
                $liveChatModel->storeMessage(array(
                    "live_chat_id" => $broadcastsResponse['snippet']['liveChatId'],
                    "chat_id" => $item['id'],
                    "username" => $item['authorDetails']['displayName'],
                    "message" => $item['snippet']['displayMessage'],
                    "published_at" => $item['snippet']['publishedAt'],
                ));
            }
            
            $viewer->assign("LIVE_CHAT_MESSAGES", $livechatResponse);
            $viewer->assign("LIVE_CHAT_ID", $broadcastsResponse['snippet']['liveChatId']);
            
            $viewer->view('LiveStream');
        }
    }
    
    public function getScripts() {
        return array("layouts/basic/js/LiveStream.js");
    }

}
