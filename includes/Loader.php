<?php
/**
 * Author: Lohith
 */
class App_Loader {
    
    static function getHandlerClassName($component,$componentName) {
        return $componentName . '_' . $component;
    }
    
    static function autoLoad($class_name) {
        $parts = explode('_',$class_name);
        if(count($parts) > 1) {
            $filename = $parts[0];
            $component = $parts[1];
            if($component == 'Model' || $component == 'View' || 
                    $component == 'Controller' || $component == 'Action' || $component == 'Service')  {
                $component = strtolower($component) . 's';
                $filepath = $component . '/' . $filename . '.php';
                
                require_once $filepath;
            }
        }
    }
    
}

spl_autoload_register('App_Loader::autoLoad');

