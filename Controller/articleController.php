<?php

namespace App\Controller;

use App\Repository\ArticleRepository;

class articleController extends Controller{

    public function index(){
        $articleRepository = new ArticleRepository();
        $articles   = $articleRepository->findAll();
        $onearticle = $articleRepository->find(1);
        $this->render("Views/article/index.html.php",[
            "articles"=>$articles,
            "onearticle" => $onearticle
        ]);
    }

     
}