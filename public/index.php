<?php
    require_once("../config/database.php");
    require_once("../Core/Connexion.php");    
    require_once('../Core/abstract/Controller.php');
    require_once('../Core/abstract/Repository.php');
    require_once('../Core/Router.php');
    require_once('../Entity/Article.php');
    require_once('../Repository/ArticleRepository.php');
    
    $router = new Router();
    $router->run();

?>