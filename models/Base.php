<?php
/**
 * Author: Lohith
 */
class Base_Model {
    
    protected $valuemap;
    
    public function __construct($values = array()) {
        $this->valuemap = $values;
    }
    
    public function get($key) {
        if(isset($this->valuemap[$key])) {
            return $this->valuemap[$key];
        }
        return FALSE;
    }
    
    public function set($key,$value) {
        $this->valuemap[$key] = $value;
    }
    
}

