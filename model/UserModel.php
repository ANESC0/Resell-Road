<?php

require_once('DbManager.php');


class UserModel extends DbManager {

    // Attributs
    private $_id=-1;
    private $_pseudo;
    private $_mail;
    private $_type;
    

    // Constructeur
    public function __construct() {
        parent::__construct();
        $this->_type = 1;
    }

    // Setters
    public function setPseudo($pseudo) {
        $this->_pseudo = $pseudo;
    }

    public function setMail($mail) {
        $this->_mail = $mail;
    }

    public function setType($type){
        $this->_type = $type;
    }

    public function setPassword($password){
        $this->_password = $password;
    }

    public function setSecret($secret){
        $this->_secret = $secret;
    }


    // Getters
    public function getId() {
        return $this->_id;
    }

    public function getPseudo() {
        return $this->_pseudo;
    }

    public function getMail() {
        return $this->_mail;
    }

    public function getType(){
        return $this->_type;
    }

    public function getPassword(){
        return $this->_password;
    }

    public function getSecret(){
        return $this->_secret;
    }

    // Methodes
    
    protected function hashPassword($password) {
        return "aq1".sha1($password."123")."25";
    }

    protected function generateSecret($email) {
        $secret = sha1($this->_mail).time();
        return sha1($secret).time();
    }
    
    
    public function save(){
		// L'adresse email est-elle en doublon ?
		$req = $this->bdd->prepare('SELECT COUNT(*) as numberEmail FROM user WHERE user_email = ?');
		$req->execute([$this->_mail]);

		while($emailVerification = $req->fetch()) {

			if($emailVerification['numberEmail'] != 0) {
                throw new Exception("Votre adresse email est déjà utilisée par un autre utilisateur.");
			}

		}

		// Chiffrement du mot de passe
		$password = $this->hashPassword($this->_password);

		// Secret
        $secret = $this->generateSecret($this->_mail);
		

		// Ajouter un utilisateur
		$req = $this->bdd->prepare('INSERT INTO user(user_pseudo, user_email, user_password, user_secret, user_type) VALUES(?, ?, ?, ?, ?)');
		return $req->execute([$this->_pseudo, $this->_mail, $password, $secret, $this->_type]);

    }

    public function findByEmail($email){
		$req = $this->bdd->prepare('SELECT * FROM user WHERE user_email = ?');
		$req->execute([$email]);
        $result= $req->rowCount();
        if ($result==0) {
            return false;
        } else {
            $user =  $req->fetch(PDO::FETCH_OBJ);
            $this->setPseudo($user->user_pseudo);
            $this->setMail($user->user_email);
            $this->setSecret($user->user_secret);
            $this->setPassword($user->user_password);
            $this->setType($user->user_type);
    
            return $this;

        }
      
    }

    public function findBySecret($secret){
        $req = $this->bdd->prepare('SELECT * FROM user WHERE user_secret = ?');
        $req->execute([$secret]);
        $result= $req->rowCount();
        if ($result==0) {
            return false;
        } else {
            $user =  $req->fetch(PDO::FETCH_OBJ);
            $this->setPseudo($user->user_pseudo);
            $this->setMail($user->user_email);
            $this->setSecret($user->user_secret);
            $this->setPassword($user->user_password);
            $this->setType($user->user_type);
    
            return $this;
        }
    }

    public function isValidPassword($password) {
        $hashPassword = $this->hashPassword($password);
        return $this->_password === $hashPassword;
    }

}