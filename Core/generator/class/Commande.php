<?php

namespace Olivia;

use Olivia\Controller;
use Olivia\Entity;
use Olivia\Migration;

class Commande{
    
    private $commande  = [];
    private $commandes = [];

    public function __construct($commande){
        $this->commande = $commande;
        $this->commandes = require "Core/generator/data/commandes.php";
        $this->hello();
    }

    public function trait(){
        if($this->is_exists()){
            switch ($this->commande[0]) {
                case "create:controller":
                    $controller = new Controller($this->commande[1]);
                    $controller->create();
                    break;
                case "delete:controller":
                    $controller = new Controller($this->commande[1]);
                    $controller->delete();
                    break;
                case "clear:controller":
                    $controller = new Controller($this->commande[1]);
                    $controller->clear();
                    break;
                case "create:entity":
                    $entity = new Entity($this->commande[1]);
                    $entity->create();
                    break;
                case "delete:entity":
                    $entity = new Entity($this->commande[1]);
                    $entity->delete();
                    break;
                case "create:migration":
                    $migration = new Migration();
                    $migration->create();
                    break;
                case "server:run":
                    echo "Development Server is running at http://localhost:8080 [Ctrl+Click to Open]\n";
                    echo system("php -S localhost:8080 -t public");
                    break;  
            }
        }else{
            echo "+++++++++++++++++++++++++\n";
            echo "+ Commande incorrect !\n";
            echo "+++++++++++++++++++++++++\n";
        }
    }

    public function is_exists(){
        if(in_array($this->commande[0],$this->commandes)){
            return true;
        }
        return false;
    }

    public function hello(){
        echo "_____________________________________________\n";
        echo "              Olivia PHP Framework 1.0       \n";
        echo "-- For more informations visit www.Olivia.com --\n";
        echo "_____________________________________________\n";
    }
}