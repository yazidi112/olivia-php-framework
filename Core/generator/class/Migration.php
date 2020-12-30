<?php
namespace Olivia;

class Migration{

    
    /*
    * @imran yazidi 30/12/2020
    * Creation d'une migration
    */
    public function create(){
        $folder = array_diff(scandir("Entity"), array('.', '..'));
        if(!$folder){
            die("Dossier Entity est vide !");
        }
        
        foreach($folder  as $file){
            $entity = basename($file,".php");
            $contenu = file_get_contents("Entity/$entity.php");
            $lines = explode("\n",$contenu);
            $fieldstypes = [];
            foreach($lines as $line){
                if(strpos($line,"@ORM")){
                    $fields = explode("\\",$line);
                    array_shift($fields);
                    if($fields[0] == "id")
                        $fieldstypes[] = $fields[0]." ".$fields[1]." AUTO_INCREMENT PRIMARY KEY";
                    else
                        $fieldstypes[] = $fields[0]." ".$fields[1];
                }
            }
            $texte = "CREATE TABLE IF NOT EXISTS $entity (".implode(", ",$fieldstypes).")";
            file_put_contents("migrations/$entity.sql",$texte);
        }

         
        if(true){
            echo ".................................\n";
            echo " Migration est bien créé.\n";
            echo ".................................\n";
        }
        
    }

    /*
    * @imran yazidi 30/12/2020
    * Execution des requette SQL
    */
    public function migrate(){
        $folder = array_diff(scandir("migrations"), array('.', '..'));
        if(!$folder){
            die("Dossier migrations est vide !");
        }

        foreach($folder  as $file){
            $sql = file_get_contents("migrations/$file");
            $pdo = new \PDO('mysql:host=localhost;dbname=blog', "root", "");
            if($pdo->query($sql)){
                echo "Table $file créé.\n";
            }else{
                echo "Erreur dans la table $file !\n";
            }
        }
    }
}