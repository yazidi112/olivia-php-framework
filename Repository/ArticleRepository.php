<?php

namespace App\Repository;

class ArticleRepository extends Repository{

    public function __construct(){
        $this->table = "article";
    }
}