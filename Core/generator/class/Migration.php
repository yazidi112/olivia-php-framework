<?php
namespace Olivia;

class Migration{

    
    /*
    * Creation d'une migration
    */
    public function create(){
        
        foreach(array_diff(scandir("Entity"), array('.', '..'))  as $file){
            echo basename($file,".php");
            file_put_contents("migrations/".basename($file,".php").".sql","test");
        }
        
        echo ".................................\n";
        echo " Migration est bien créé.\n";
        echo ".................................\n";
    }
}