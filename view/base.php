<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href='public/design/css/base.css' rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-md sticky-top p-3" id="navB">
            <div class="container">
                <div class="navbar-brand text-white">
                    Resell Road
                </div>
                <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarText">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div id="navbarText" class="collapse navbar-collapse">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Mes ventes</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Qui je suis?</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div id="home" class="p-3 shadow-lg">
        <div id="Presentation" class="container" style="padding: 100px 10px;">
        <img src="public/assets/logo/logo.png" class="figure-img img-fluid rounded">
            <h1 class="display-4">Bienvenue.</h1>
            <p>
                Le resell est de nos jours un moyen simple de s'enrichir. En effet il est possible grâce à la
                popularisation des marchés de seconde main comme le permet l'application Vinted ou bien Leboncoin pour
                citer les plus connus
                <span class="badge bg-success">Un conseillé est en ligne.</span>
            </p>
        </div>



    </div>

    <div class="bg1 p-3 text-light text-center">
    </div>

    <?= $content ?>




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