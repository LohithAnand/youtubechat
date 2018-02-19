<?php
/**
 * Author: Lohith
 */
require_once 'libraries/adodb5/adodb.inc.php';

class Database_Connector {
    
    protected $adb;
    
    static function getConnection() {
        $dbType = Config::get('DB_TYPE');
        $server = Config::get('SERVER');
        $username = Config::get('DB_USERNAME');
        $password = Config::get('DB_PASSWORD');
        $dbName = Config::get('DB_NAME');
        
        $connection = NewADOConnection($dbType);
        $connection->Connect($server, $username, $password, $dbName);
        
        $connector = new self();
        $connector->adb = $connection;
        
        return $connector;
    }
    
    function query($sql, $params = array()) {
        $result = $this->adb->Execute($sql, $params);
        return $result;
    }
    
    function fetch($result) {
        $resultArray = array();
        while ($array = $result->FetchRow()) {
            $resultArray[] = $array;
        }
        return $resultArray;
    }
    
    function getCount($result) {
        return $result->RecordCount();
    }
    
}

