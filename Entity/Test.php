<?php

namespace App\Entity;

/*
* Entity: Test
*/
class Test{

    /*
    * @ORM\id
    * @ORM\id\integer
    */
    private $id;

        
    /*
    * @ORM\test\string
    */
    private  $test;
    

    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function getId(){
        return $this->id;
    }

    
    public function setTest($test){
        $this->test = $test;
        return $this;
    }

    public function getTest(){
        return $this->test;
    }
    
}