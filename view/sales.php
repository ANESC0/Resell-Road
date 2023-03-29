<section id="sales" class="p-4 text-center">
    <div class="container">
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
                        <a href="index.php?page=project&id='.$project->project_id.'" class="card-link">En savoir plus</a>
                        
                    </div>
                </div>
                    
                    
                    ';

                }


                   ?>


            </div>




        </div>
    </div>
</section>