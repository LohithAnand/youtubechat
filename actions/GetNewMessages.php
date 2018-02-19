<?php
/**
 * Author: Lohith
 */
class GetNewMessages_Action extends Action_Controller {

    function process(App_Request $request) {
        $response = new App_Response();
        $yotubeService = new YoutubeService_Service();
        $liveChatMessagesListResponse = $yotubeService->getChatMessages($request->get('liveChatId'), array("pageToken" => $request->get('nextPageToken')));
        $response->setResult(array('success' => 'false'));
        if($liveChatMessagesListResponse) {
            $items = array();
            $liveChatModel = LiveChat_Model::getInstance();
            foreach($liveChatMessagesListResponse["items"] as $item) {
                array_push($items, array(
                    "profileImageUrl" => $item["authorDetails"]["profileImageUrl"],
                    "displayName" => $item["authorDetails"]["displayName"],
                    "displayMessage" => $item["snippet"]["displayMessage"]
                ));
                $liveChatModel->storeMessage(array(
                    "live_chat_id" => $request->get('liveChatId'),
                    "chat_id" => $item['id'],
                    "username" => $item['authorDetails']['displayName'],
                    "message" => $item['snippet']['displayMessage'],
                    "published_at" => $item['snippet']['publishedAt'],
                ));
            }
            $response->setResult(array('success' => 'true', "response" => array(
                "nextPageToken" => $liveChatMessagesListResponse["nextPageToken"],
                "pollingIntervalMillis" => $liveChatMessagesListResponse["pollingIntervalMillis"],
                "items" => $items
            )));
        }
        $response->emit();
    }

}

