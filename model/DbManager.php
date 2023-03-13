<?php

//namespace MVC\Manager;

class DbManager {

    protected $bdd;


    public function __construct() {
        try {
            $this->bdd = new PDO('mysql:host=localhost;dbname=resell_road;charset=utf8', 'root', '');
        }
        catch(Exception $e) {
            throw new Exception('Erreur : '.$e->getMessage());
        }
    }

}