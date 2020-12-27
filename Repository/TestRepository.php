<?php

namespace App\Repository;

class testRepository extends Repository{
    
    public function __construct(){
        $this->table = "test";
    }
}