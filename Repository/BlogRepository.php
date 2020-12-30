<?php

namespace App\Repository;

class blogRepository extends Repository{

    public function __construct(){
        parent::__construct();
        $this->table = "blog";
    }
}