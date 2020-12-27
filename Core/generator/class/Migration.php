<?php
namespace Olivia;

class Migration{

    
    /*
    * Creation d'une migration
    */
    public function create(){
        $folder = array_diff(scandir("Entity"), array('.', '..'));
        if(!$folder){
            die("Dossier Entity est vide !");
        }
        foreach($folder  as $file){
            $entity = basename($file,".php");
            echo "$entity effectuée \n";
            require_once("Entity/$entity.php");

            

            file_put_contents("migrations/".basename($file,".php").".sql","test");
        }
        
        echo ".................................\n";
        echo " Migration est bien créé.\n";
        echo ".................................\n";
    }
}