<?php
namespace zaytona;

/*
*   @imran 23/12/2020
*/
class Controller{

    private $name;

    public function __construct($name){
        $this->name = strtolower($name);
    }

    /*
    * Ajout d'un controlleur
    */
    public function create(){
        echo "Création d'un nouveau controlleur: \n";
        $controllerFile         = "Controller/{$this->name}Controller.php";
        $controllerContent      = str_replace("#name#",$this->name,file_get_contents("bin/models/controller.model"));
        file_put_contents ($controllerFile,$controllerContent);
        if(!is_dir("Views/{$this->name}")) mkdir("Views/{$this->name}");
        $indexhtmlContent       = str_replace("#name#",$this->name,file_get_contents("bin/models/index.html.model"));
        file_put_contents ("Views/{$this->name}/index.html.php",$indexhtmlContent);
        echo ".................................\n";
        echo "{$this->name} est bien créé.\n";
        echo ".................................\n";
    }

    /*
    * Suppression d'un controlleur
    */
    public function delete(){
        echo "Suppression d'un controlleur existant: \n";
        $controllerFile = "Controller/{$this->name}Controller.php";
        if(file_exists($controllerFile))unlink($controllerFile);
        if(is_dir("Views/{$this->name}")) $this->delTree("Views/{$this->name}");
        echo ".................................\n";
        echo "{$this->name} est bien supprimé.\n";
        echo ".................................\n";
    }

    /*
    * @. 
    * Vider les controlleurs
    */
    public function clear(){
        echo "Vider les controlleurs: \n";
        echo "ça marche!!";
        echo " modification de nadia";
        echo ".................................\n";
        echo "Liste des controlleurs est vide.\n";
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