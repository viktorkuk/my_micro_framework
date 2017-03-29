<?php
class Router {
    
    private $controller;
    private $action;
    private $args = array();
    
    public function __construct(){
        $uri = $_SERVER['REQUEST_URI'];
        $uri = trim($uri, '/');
        $explodedUri = explode('/', $uri);
        
        $this->controller = ucfirst(strtolower(empty($explodedUri[0]) ? DEFAULT_CONTROLLER : $explodedUri[0])).'Controller';
        $this->action = strtolower(empty($explodedUri[1]) ? DEFAULT_ACTION : $explodedUri[1]).'Action';
        $this->args = array_slice($explodedUri, 2);
    }
    
    public function route(){
        if(is_callable(array($this->controller, $this->action))){
            //call_user_func_array(array($this->controller, $this->action), $this->args);
            $controllerClass = new $this->controller(); 
            //$action = $this->action;
            $controllerClass->{$this->action}($this->args);
        }else{  
            header('HTTP/1.0 404 Not Found');
            echo "<h1>Error 404 Not Found</h1>";
            echo "The page that you have requested could not be found.";
            exit();
        }
    }
    
    
}
