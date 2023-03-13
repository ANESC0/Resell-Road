<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='public/design/css/base.css' rel="stylesheet">
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-md  float-nav sticky-top p-3" id="navB">
            <div class="container">
                <div class="navbar-brand text-white">
                    Resell Road
                </div>
                <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarText">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div id="navbarText" class="collapse navbar-collapse justify-content-between">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="?page=home" class="nav-link">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=sales" class="nav-link">Mes ventes</a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=signin" class="nav-link">Qui je suis?</a>
                        </li>

                    </ul>
                    <ul class="navbar-nav">

                        <li class="nav-item dropdown">
                         
                       

                        <?php
                    // si session on affiche l'user
                    if ($isConnect==true){
                        echo '   <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa-regular fa-user"></i> <span> ' . $userPseudo . '
                  </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="?page=logout">Se déconnecter</a></li>
                        
                    </ul>';
                    } else {

                        // sinon on affiche par defaut

                        echo ' <button type="button" id="btnConnection" class="btn" data-bs-toggle="modal"
                        data-bs-target="#login">
                        <i class="fa-regular fa-user"></i> <span> ' . $userPseudo . '
                     </span>
                        </button>';
                        }
                        ?>
                        </li>




                    </ul>

                </div>
            </div>
        </nav>
    </header>


    <?= $content ?>



    <!-- Modale -->


    <div class="modal fade" id="login" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Header -->
                <div class="modal-header">
                    <h5 class="modal-title"> Connection</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">

                    </button>
                </div>




                <div class="modal-body">
                    <form method="post" action="http://localhost/Resell-Road/index.php?page=login" class="p-2">
                        <div style="background-color:#1e2022;" class="mb-2">
                            <img src="public/assets/logo/logo.png" class="figure-img img-fluid rounded">
                        </div>

                        <p>
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Votre adresse email"
                                required />

                        </p>

                        <p>

                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" name="password" class="form-control" placeholder="Mot de passe"
                                required />
                        </p>



                        <button class="form-control" type="submit">Se connecter</button>



                    </form>

                </div>
            </div>

        </div>
    </div>





    <footer>
        <div class="container p-3">
            © Resell Road 2023
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>



</body>

</html>