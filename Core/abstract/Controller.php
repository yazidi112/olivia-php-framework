<?php

namespace App\Controller;

abstract class  Controller{

    private $routes;
    public function __construct(){
        $this->routes = require '../Config/routes.php';
    }
    public function render($view,$data){
        ob_start();
        require "../$view";
        $contenu = ob_get_contents();
        ob_end_clean();
        require '../views/parent.html.php';
    }

    public function redirect($routename){
         
        if(array_key_exists($routename,$this->routes)){
            header("Location: ".$this->routes[$routename]);
        }else{
            die("Erreur: Route introuvable ! ");
        }
    }

    public function path($routename,$params,$confirmation= false){
        if(array_key_exists($routename,$this->routes)){
            $url = $this->routes[$routename];
            foreach($params as $key=>$value){
                $url.="&".$key."=".$value;
            }
            if($confirmation){
                return "javascript:if(confirm('Etes vous sur ?'))location.href='".$url."'";
            }else{
                return $url;
            }
            
        }else{
            die("Erreur: Route introuvable ! ");
        }
    }

}

?>