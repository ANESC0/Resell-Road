<?php

 class ProjectModel extends DbManager {
    // Attributs
    private $_id=-1;
    private $_title;
    private $_desc;
    private $_nbElement;
    private $_currAmount;
    private $_goalAmount;
    private $_date;


      // Constructeur
      public function __construct() {
        parent::__construct();
    }

    // guetters

    public function getId(){
        return $this->_id;
        }

        public function getDesc(){
            return $this->_desc;
        }

        public function getTitle(){
            return $this->_title;
        }

        public function getNbElement(){
            return $this->_nbElement;
        }
        public function getCurrAmount(){
            return $this->_currAmount;
        }

        public function getGoalAmount(){
            return $this->_goalAmount;
        }

        public function getDate(){
            return $this->_date;
        }


        
    // setter

    public function setId($var){
        $this->_id = $var;
    }

    public function setDesc($var){
        $this->_desc = $var;
    }
    public function setTitle($var){
        $this->_title = $var;
    }
    public function setNbElement($var){
        $this->_nbElement = $var;
    }
    public function setCurrAmount($var){
        $this->_currAmount = $var;
    }

    public function setGoalAmount($var){
        $this->_goalAmount = $var;
    }
    public function setDate($var){
        $this->_date = $var;
    }




     // Methodes

     // récupère les projet de 5 en 5 à partir d'un indice

     public function getProjects($num){

        $req = $this->bdd->query('SELECT * FROM project WHERE project_id > '.$num.' LIMIT 5');
        $req->rowCount();
       
        if ($req==0) {
            return false;
        } else {
            
        return $req;

        }

    }



    // récupère un projet en détail

    public function getOneProject($id){

        $req = $this->bdd->query('SELECT * FROM project WHERE project_id = '.$id.' LIMIT 1');
        $req->rowCount();
       
        if ($req==0) {
            return false;
        } else {

        $result = $req->fetch(PDO::FETCH_OBJ);
            
        return $result;

        }


    }












 }