

    <section id="dashContent">

        <!-- Grille avec les options admin -->
      
        <div class="container p-5">

        <h1 class="mb-5 text-center"> Dashboard </h1>

            <div class="row">
                <div class="col-lg">

                    <div class="card">
                        <!-- Image d'illustration -->
                        <img src="assets/img/imgDashboard1.jpg"
                            class="card-img-top fitImg " height="300px" alt="Montagnes">

                        <!-- En-tête de la carte -->
                        <div class="card-header">
                            Gérer les projets
                        </div>

                        <!-- Corps -->
                        <div class="card-body">
                            <h5 class="card-title"> Projets</h5>
                            <h6 class="card-subtitle text-muted">Gestion</h6>
                            <p class="card-text"> Supression modification ou création de projet
                            </p>
                            
                           
                                <a class="btn btn-primary text-white" href="?page=ajoutProjet">Ajouter un projet</a>
                           
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#ajoutProjet">
                                Voir les projets
                            </button>
                            
                        </div>


                    </div>
                </div>
                <div class="col-lg">

                    <div class="card">
                        <!-- Image d'illustration -->
                        <img src="assets/img/imgDashboard2.jpg"
                            class="card-img-top" height="300px" alt="Montagnes">

                        <!-- En-tête de la carte -->
                        <div class="card-header">
                            Gérer les articles
                        </div>

                        <!-- Corps -->
                        <div class="card-body">
                            <h5 class="card-title">Articles</h5>
                            <h6 class="card-subtitle text-muted">Gestion</h6>
                            <p class="card-text"> Supression modification ou création d'article
                            </p>
                            
                            <a class="btn btn-primary text-white" href="?page=ajoutArticle">Ajouter un article</a>
                           
                           <button type="button" class="btn btn-success" data-bs-toggle="modal"
                               data-bs-target="#ajoutArticle">
                               Voir les articles
                           </button>
                        </div>


                    </div>
                </div>


            </div>

        </div>






        <!-- Modale -->


        <div class="modal fade" id="ajoutProjet" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <!-- Header -->
                    <div class="modal-header">
                        <h5 class="modal-title">Tous les projets</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">

                        </button>
                    </div>

                    <!-- Body -->
                    <div class="modal-body">
                        <div class="col" style="height: 400px; overflow-y: auto;">
                        <?php 
                        $tab = array();
                        while ($project = $d1->fetch(PDO::FETCH_OBJ)){
                            echo '
                            <div class="row bg-light mb-1 p-2">
                                <a class="text-decoration-none" href="?page=modifProjet&id='.$project->project_id.'"><img src="'.$project->project_img.'"
                                        class="imgAvatar"> '. $project->project_title . '</a>
                            </div>';

                            array_push($tab, $project);

                        }

                        ?>
                        
                            

                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="button" class="btn btn-danger">Supprimer</button>
                    </div>

                </div>
            </div>
        </div>

        <!--Modale article -->


        <div class="modal fade" id="ajoutArticle" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <!-- Header -->
                    <div class="modal-header">
                        <h5 class="modal-title">Choisissez un projet</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">

                        </button>
                    </div>

                    <!-- Body -->
                    <div class="modal-body">
                        <div class="col" style="height: 400px; overflow-y: auto;">
                        <?php 
                        $i=0;
                          while(isset($tab[$i])){
                            echo '
                            <div class="row bg-light mb-1 p-2">
                                <a class="text-decoration-none" href="?page=selectArticle&id='.$tab[$i]->project_id.'"><img src="'.$tab[$i]->project_img.'"
                                        class="imgAvatar"> '. $tab[$i]->project_title . '</a>
                            </div>';
                            $i++;


                          }
                        

                      

                        ?>
                        
                            

                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="button" class="btn btn-danger">Supprimer</button>
                    </div>

                </div>
            </div>
        </div>

    </section>





