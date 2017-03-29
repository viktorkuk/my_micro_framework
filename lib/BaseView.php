<?php

class BaseView{
    
    public $viewVars = array();
    
    public function __cunstruct($viewVars = array()){
        $this->viewVars = $viewVars;
    }
    
    
    public function render($template, $vars){
        extract($this->viewVars);
        if(isset($vars))
            extract($vars);
        try {
            include('templates/'.$template.'.php');
        } catch (Exception $e) {
            throw new Exception("Unknown file '$template'");      
        }
    }
    
}