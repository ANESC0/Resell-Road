

    <section id="sales" class="p-4 text-center">
        <h4 class="titre p-3 text-center">Mes ventes</h4>
        <div class="container">
            <div class="row text-center p-4">
                <?php
                while ($project = $d1->fetch(PDO::FETCH_OBJ)){

                    echo '
                    <div class="col-lg card mb-4 shadow-sm">


                    <!-- En-tête de la carte -->
                    <div class="card-header">
                        '. $project->project_title .'
                    </div>

                    <!-- Corps -->
                    <div class="card-body">
                        <h5 class="card-title">Goal : '. $project->project_goalamount .'€</h5>
                        <h6 class="card-subtitle text-muted"> '. $project->project_date .'</h6>
                        <p class="card-text">'. $project->project_desc .'
                        </p>

                    </div>

                    <!-- Pied -->
                    <div class="card-footer p-0">
                        <a href="#" class="card-link">En savoir plus</a>
                        <a href="#" class="card-link">Réserver</a>
                    </div>
                </div>
                    
                    
                    ';

                }


?>

              
            </div>



            <!-- Créer un carousel -->
            <div id="monPetitCarrousel" class=" w-50 h-50 carousel slide carousel-fade" data-bs-ride="carousel">

                <!-- Indicateurs -->
                <ul class="carousel-indicators">
                    <li data-bs-target="#monPetitCarrousel" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#monPetitCarrousel" data-bs-slide-to="1"></li>
                    <li data-bs-target="#monPetitCarrousel" data-bs-slide-to="2"></li>
                </ul>

                <!-- Contenu du carousel -->
                <div class="carousel-inner">

                    <!-- Premier slide -->
                    <div class="carousel-item active" data-bs-interval="">
                        <img src="https://cdn.pixabay.com/photo/2016/04/09/02/09/please-include-your-comments-1317308_640.jpg"
                            class="w-100 d-block" alt="Japon">

                        <!-- Description -->
                        <div class="carousel-caption">
                            <h5>Le printemps arrive !</h5>
                            <p>Les fleurs de cerisiers éclosent dans tout le Japon.</p>
                        </div>
                    </div>

                    <!-- Deuxième slide -->
                    <div class="carousel-item">
                        <img src="https://cdn.pixabay.com/photo/2017/01/28/02/24/japan-2014616_640.jpg"
                            class="w-100 d-block" alt="Japon">

                        <!-- Description -->
                    </div>

                    <!-- Deuxième slide -->
                    <div class="carousel-item">
                        <img src="https://cdn.pixabay.com/photo/2017/01/28/02/24/japan-2014616_640.jpg"
                            class="w-100 d-block" alt="Japon">

                        <!-- Description -->
                    </div>

                </div>

                <!-- Controles -->
                <a class="carousel-control-prev" href="#monPetitCarrousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                    <span class="sr-only">Précédent</span>
                </a>
                <a class="carousel-control-next" href="#monPetitCarrousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                    <span class="sr-only">Suivant</span>
                </a>

            </div>
        </div>
    </section>
    <section id="comments">

        <div class=container>

            <div class="message">



            </div>
        </div>

    </section>

