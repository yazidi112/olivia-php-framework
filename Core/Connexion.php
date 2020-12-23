<?php
    
    class Connexion{
        public function getConnexion(){
            $mysqli = new mysqli(HOST,USER,PASSWORD,DATABASE);
    
            if ($mysqli -> connect_errno) {
              echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
              exit();
            }
            return $mysqli;
        }
    }
   
?>