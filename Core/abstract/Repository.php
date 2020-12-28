<?php

namespace App\Repository;

abstract  class Repository{

    protected $table;
    protected $cnx;

    public function __construct(){
        $this->cnx = \Database::getInstance();
    }

    public function findAll(){
        try {
            $query = $this->cnx->query("SELECT * FROM {$this->table}");
            return $query->fetchAll();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function find($id){
        try {
            $sql = "SELECT * FROM {$this->table} WHERE id = ?";
            $sth = $this->cnx->prepare($sql);
            $sth->execute([$id]);
            return  $sth->fetch();
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

        $affectation = [];

        $array  = (array)$entite;
        $keys   = array_keys($array);
        $id     = $array[$keys[0]];
        
        foreach($array as $key=>$value){
            $filed          = trim(str_replace(get_class($entite),"",$key));
            $affectation[]  = "$filed = '$value'";
        }

        $sql = "UPDATE {$this->table} SET ".implode(",",$affectation)." WHERE id = $id";

        die($sql);
         
        try {
            $this->cnx->prepare($sql)->execute($values);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            exit;
        }
    }

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