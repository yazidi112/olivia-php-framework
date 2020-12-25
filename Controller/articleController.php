<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;

class articleController extends Controller{

    public function index(){
        $this->render("Views/article/index.html.php",[]);
    }

    public function new(){
        $article = new Article();
        $article = new ArticleRepository();
    }
}