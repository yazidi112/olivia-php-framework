<?php

namespace App\Repository;

abstract  class Repository{

    protected $table;
    protected $cnx;

    public function __construct(){
        $this->cnx = \Database::getInstance();
    }

    /*
    * @imran yazidi 29/12/2020 
    *  Create entity
    */
    public function createEntity($array){
        $class = 'App\Entity\\'.$this->table;
        $entite = new $class();
        foreach($array as $key=>$value){
            
        }
        
        var_dump($entite);
    }

    /*
    * @imran yazidi 28/12/2020 
    */
    public function findAll(){
        try {
            $query = $this->cnx->query("SELECT * FROM {$this->table}");
            return $query->fetchAll();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    /*
    * @imran yazidi 28/12/2020 
    */
    public function find($id){
        $this->createObject();
        try {
            $sql = "SELECT * FROM {$this->table} WHERE id = ?";
            $sth = $this->cnx->prepare($sql);
            $sth->execute([$id]);
            return  $this->createEntity($sth->fetch());
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

     
    /*
    * @imran yazidi 29/12/2020 
    */
    public function create($entite){

        $fileds = [];
        $values = [];
        $intero = [];

        foreach((array)$entite as $key=>$value){
            if($value != ""){
                $fileds[] = trim(str_replace(get_class($entite),"",$key));
                $values[] = $value;
                $intero[] = "?";
            }
        }

        $sql = "INSERT INTO {$this->table} (id,".implode(",",$fileds).") VALUES (null,".implode(",",$intero).")";
         
        try {
            if($this->cnx->prepare($sql)->execute($values))
                return true;
            else
                return false;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            exit;
        }
         
    }

    /*
    * @imran yazidi 29/12/2020 
    */
    public function update($entite){

        $fileds = [];
        $values = [];
        $array  = (array)$entite;
        $keys   = array_keys($array);

        // get value of id
        $id     = $array[$keys[0]];
        
        // delete first element of array here it is ID
        array_shift($array);

        foreach($array as $key=>$value){
            $fileds[] = trim(str_replace(get_class($entite),"",$key))." = ? ";
            $values[] = $value;
        }

        // add ID to values array
        $values[] = $id;

        $sql = "UPDATE {$this->table} SET ".implode(",",$fileds)." WHERE id = ?";
         
        try {
            if($this->cnx->prepare($sql)->execute($values))
                return true;
            else
                return false;
        }catch (PDOException $e) {
            print "Erreur : " . $e->getMessage() . "<br/>";
            exit;
        }
    }

    /*
    * @imran yazidi 29/12/2020 
    */

    public function delete($id){
         
        try {
            $sql = "DELETE FROM {$this->table} WHERE id = ?";
            $sth = $this->cnx->prepare($sql);
            if($sth->execute([$id]))
                return true;
            else
                return false;

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}