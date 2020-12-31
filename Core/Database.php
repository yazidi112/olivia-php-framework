<?php

class Database{
    
    private static $instance = null;

    public static function getInstance(){
        if(self::$instance === null){
            try {
                self::$instance = new PDO('mysql:host=localhost;dbname=blog', "root", "");
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instance->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8'");
                self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            } catch (PDOException $e) {
                print "Erreur !: " . $e->getMessage();
                die();
            }
        }
        return self::$instance;
    }
}
?>