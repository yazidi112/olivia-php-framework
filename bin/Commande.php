<?php

namespace zaytona;

use zaytona\Controller;

class Commande{
    
    private $commande  = [];
    private $commandes = [];

    public function __construct($commande){
        $this->commande = $commande;
        $this->commandes = require "commandes.php";
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
                default:
                    die("Commande introuvable !");
            }
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
        echo "      Welcome to Zytona PHP Framework 1.0    \n";
        echo "-- For more informations visit www.zaytona.com --\n";
        echo "_____________________________________________\n";
    }
}