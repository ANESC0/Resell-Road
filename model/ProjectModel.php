<?php

 class ProjectModel extends DbManager {
    // Attributs
    private $_id=-1;
    private $_title;
    private $_desc;
    private $_nbElement;
    private $_currAmount;
    private $_goalAmount;
    private $_img;
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

        public function getImg(){
            return $this->_img;
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

    public function setImg($var){
        $this->_img = $var;
    }
    public function setDate($var){
        $this->_date = $var;
    }




     // Methodes

     // on récupère tous les projets

     public function getAllProjects(){

        $req = $this->bdd->query('SELECT * FROM project');
        $req->rowCount();
       
        if ($req==0 || $req==null) {
            return false;
        } else {
            
        return $req;

        }

    }


     // récupère les projet de 5 en 5 à partir d'un indice

     public function getProjects($num){

        $req = $this->bdd->query('SELECT * FROM project WHERE project_id > '.$num.' LIMIT 5');
        $result= $req->rowCount();
        
       
        if ($result==0) {
            return false;
        }
        else {
            
            return $req;

        }

    }



    // récupère un projet en détail

    public function getOneProject($id){

        $req = $this->bdd->query('SELECT * FROM project WHERE project_id = '.$id.' LIMIT 1');
        $result= $req->rowCount();
        
       
        if ($result==0) {
            return false;
        }
        else {

            $result = $req->fetch(PDO::FETCH_OBJ);
            
            return $result;

        }


    }

    // completer un objet project model avec les données d'un projet en bdd

    public function completeProjectById($id){
        $req = $this->bdd->query( 'SELECT * FROM project WHERE project_id= '.$id.'');
        $result= $req->rowCount();
        
       
        if ($result==0) {
            return false;
        } else {
            // etape pour completer l'objet avec les données recupérées

        $result = $req->fetch(PDO::FETCH_OBJ);
        $this->setId($result->project_id);
        $this->setTitle($result->project_title);
        $this->setDesc($result->project_desc);
        $this->setCurrAmount($result->project_curramount);
        $this->setGoalAmount($result->project_goalamount);
        $this->setImg($result->project_img);
        $this->setDate($result->project_date);
        $this->setNbElement($result->project_nbelement);

        return true;



            
        return $result;

        }



    }


    // ajouter un nouveau projet

    public function addProject(){

        // on initalise l'objet qui va être ajoute en bdd

        $this->setCurrAmount(0);
        $this->setNbElement(0);

        // on verifie si il y a une image
        if( $this->getImg()==null){
            $this->setImg("assets/project/base.jpg");
        }


        // on ajoute le projet

        $req = $this->bdd->prepare('INSERT INTO project(project_title, project_desc, project_curramount, project_goalamount, project_img, project_nbelement) VALUES(?, ?, ?, ?, ?, ?)');
        return $req->execute([$this->_title, $this->_desc, $this->_currAmount, $this->_goalAmount, $this->_img, $this->_nbElement]);


    }


    // Modifier un projet

    public function updateProject(){

        // on ajoute le projet

        $req = $this->bdd->prepare('UPDATE project SET project_title= ?, project_desc= ?, project_goalamount= ?, project_img= ? WHERE project_id = ?');
        return $req->execute(array($this->_title, $this->_desc, $this->_goalAmount, $this->_img, $this->_id));


    }

    // Modifier le montant courant du projet + le nb d'article dès l'ajout d'un article

    public function updateProject2($purchasePrice,$salePrice){

        // on récupère les anciennes valeurs et on incrémente
        $this->setCurrAmount($this->getCurrAmount() + ($salePrice-$purchasePrice));
        $this->setNbElement($this->getNbElement()+1);

        

        // on ajoute le projet

        $req = $this->bdd->prepare('UPDATE project SET project_nbelement= ?, project_curramount= ? WHERE project_id = ?');
        return $req->execute(array($this->_nbElement, $this->_currAmount, $this->_id));



    }

     // Modifier le montant courant du projet + le nb d'article dès la supression d'un article

     public function updateProject3($purchasePrice,$salePrice){
         // on récupère les anciennes valeurs et on incrémente
         $this->setCurrAmount($this->getCurrAmount() - ($salePrice-$purchasePrice));
         $this->setNbElement($this->getNbElement()-1);
 
         
 
         // on ajoute le projet
 
         $req = $this->bdd->prepare('UPDATE project SET project_nbelement= ?, project_curramount= ? WHERE project_id = ?');
         return $req->execute(array($this->_nbElement, $this->_currAmount, $this->_id));
 
 
     }


    // supprimer un projet

    public function deleteProject($id){

        // on supprime le projet

        $req = $this->bdd->query('DELETE FROM project WHERE project_id = '.$id.'');
        return $req;

    }












 }