<?php

namespace App\Entity;

/*
* Entity: Y
*/
class Y{

    /*
    * @ORM\id\int(11)\primary\
    */
    private $id;

        
    /*
    * @ORM\i\varchar(255)
    */
    private  $i;
        
    /*
    * @ORM\p\varchar(255)
    */
    private  $p;
    

    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function getId(){
        return $this->id;
    }

    
    public function setI($i){
        $this->i = $i;
        return $this;
    }

    public function getI(){
        return $this->i;
    }
    public function setP($p){
        $this->p = $p;
        return $this;
    }

    public function getP(){
        return $this->p;
    }
    
}