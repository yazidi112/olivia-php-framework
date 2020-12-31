<?php

namespace App\Repository;

class etudiantRepository extends Repository{

    public function __construct(){
        parent::__construct();
        $this->table = "etudiant";
    }
}