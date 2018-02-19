<?php
/**
 * Author: Lohith
 */
class App_Response {
    
    protected $result;
    
    protected $error;

    public function setResult($result) {
        $this->result = $result;
    }
    
    public function setError($code,$message) {
        $this->error = array(
            'code' => $code,
            'message' => $message
        );
    }
    
    protected function getEmitResponse() {
        $response = array(
            'success' => !isset($this->error)
        );
        if($response['success']) {
            $response['result'] = $this->result;
        } else {
            $response['error'] = $this->error;
        }
        return json_encode($response);
    }

    public function emit() {
        header('Content-type: text/json; charset=UTF-8');
        echo $this->getEmitResponse();
    }
    
}

