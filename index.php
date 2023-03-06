<?php

require('controller/controller.php');

    try {
        if(isset($_GET['page'])) {

            if($_GET['page'] == 'accueil') {
                home();
            }
            else if($_GET['page'] == 'insc') {
                if(!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_two']))  {
                    addUser(htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['email']),htmlspecialchars($_POST['password']),htmlspecialchars($_POST['password_two']));
                }
                else {
                    formulaireUser();
                }
            }
            else {
                throw new Exception("Cette page n'existe pas ou a été supprimée.");
            }

        }
        else {
            home();
        }
    }
    catch(Exception $e) {
        $error = $e->getMessage();
        require('view/errorView.php');
    }