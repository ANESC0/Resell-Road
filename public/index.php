<?php
session_start();

// imports 
require('../vendor/session/SessionHelper.php');
require('../vendor/image/ImageHelper.php');
// models
require('../model/UserModel.php');
require('../model/ProjectModel.php');
require('../model/ItemModel.php');
// controllers
require('../controller/BaseController.php');
require('../controller/HomeController.php');
require('../controller/UserController.php');
require('../controller/ProjectController.php');
require('../controller/ItemController.php');
require('../controller/DashboardController.php');


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
                        $idexProj = 0;
    
                    } else {
                        $idexProj = $_GET['id'];
    
                    }
                    $controller = new ProjectController();
                    $controller->projects($idexProj);
                    break;

                    // projet en detail
                case 'project':
                    if (empty($_GET['id'])){
                        $idProj = 1;
    
                    } else {
                        $idProj = $_GET['id'];
    
                    }
                    $controller = new ProjectController();
                    $controller->projectById($idProj);
                    break;
                
                    // article en detail
                case 'article':
                    if (empty($_GET['id'])){
                        $idArticle = 1;
    
                    } else {
                        $idArticle = $_GET['id'];
    
                    }
                    $controller = new ItemController();
                    $controller->getItem($idArticle);
                    break;

                case 'dashboard':
                    $controller = new DashboardController();
                    $controller->getContent();
                    break;

                case 'ajoutProjet':
                    $controller = new DashboardController();
                    $controller->addProject();
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