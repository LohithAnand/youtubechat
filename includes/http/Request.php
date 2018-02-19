<?php
/**
 * Author: Lohith
 */
class App_Request {
    
    protected $valuemap = array();
    
    public function __construct($values) {
        $this->valuemap = $values;
    }
    
    public function get($key) {
        if(isset($this->valuemap[$key])) {
            return $this->valuemap[$key];
        }
        return FALSE;
    }
    
    public function has($key) {
        return array_key_exists($key, $this->valuemap);
    }
    
    public function set($key, $value) {
        $this->valuemap[$key] = $value;
    }
    
}

