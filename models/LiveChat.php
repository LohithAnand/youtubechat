<?php

class LiveChat_Model extends Base_Model {

    protected $tableName;
    protected $columns;

    public function __construct() {
        $this->tableName = "live_chat";
        $this->columns =  array("live_chat_id", "chat_id", "username", "message", "published_at");
    }

    public static function getInstance() {
        return new self();
    }
    
    public function getListHeaders() {
        return $this->listHeaders;
    }
    
    public function storeMessage($messageDetails = array()) {
        if(count($messageDetails) == 5 && $messageDetails['live_chat_id'] && 
                $messageDetails['chat_id'] && $messageDetails['username'] && 
                $messageDetails['message'] && $messageDetails['published_at']) {
            
            $db = Database_Connector::getConnection();
            $sql = "insert into " . $this->tableName . " (" . rtrim(implode(", ", $this->columns), ",") . ") values (?, ?, ?, ?, ?)";
            $db->query($sql, array(
                $messageDetails['live_chat_id'],$messageDetails['chat_id'],$messageDetails['username'],$messageDetails['message'],$messageDetails['published_at'] 
            ));
        }
    }

    public function getMessageByUserName($liveChatId, $username) {
        $db = Database_Connector::getConnection();
        $sql = "select " . rtrim(implode(", ", $this->columns), ",") . " from " . $this->tableName;
        if($username && $liveChatId) {
            $sql .= " where " . $this->columns[0] . " = '".$liveChatId."' and ".$this->columns[2]." like '%". $username ."%'"; 
        }
        $result = $db->query($sql, array());
        return $db->fetch($result);
    }

}
