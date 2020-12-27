<?php

namespace App\Repository;

class CategorieRepository extends Repository{
    
    public function __construct(){
        $this->table = "categorie";
    }
}