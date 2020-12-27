<?php
class autoloader{
    public static function register(){
        spl_autoload_register(function ($class) {
            $chemin = explode("\\",$class);
            $chemin = "../".$chemin[1]."/".$chemin[2].".php";
            //echo $chemin;
            require $chemin;
        });
    }
}
