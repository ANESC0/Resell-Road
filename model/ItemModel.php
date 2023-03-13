<?php

    class ItemModel extends DbManager {

    // Attributs
    private $_id=-1;
    private $_desc;
    private $_picture;
    private $_purchasePrice;
    private $_salePrice;
    private $_type;
    private $_brand;
    private $_project;
    private $_date;


      // Constructeur
      public function __construct() {
        parent::__construct();
       
    }

      // guetter

      public function getId(){
        return $this->_id;
        }

        public function getDesc(){
            return $this->_desc;
        }

        public function getPicture(){
            return $this->_picture;
        }

        public function getPurchasePrice(){
            return $this->_purchasePrice;
        }
        public function getSalePrice(){
            return $this->_salePrice;
        }

        public function getType(){
            return $this->_type ;
        }

        public function getBrand(){
            return $this->_brand;
        }

        public function getProject(){
            return $this->_project;
        }

        public function getDate(){
            return $this->_date ;
        }



    // setter

        public function setId($var){
            $this->_id = $var;
        }

        public function setDesc($var){
            $this->_desc = $var;
        }
        public function setPicture($var){
            $this->_picture = $var;
        }
        public function setPurchasePrice($var){
            $this->_purchasePrice = $var;
        }
        public function setSalePrice($var){
            $this->_salePrice = $var;
        }

        public function setType($var){
            $this->_type = $var;
        }

        public function setBrand($var){
            $this->_brand = $var;
        }

        public function setProject($var){
            $this->_project = $var;
        }

        public function setDate($var){
            $this->_date = $var;
        }


  

        // Methodes

        public function getItemsByProject($project){

            $req = $this->bdd->prepare('SELECT * FROM item WHERE project_id = ?');
            $req->execute([$project]);
            $req->rowCount();
       
                if ($req==0) {
                    return false;
                } else {
                    
                return $req;

                }



       }

}

    