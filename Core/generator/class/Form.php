<?php

namespace Olivia;

class Form{

    private $entity;

    public function __construct($entity){
        $this->entity = $entity;
    }

    public function create(){
         
        if(!file_exists("Entity/{$this->entity}.php")){
            die("Entité n'existe pas !");
        }
    
        $contenu        = file_get_contents("Entity/$this->entity.php");
        $model          = file_get_contents("config/models/form.model");
        $lines          = explode("\n",$contenu);
        $inputs         = "";
        foreach($lines as $line){
            if(strpos($line,"@ORM")){
                $fields = explode("\\",$line);
                array_shift($fields);
                if($fields[0] == "id"){
                    $input   = file_get_contents("config/models/form.hidden.model");
                }else if($fields[1] == "text"){
                    $input   = file_get_contents("config/models/form.textarea.model");
                }else{
                    $input   = file_get_contents("config/models/form.input.model");
                }
                $input   = str_replace("#type#","text",$input); 
                $input   = str_replace("#name#",$fields[0],$input); 
                $inputs .= $input;
            }
        }
        
        $model = str_replace("#inputs#", $inputs,$model);
        file_put_contents("views/$this->entity/form.html.php",$model);
         
        if(true){
            echo ".................................\n";
            echo " formulaire est bien créé.\n";
            echo ".................................\n";
        }
    }
}