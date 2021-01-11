<?php

namespace App\Entity;

/*
* Entity: X
*/
class X{

    /*
    * @ORM\id\int(11)\primary\
    */
    private $id;

        
    /*
    * @ORM\x\varchar(255)
    */
    private  $x;
        
    /*
    * @ORM\y\relation
    */
    private  $y;
    

    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function getId(){
        return $this->id;
    }

    
    public function setX($x){
        $this->x = $x;
        return $this;
    }

    public function getX(){
        return $this->x;
    }
    public function setY($y){
        $this->y = $y;
        return $this;
    }

    public function getY(){
        return $this->y;
    }
    
}