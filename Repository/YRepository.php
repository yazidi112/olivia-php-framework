<?php

namespace App\Repository;

class yRepository extends Repository{

    public function __construct(){
        parent::__construct();
        $this->table = "y";
    }
}