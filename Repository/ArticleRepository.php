<?php

namespace App\Repository;

class ArticleRepository extends Repository{

    public function __construct(){
        parent::__construct();
        $this->table = "article";
    }
}