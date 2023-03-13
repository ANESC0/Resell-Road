<?php

  class UserController extends BaseController{

   public function __construct() {
      parent::__construct();
    }

   

   //--------------------------------------------------------------------------


   // Ajout d'un utilisateur en bdd : iNSCRIPTION
         function signIn(){

         $titleF = "Inscription - Resell Road";
         $usePseudo = "Connexion";
         $isConnect = false;
         $d1='';
         $d2='';

         if ($this->session->isVarExist('userSecret')) {
            $user = new UserModel();
            $user->findBySecret($this->session->getVar('userSecret'));
            if (!$user) {
               throw new Exception('Session corrompue !');
            }
            $usePseudo = $user->getPseudo();
            }
      
            if($this->session->isVarExist('connect')){
            $isConnect = true;
      
            }
      
   


    // si le formulaire est rempli on valide l'inscription sinon on renvoit la vue

      if (!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_two']))  {
         
         if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Votre adresse email est invalide.");
         }

         if ($_POST['password'] != $_POST['password_two']) {
            throw new Exception("Vos mots de passe ne sont pas identiques.");
         }

         // on construit l'objet
         $userModel = new UserModel();
         $userModel->setPseudo(htmlspecialchars($_POST['pseudo']));
         $userModel->setMail(htmlspecialchars($_POST['email'])); 
         $userModel->setPassword(htmlspecialchars($_POST['password']));
         
         //  on inscrit l'utilisateur

         if (!$userModel->save()) {
            throw new Exception("Impossible de créer l'utilisateur");
         }
         else {
            header('location: index.php?page=home');
            exit();
         }
         
      } else {
        $this->render('signin', $titleF , $d1, $d2, $usePseudo  , $isConnect , '', false);
      }
   }

   //-----------------------------------------------------------------------------

   // Connexion d'un utilisateur existant

   function logIn(){


      if(!empty($_POST['email']) && !empty($_POST['password'])) {
         
         if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            throw new Exception("une ou plusieurs information(s) est(sont) incorrect(s)");
         }

         $userModel = new UserModel();
         $user = $userModel->findByEmail(htmlspecialchars($_POST['email']));
         
         if (!$user) {
            throw new Exception('Utilisateur invalide');
         }

         if ($user->isValidPassword(htmlspecialchars($_POST['password']))) {
            $_SESSION['connect'] = 1;
            $_SESSION['userSecret']	 = $user->getSecret();

            if(isset($_POST['auto'])) {
               setcookie('auth', $user->getSecret(), time() + 365*24*3600, '/', null, false, true);
            }

            // on décide ou est redirigé l'utilisateur suivant si il est admin ou non
            $userType = $user->getType();

            if ($userType == 2){
                header('location: index.php?page=dashboard/admin');
                exit();

            } else {
                header('location: index.php?page=home');
                exit();
            }

          
         }
         else {
            throw new Exception("une ou plusieurs information(s) est(sont) incorrect(s)");
         }
      }

      throw new Exception("une ou plusieurs information(s) est(sont) incorrect(s)");
   }
   
   function logOut(){

      session_unset(); // Désactiver
      session_destroy(); // Détruir
  
      //setcookie('auth', '', time() - 1);
  
      header('location: index.php?page=home');
      exit();

   }
}