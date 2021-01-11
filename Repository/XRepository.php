<?php

namespace App\Repository;

class xRepository extends Repository{

    public function __construct(){
        parent::__construct();
        $this->table = "x";
    }
}