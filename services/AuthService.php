<?php

/**
 * Author: Lohith
 */
require_once 'google-api-php-client/vendor/autoload.php';

global $client;
global $youtube;

class AuthService_Service {
    
    function googleAuth() {
        session_start();
        global $client;
        global $youtube;
        
        $OAUTH2_CLIENT_ID = Config::get('OAUTH_CLIENT_ID');
        $OAUTH2_CLIENT_SECRET = Config::get('OAUTH_CLIENT_SECRET');

        $client = new Google_Client();
        $client->setClientId($OAUTH2_CLIENT_ID);
        $client->setClientSecret($OAUTH2_CLIENT_SECRET);
        $client->setScopes('https://www.googleapis.com/auth/youtube');
        $redirect = filter_var('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'], FILTER_SANITIZE_URL);
        
        $client->setRedirectUri($redirect);

        // Define an object that will be used to make all API requests.
        $youtube = new Google_Service_YouTube($client);

        // Check if an auth token exists for the required scopes
        $tokenSessionKey = 'token-' . $client->prepareScopes();
        if (isset($_GET['code'])) {
            if (strval($_SESSION['state']) !== strval($_GET['state'])) {
                die('The session state did not match.');
            }

            $client->authenticate($_GET['code']);
            $_SESSION[$tokenSessionKey] = $client->getAccessToken();
            header('Location: ' . $redirect);
        }

        if (isset($_SESSION[$tokenSessionKey])) {
            $client->setAccessToken($_SESSION[$tokenSessionKey]);
        }

        // Check to ensure that the access token was successfully acquired.
        if ($client->getAccessToken()) {
            return true;
        } else {
            // If the user hasn't authorized the app, initiate the OAuth flow
            $state = mt_rand();
            $client->setState($state);
            $_SESSION['state'] = $state;
            
            $authUrl = $client->createAuthUrl();
            header('Location: ' . $authUrl);
        }
    }
    
}