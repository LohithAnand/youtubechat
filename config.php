<?php
/**
 * Author: Lohith
 */

//All global configurations
$CONFIG = array(
    
    'APP_NAME' => 'YouTubeChat',
    
    'OAUTH_CLIENT_ID' => '625402221140-plvqnlrrat4su1ucdkm521rkksjfnc11.apps.googleusercontent.com',
    
    'OAUTH_CLIENT_SECRET' => '',
    
    'SERVER' => 'localhost',
    
    'DB_TYPE' => 'mysql',
    
    'DB_USERNAME' => 'root',
    
    'DB_PASSWORD' => '',
    
    'DB_NAME' => 'youtubechat',
);

class Config {
    static function get($key) {
        global $CONFIG;
        if(isset($CONFIG[$key])) {
            return $CONFIG[$key];
        }
        return FALSE;
    }
}

