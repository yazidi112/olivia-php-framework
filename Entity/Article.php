<?php

namespace App\Entity;

/*
* Entity: Article
*/
class Article{

    /*
    * @ORM\id
    * @ORM\id\integer
    */
    private $id;

        
    /*
    * @ORM\titre\string
    */
    private  $titre;
        
    /*
    * @ORM\contenu\text
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