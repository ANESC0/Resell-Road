<?php

namespace MVC\User;

require_once('Manager.php');

class UserManager extends \MVC\Manager\Manager {

    // Attributs
    private $_id=-1;
    private $_pseudo;
    private $_mail;
    private $_type;
 

    // Constructeur
    public function __construct($pseudo, $mail, $type)
    {
    
        $this->_pseudo=$pseudo;
        $this->_mail=$mail;
        $this->_type=$type;

    }

        // Setters
        public function setPseudo($pseudo) {
            $this->_pseudo = $pseudo;
        }
        public function setModele($mail) {
            $this->_mail = $mail;
        }

    public function inscription($mdp,$mdp2){

        // connexion bdd

        $bdd = $this->connection();

        // on verifie les valeurs
        if($password != $passwordTwo) {

            
            
            throw new Exception("Vos mots de passe ne sont pas identiques.");
			
			//exit();

		}

		// L'adresse email est-elle correcte ?
		if(!filter_var($this->_email, FILTER_VALIDATE_EMAIL)) {

            throw new Exception("Votre adresse email est invalide.");

            

		
			//exit();

		}
		
		// L'adresse email est-elle en doublon ?
		$req = $bdd->prepare('SELECT COUNT(*) as numberEmail FROM user WHERE email = ?');
		$req->execute([$this->_email]);

		while($emailVerification = $req->fetch()) {

			if($emailVerification['numberEmail'] != 0) {
                throw new Exception("Votre adresse email est déjà utilisée par un autre utilisateur.");


				//exit();

			}

		}

		// Chiffrement du mot de passe
		$password = "aq1".sha1($password."123")."25";

		// Secret
		$secret = sha1($this->_email).time();
		$secret = sha1($secret).time();

		// Ajouter un utilisateur
		$req = $bdd->prepare('INSERT INTO user(email, password, secret) VALUES(?, ?, ?)');
		$result=$req->execute([$this->_email, $this->_password, $secret]);

        if($result === false) {
            throw new Exception("Impossible d'ajouter votre avis pour le moment.");
        }
        else {
            header('location: index.php?page=accueil');
            exit();
        }

		





    }


}