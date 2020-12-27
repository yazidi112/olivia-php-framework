<?php

class Router{
    
    public static function run($default_route){
        $uri = explode('/',$_SERVER['REQUEST_URI']);
        array_shift($uri);
        if(!empty($uri[0])){
            $controller = array_shift($uri)."Controller";
            $method     = (isset($uri[0]))? array_shift($uri):'index';
                
            if(file_exists("../Controller/$controller.php")){
                require_once("../Controller/$controller.php");
                $class = 'App\Controller\\'.$controller;
                $crl    =  new $class();
                if(method_exists($crl,$method)){
                    (isset($uri[0])) ? call_user_func_array([$crl, $method], $uri) : $crl->$method();
                }else{
                    die("Route introuvable !");
                }
            }else{
                die("../Controller/$controller.php"." est introuvable!");
            }    
        }else{
            header("Location: $default_route");
        }
           
    }
}