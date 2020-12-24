<?php
class article extends Entity{
    
        private  $nom;
        private  $prenom;
    

        
    public function getnom(){
        return $this->nom;
    }

    public function setnom($nom){
        $this->nom = $nom;
        return $this;
    }    
    public function getprenom(){
        return $this->prenom;
    }

    public function setprenom($prenom){
        $this->prenom = $prenom;
        return $this;
    }
    
}