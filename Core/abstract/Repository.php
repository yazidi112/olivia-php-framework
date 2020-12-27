<?php

namespace App\Repository;

use App\Database;

abstract  class Repository{

    protected $table;

    public function findAll(){
        try {
            $cnx = Database::getInstance();
            $query = $cnx->query("SELECT * from {$this->table}");
            return $query->fetchAll();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function find($id){
        try {
            $cnx = Database::getInstance();
            $query = $cnx->query("SELECT * from {$this->table} WHERE id = $id");
            return $query->fetch();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function findOneby(){

    }

    public function create(){

    }

    public function update(){

    }

    public function delete(){

    }
}