<?php
class autoloader{
    public static function register(){
        spl_autoload_register(function ($class) {
            $chemin = explode("\\",$class);

             
            
            if($chemin[0] == "App"){
                $chemin = "../".$chemin[1]."/".$chemin[2].".php";
                if(file_exists($chemin))
                    require_once $chemin;
            }
            
        });
    }
}
