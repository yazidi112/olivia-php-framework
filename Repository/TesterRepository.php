<?php

namespace App\Repository;

class testerRepository extends Repository{

    public function __construct(){
        parent::__construct();
        $this->table = "tester";
    }
}