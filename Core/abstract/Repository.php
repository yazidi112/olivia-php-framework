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
            $query = $this->cnx->query("SELECT * from {$this->table}");
            return $query->fetchAll();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function find($id){
        try {
            $query = $this->cnx->query("SELECT * from {$this->table} WHERE id = $id");
            return $query->fetch();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

     

    public function create($entite){
        $fileds = [];
        $values = [];
        $intero = [];
        foreach((array)$entite as $key=>$value){
            if($value != ""){
                $fileds[] = str_replace(get_class($entite),"",$key);
                $values[] = $value;
                $intero[] = "?";
            }
        }

        $sql = "INSERT INTO {$this->table} (id,".implode(",",$fileds).") VALUES (null,".implode(",",$intero).")";
        echo $sql;
        echo "<br/>";
        $sql2 = "INSERT INTO article (id,titre,contenu)  VALUES (null,?,?)";
        echo $sql2;
        echo "<br/>";
        var_dump($values);
        try {
            $sql = "INSERT INTO {$this->table} (id,".implode(",",$fileds).") VALUES (null,".implode(",",$intero).")";
            $this->cnx->prepare($sql)->execute($values);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
        exit;
    }

    public function update(){

    }

    public function delete(){

    }
}