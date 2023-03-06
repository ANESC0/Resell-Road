<?php


function home() {
        require('view/home.php');
    }


 function formulaireUser(){
    require('view/inscription.php');

 }   


function addUser($pseudo, $email, $password, $passwordTwo){

    

       // on construit l'objet
        $userM = new UserManager($pseudo, $email, 1);

      //  on inscrit l'utilisateur

        $userM->inscription($password,$passwordTwo);



}