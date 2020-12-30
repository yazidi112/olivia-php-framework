<?php

namespace App\Entity;

/*
* Entity: Tester
*/
class Tester{

    /*
    * @ORM\id
    * @ORM\id\integer
    */
    private $id;

        
    /*
    * @ORM\nom\string
    */
    private  $nom;
        
    /*
    * @ORM\prenom\string
    */
    private  $prenom;
        
    /*
    * @ORM\ville\string
    */
    private  $ville;
        
    /*
    * @ORM\adresse\string
    */
    private  $adresse;
    

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
    public function setAdresse($adresse){
        $this->adresse = $adresse;
        return $this;
    }

    public function getAdresse(){
        return $this->adresse;
    }
    
}