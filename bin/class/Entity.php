<?php
namespace zaytona;

class Entity{
    
    private $name;

    public function __construct($name){
        $this->name = $name;
    }

    public function create(){
        echo "Création d'une nouvelle entitie : \n";
        $entityFile         = "Entity/{$this->name}.php";
        $attributes         = "";
        $gettersetters      = "";

        while(true){
            $attribute          = readline("Saisir un nouveau attribut ou cliquer sur entrer pour quitter: ");
            if($attribute == ''){
                break;
            }
            $type               = readline("Saisir son type: ");

            $attributes         .= str_replace("#name#",$attribute,file_get_contents("bin/models/entity.attributes.model"));
            $gettersetters      .= str_replace("#name#",$attribute,file_get_contents("bin/models/entity.gettersetter.model"));
        }
        
        $entityContent      = file_get_contents("bin/models/entity.model");
        $entityContent      = str_replace("#name#",$this->name,$entityContent);
        $entityContent      = str_replace("#atributes#",$attributes,$entityContent);
        $entityContent      = str_replace("#gettersetter#",$gettersetters,$entityContent);

        file_put_contents ($entityFile,$entityContent);


        $repositoryFile         = "Repository/{$this->name}Repository.php";
        $repositoryContent      = str_replace("#name#",$this->name,file_get_contents("bin/models/repository.model"));
        file_put_contents ($repositoryFile,$repositoryContent);
        
        echo ".................................\n";
        echo "{$this->name} est bien créé.\n";
        echo ".................................\n";
    }

    /*
    * Suppression d'une entitie
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

    /*
    * Suppression d'un répertoire qui contient des fichiers
    */
    public static function delTree($dir) {
        
        $files = array_diff(scandir($dir), array('.','..'));
        foreach ($files as $file) {
            (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file");
        }
        return rmdir($dir);
    }
}