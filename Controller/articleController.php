<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Entity\Article;

class articleController extends Controller{

    public function index(){
        $articleRepository = new ArticleRepository();
        $articles   = $articleRepository->findAll();
        $onearticle = $articleRepository->find(39);
        $this->render("Views/article/index.html.php",[
            "articles"=>$articles,
            "onearticle" => $onearticle
        ]);
    }

    public function new(){
        $article = new Article();
        $article->setTitre("test")->setContenu("test");
        $articleRepository = new ArticleRepository();
        $articleRepository->create($article);
    }

    public function update(){
        $article = new Article();
        $article->setId(44)->setTitre("test")->setContenu("test");
        $articleRepository = new ArticleRepository();
        $articleRepository->update($article);
    }

    public function delete(){
        $articleRepository = new ArticleRepository();
        if($articleRepository->delete(39))
            echo "Article supprimé";
        else
            echo "Erreur lors de la suppression.";
    }
     
}