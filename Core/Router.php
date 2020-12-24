<?php

namespace App;

class Router{
    public function run(){
        if(isset($_GET['p'])){
            $array = explode('-',$_GET['p']);
            if(count($array)>=2){
                $controller = $array[0]."Controller";
                $method     = $array[1];
                if(file_exists("../Controller/$controller.php")){
                    require_once("../Controller/$controller.php");
                    $crl        =  new $controller();
                    $crl->{$method}();
                }else{
                    die("Fichier introuvable!");
                }
            }else{
                die("Page introuvable !");
            }
            
        }else{
            die("Bad request");
        }
    }
}

?>