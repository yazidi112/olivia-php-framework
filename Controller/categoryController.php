<?php
class categoryController extends Controller{

    public function index(){
        $this->render("views/category/index.html.php",[]);
    }
}