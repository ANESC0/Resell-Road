<?php

    class CommentModel extends DbManager {

        // Attributs
        private $_id;
        private $_desc;
        private $_time;
        private $_date;
        private $_user;
        private $_userPseudo;
        private $_project;
        private $_item;

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

    public function getTime(){
        return $this->_time;
    }
    public function getDate(){
        return $this->_date;
    }
    public function getUser(){
        return $this->_user;
    }
    public function getUserPseudo(){
        return $this->_userPseudo;
    }
    public function getProject(){
        return $this->_project;
    }
    public function getItem(){
        return $this->_item;
    }


    // setter

    public function setId($var){
        $this->_id = $var ;
    }
    public function setDesc($var){
        $this->_desc = $var ;
    }

    public function setTime($var){
        $this->_time = $var;
    }

    public function setDate($var){
        $this->_date = $var;
    }

    public function setUser($var){
        $this->_user = $var;
    }
    public function setUserPseudo($var){
        $this->_userPseudo = $var;
    }

    public function setProject($var){
        $this->_project = $var;
    }

    public function setItem($var){
        $this->_item = $var;
    }



    // Methodes

    // recuperer tous les commentaire d'un article
    public function getCommentsByItem($idItem){

        $req = $this->bdd->query('SELECT * FROM comment WHERE item_id = '.$idItem.'');
        $req->rowCount();
       
        if ($req==0 || $req==null) {
            return false;
        } else {
            
        return $req;

        }

    }

    // complete un commentaire par son id
    public function completeComment($idComment){
        $req = $this->bdd->query('SELECT * FROM comment WHERE comment_id = '.$idComment.'');
        $result= $req->rowCount();
        
       
        if ($result==0) {
            return false;
        } else {
            $comment =  $req->fetch(PDO::FETCH_OBJ);
            $this->setId($comment->comment_id);
            $this->setDesc($comment->comment_desc);
            $this->setTime($comment->comment_time);
            $this->setDate($comment->comment_date);
            $this->setUserPseudo($comment->user_pseudo);
            $this->setUser($comment->user_id);
            $this->setProject($comment->project_id);
            $this->setItem($comment->item_id);
            
        return $this;

        }

    }

    // Ajouter un commentaire en bdd

    public function addComment(){

        // on ajouter un commentaire

        $req = $this->bdd->prepare('INSERT INTO comment(comment_desc, user_id, user_pseudo, item_id, project_id, comment_time) VALUES(?, ?, ?, ?, ?, CURTIME())');
        return $req->execute([$this->_desc, $this->_user, $this->_userPseudo, $this->_item, $this->_project]);



    }

    // supprimer un commentaire par son id de projet

    public function deleteCommentByProject($id){

        $req = $this->bdd->query('DELETE FROM comment WHERE project_id = '.$id.'');
        return $req;


    }

    

    // supprimer un commentaire par son id d'article

    public function deleteCommentByItem($id){

        $req = $this->bdd->query('DELETE FROM comment WHERE item_id = '.$id.'');
        return $req;

        
    }

    // supprimer un commentaire par son id
    public function deleteCommentById($id){

        $req = $this->bdd->query('DELETE FROM comment WHERE comment_id = '.$id.'');
        return $req;

        
    }


}