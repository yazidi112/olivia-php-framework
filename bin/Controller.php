<?php
class Controller{

    private $name;

    public function __construct($name){
        $this->name = strtolower($name);
    }

    public function create(){
        $controllerFile         = "Controller/{$this->name}Controller.php";
        $controllerContent      = str_replace("#name#",$this->name,file_get_contents("bin/models/controller.model"));
        file_put_contents ($controllerFile,$controllerContent);
        if(!is_dir("Views/{$this->name}")) mkdir("Views/{$this->name}");
        $indexhtmlContent       = str_replace("#name#",$this->name,file_get_contents("bin/models/index.html.model"));
        file_put_contents ("Views/{$this->name}/index.html.php",$indexhtmlContent);
    }
}