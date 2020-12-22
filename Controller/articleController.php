<?php
class articleController extends Controller{

    public function index(){
        $this->render("views/article/index.html.php",[])
    }
}