<?php

namespace Olivia;

class Entity{
    
    private $name;

    public function __construct($name){
        $this->name = $name;
    }

    /*
    * Creation d'une entité
    */

    public function create(){
        echo "Création d'une nouvelle entité : \n";
        $entityFile         = "Entity/".ucfirst($this->name).".php";
        if(file_exists($entityFile)){
            $input = readline("Entité déja existe voulez vous la remplacer ? [o|n]:");
            if($input != "o"){
                return false;
            }
        }
        $attributes         = "";
        $gettersetters      = "";
        $types              = ['float','varchar(255)','text','date','relation'];

        while(true){
            $attribute      = readline("Saisir un nouvel attribut (ou cliquer sur entrer pour quitter): ");

            if($attribute == ''){
                break;
            }

            do{
                $type       = readline("Saisir son type [int|float|string|text|date|relation] (String par défaut): ");
            
                if($type === "" || $type === "string"){
                    $type = "varchar(255)";
                }

                if($type === "int"){
                    $type = "int(11)";
                }

                if($type === "relation"){
                    while(true){
                        $class = readline("Saisir l'entié de référence: ");
                        if(!file_exists("Entity/$class.php")){
                            echo "Entité introuvable ! ";
                        }else{
                            $type="int(11) FOREIGN KEY REFERENCES $class(id)";
                            break;
                        }
                    }
                }
                echo (!in_array($type,$types) or !strpos($type, 'int(11)'));
            }while(!in_array($type,$types) or !strpos($type, 'int(11)'));

            $attrs      = str_replace("#name#",$attribute,file_get_contents("Core/generator/models/entity.attributes.model"));
            $attrs      = str_replace("#type#",$type,$attrs);
            $attributes .= $attrs;

            $getset  = str_replace("#name#",$attribute,file_get_contents("Core/generator/models/entity.gettersetter.model"));
            $getset  = str_replace("#Name#",ucfirst($attribute),$getset);;
            $gettersetters  .= $getset;
        }
        
        $entityContent      = file_get_contents("Core/generator/models/entity.model");
        $entityContent      = str_replace("#name#",ucfirst($this->name),$entityContent);
        $entityContent      = str_replace("#atributes#",$attributes,$entityContent);
        $entityContent      = str_replace("#gettersetter#",$gettersetters,$entityContent);

        file_put_contents ($entityFile,$entityContent);

        $repositoryFile     = "Repository/".ucfirst($this->name)."Repository.php";
        $repositoryContent  = str_replace("#name#",$this->name,file_get_contents("Core/generator/models/repository.model"));
        file_put_contents ($repositoryFile,$repositoryContent);
        
        echo ".................................\n";
        echo "{$this->name} est bien créé.\n";
        echo ".................................\n";
    }

    /*
    * Suppression d'une entité
    */
    public function delete(){
        echo "Suppression d'une entite: \n";
        $entityFile = "Entity/{$this->name}.php";
        if(file_exists($entityFile))unlink($entityFile);
        $repositoryFile = "Repository/{$this->name}Repository.php";
        if(file_exists($repositoryFile))unlink($repositoryFile);
        echo ".................................\n";
        echo "{$this->name} est bien supprimé.\n";
        echo ".................................\n";
    }

    
    
}