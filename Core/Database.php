<?php
namespace App;

class Database{
    
    private static $instance = null;

    public static function getInstance(){
        if(self::$instance === null){
            self::$instance = new \PDO('mysql:host=localhost;dbname=blog', "root", "");
        }
        return self::$instance;
    }
}
?>