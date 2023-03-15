<?php
session_start();

// imports 
require('vendor/session/SessionHelper.php');
// models
require('model/UserModel.php');
require('model/ProjectModel.php');
require('model/ItemModel.php');
// controllers
require('controller/BaseController.php');
require('controller/HomeController.php');
require('controller/UserController.php');
require('controller/ProjectController.php');


    try {

        // si page n'est pas vide
        
        if(isset($_GET['page'])) {

            switch ($_GET['page']) {
                    // Accueil
                case 'home': 
                    $controller = new HomeController();
                    $controller->index();
                    break;

                    // Inscription
                case 'signin':
                    $controller = new UserController();
                    $controller->signIn();
                    break;

                    // Connection
                case 'login':
                    if (empty($_GET['redirect'])){
                        $url = '?page=home';
    
                    } else {
                        $url = $_GET['redirect'];
    
                    }
                    $controller = new UserController();
                    $controller->logIn($url);
                    break;

                    // Deconnection
                case 'logout':
                    $controller = new UserController();
                    $controller->logOut();
                    break;

                    // Projets
                case 'sales':
                    if (empty($_GET['id'])){
                        $idProj = 0;
    
                    } else {
                        $idProj = $_GET['id'];
    
                    }
                    $controller = new ProjectController();
                    $controller->projects($idProj);
                    break;

                    // projet en detail
                case 'project':
                    if (empty($_GET['id'])){
                        $idProj = 2;
    
                    } else {
                        $idProj = $_GET['id'];
    
                    }
                    $controller = new ProjectController();
                    $controller->projectById($idProj);
                    break;
                    

                    // si aucune page trouvée
                default:
                    throw new Exception("Cette page n'existe pas ou a été supprimée.");


            }


        }
         // l'accueil est par defaut
        else {
            $controller = new HomeController();
            $controller->index();
        }
    }
    catch(Exception $e) {
        $controller = new HomeController();
        $controller->error($e->getMessage());
      
    }