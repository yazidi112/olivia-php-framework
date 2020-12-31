<?php

namespace App\Entity;

/*
* Entity: Etudiant
*/
class Etudiant{

    /*
    * @ORM\id\int(11)\primary\
    */
    private $id;

        
    /*
    * @ORM\nom\varchar(255)
    */
    private  $nom;
        
    /*
    * @ORM\prenom\varchar(255)
    */
    private  $prenom;
        
    /*
    * @ORM\ville\varchar(255)
    */
    private  $ville;
        
    /*
    * @ORM\tel\varchar(255)
    */
    private  $tel;
        
    /*
    * @ORM\datenaissance\date
    */
    private  $datenaissance;
    

    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function getId(){
        return $this->id;
    }

    
    public function setNom($nom){
        $this->nom = $nom;
        return $this;
    }

    public function getNom(){
        return $this->nom;
    }
    public function setPrenom($prenom){
        $this->prenom = $prenom;
        return $this;
    }

    public function getPrenom(){
        return $this->prenom;
    }
    public function setVille($ville){
        $this->ville = $ville;
        return $this;
    }

    public function getVille(){
        return $this->ville;
    }
    public function setTel($tel){
        $this->tel = $tel;
        return $this;
    }

    public function getTel(){
        return $this->tel;
    }
    public function setDatenaissance($datenaissance){
        $this->datenaissance = $datenaissance;
        return $this;
    }

    public function getDatenaissance(){
        return $this->datenaissance;
    }
    
}