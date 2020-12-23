<?php
    require_once("../Config/database.php");
    require_once("../Core/Connexion.php");    
    require_once('../Core/Controller.php');
    require_once('../Core/Router.php');
    require_once('../Entity/Article.php');
    require_once('../Repository/ArticleRepository.php');
    
    $router = new Router();
    $router->run();

?>