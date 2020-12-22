<?php
require 'Controller.php';
$commandes = require "commandes.php";
array_shift($argv);
echo "_____________________________________________\n";
echo "      Welcome to Zytona PHP Framework 1.0    \n";
echo "-- For more informations visit zaytona.com --\n";
echo "_____________________________________________\n";
$commande = array_shift($argv);
if(in_array($commande,$commandes)){
        if($commande == "create:controller"){
                $controller = new Controller(array_shift($argv));
                $controller->create();
        }
        exit;
}

echo"Commande introuvable !";





