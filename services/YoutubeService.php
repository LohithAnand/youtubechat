<?php

/**
 * Author: Lohith
 * 
 * Code samples from Google Api samples is modified and reused
 */

class YoutubeService_Service {
    
    function listBroadCasts() {
        global $client;
        global $youtube;
        
        $broadcastsResponse = array();
        try {
            // Execute an API request that lists broadcasts owned by the user who
            // authorized the request.
            $broadcastsResponse = $youtube->liveBroadcasts->listLiveBroadcasts(
                    'id,snippet,contentDetails,status', array(
                'mine' => 'true'
            ));
        } catch (Google_Service_Exception $e) {
            if($e->getCode() == 401) {
                App_Session::end();
                header("Location: index.php");
            }
            die($e->getMessage());
        } catch (Google_Exception $e) {
            die($e->getMessage());
        }
        $tokenSessionKey = 'token-' . $client->prepareScopes();
        $_SESSION[$tokenSessionKey] = $client->getAccessToken();
        return $broadcastsResponse;
    }
    
    function liveStreamNow() {
        global $client;
        global $youtube;
        //create broadcast
        $broadcastsResponse = array();
        try {
            $broadcastSnippet = new Google_Service_YouTube_LiveBroadcastSnippet();
            $broadcastSnippet->setTitle('Live stream - ' . Utils::generateRandomString());

            $currentdatetime = new DateTime();
            $broadcastSnippet->setScheduledStartTime($currentdatetime->format(DateTime::ATOM));
//      $broadcastSnippet->setScheduledEndTime('2034-01-31T00:00:00.000Z');
            // Create an object for the liveBroadcast resource's status, and set the
            // broadcast's status to "private".
            $status = new Google_Service_YouTube_LiveBroadcastStatus();
            $status->setPrivacyStatus('public');

            // Create the API request that inserts the liveBroadcast resource.
            $broadcastInsert = new Google_Service_YouTube_LiveBroadcast();
            $broadcastInsert->setSnippet($broadcastSnippet);
            $broadcastInsert->setStatus($status);
            $broadcastInsert->setKind('youtube#liveBroadcast');

            // Execute the request and return an object that contains information
            // about the new broadcast.
            $broadcastsResponse = $youtube->liveBroadcasts->insert('snippet,status', $broadcastInsert, array());

            $youtube_event_id = $broadcastsResponse['id'];

            /**
             * Call the API's videos.list method to retrieve the video resource.
             */
            $listResponse = $youtube->videos->listVideos("snippet", array('id' => $youtube_event_id));
            $video = $listResponse[0];

            //live stream
            // Create an object for the liveStream resource's snippet. Specify a value
            // for the snippet's title.
            $streamSnippet = new Google_Service_YouTube_LiveStreamSnippet();
            $streamSnippet->setTitle('stream-'.Utils::generateRandomString());

            // Create an object for content distribution network details for the live
            // stream and specify the stream's format and ingestion type.
            $cdn = new Google_Service_YouTube_CdnSettings();
            $cdn->setFormat("720p");
            $cdn->setIngestionType('rtmp');

            // Create the API request that inserts the liveStream resource.
            $streamInsert = new Google_Service_YouTube_LiveStream();
            $streamInsert->setSnippet($streamSnippet);
            $streamInsert->setCdn($cdn);
            $streamInsert->setKind('youtube#liveStream');

            $streamStatus = new Google_Service_YouTube_LiveStreamStatus();
            $streamStatus->setStreamStatus("active");
            $streamInsert->setStatus($streamStatus);

            // Execute the request and return an object that contains information
            // about the new stream.
            $streamsResponse = $youtube->liveStreams->insert('snippet,cdn,status', $streamInsert, array());

            // Bind the broadcast to the live stream.
            $bindBroadcastResponse = $youtube->liveBroadcasts->bind(
                    $broadcastsResponse['id'], 'id,contentDetails', array(
                'streamId' => $streamsResponse['id'],
            ));
        } catch (Exception $e) {
            if ($e->getCode() == 401) {
                App_Session::end();
                header("Location: index.php");
            }
            die($e->getMessage());
        }
        
        return $broadcastsResponse;
    }
    
    function getBroadcast($broadcastId) {
        global $client;
        global $youtube;
        try {
            $broadCastResource = $youtube->liveBroadcasts->listLiveBroadcasts('id,snippet,contentDetails,status', array('id' => $broadcastId));
        } catch (Exception $e) {
            if ($e->getCode() == 401) {
                App_Session::end();
                header("Location: index.php");
            }
            die($e->getMessage());
        }
        return $broadCastResource;
    }
    
    function postMessage($liveChatId, $message) {
        global $client;
        global $youtube;
        try {
            $chatMessage = new Google_Service_YouTube_LiveChatMessage();
            $chatSnippet = new Google_Service_YouTube_LiveChatMessageSnippet();

            $chatSnippet->setLiveChatId($liveChatId);
            $textMessageDetails = new Google_Service_YouTube_LiveChatTextMessageDetails();
            $textMessageDetails->setMessageText($message);
            $chatSnippet->setTextMessageDetails($textMessageDetails);
            $chatSnippet->setType("textMessageEvent");
            $chatMessage->setSnippet($chatSnippet);
            $messageResource = $youtube->liveChatMessages->insert("snippet", $chatMessage);
        } catch (Exception $e) {
            die($e->getMessage());
        }
        return $messageResource;
    }
    
    function getChatMessages($chatId, $optParams = array()) {
        global $client;
        global $youtube;
        try {
            $livechatResponse = $youtube->liveChatMessages->listLiveChatMessages($chatId, "id,snippet,authorDetails", $optParams);
        } catch (Exception $e) {
            if ($e->getCode() == 401) {
                App_Session::end();
                header("Location: index.php");
            }
            die($e->getMessage());
        }
        return $livechatResponse;
    }
    
}
