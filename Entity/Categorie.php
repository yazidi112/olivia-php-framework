<?php

namespace App\Entity;

class Categorie{
    
        private  $intitule;
    

    
    public function setintitule($intitule){
        $this->intitule = $intitule;
        return $this;
    }

    public function getintitule(){
        return $this->intitule;
    }
    
}