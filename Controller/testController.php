<?php

namespace App\Controller;

class testController extends Controller{

    public function index(){
        $this->render("Views/test/index.html.php",[]);
    }
}