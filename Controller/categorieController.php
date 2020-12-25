<?php

namespace App\Controller;

class categorieController extends Controller{

    public function index(){
        $this->render("Views/categorie/index.html.php",[]);
    }
}