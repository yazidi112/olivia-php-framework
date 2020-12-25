<?php

namespace App\Entity;

class Article{
    
        private  $titre;
        private  $contenu;
        private  $date;
    

    
    public function settitre($titre){
        $this->titre = $titre;
        return $this;
    }

    public function gettitre(){
        return $this->titre;
    }
    public function setcontenu($contenu){
        $this->contenu = $contenu;
        return $this;
    }

    public function getcontenu(){
        return $this->contenu;
    }
    public function setdate($date){
        $this->date = $date;
        return $this;
    }

    public function getdate(){
        return $this->date;
    }
    
}