<?php

namespace App\Entity;

/*
* Entity: Blog
*/
class Blog{

    /*
    * @ORM\id\int(11)\primary
    */
    private $id;

        
    /*
    * @ORM\titre\varchar(255)
    */
    private  $titre;
        
    /*
    * @ORM\contenu\varchar(255)
    */
    private  $contenu;
        
    /*
    * @ORM\date\date
    */
    private  $date;
    

    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function getId(){
        return $this->id;
    }

    
    public function setTitre($titre){
        $this->titre = $titre;
        return $this;
    }

    public function getTitre(){
        return $this->titre;
    }
    public function setContenu($contenu){
        $this->contenu = $contenu;
        return $this;
    }

    public function getContenu(){
        return $this->contenu;
    }
    public function setDate($date){
        $this->date = $date;
        return $this;
    }

    public function getDate(){
        return $this->date;
    }
    
}