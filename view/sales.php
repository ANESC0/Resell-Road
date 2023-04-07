<section id="sales" class="p-4 text-center">
    <div class="container">
        <h4 class="titre p-3 text-center">Mes ventes</h4>
        <div class="container">
        
            <div class="row text-center p-4">



                <?php
                $first=false;
                while ($project = $d1->fetch(PDO::FETCH_OBJ)){
                    if ($first==false){
                        $first= $project->project_id;
                        if($first<0){
                            $first=0;
                        }
                        
                    }

                    echo '
                    <div class="col-lg card mb-4 shadow-sm">
                    <img  height="100px" src="'.$project->project_img.'"  class="card-img-top" style="object-fit: cover;" >


                    <!-- En-tête de la carte -->
                    <div class="card-header rounded text-white bg-resellroad">
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
                    <div class="card-footer bg-resellroad rounded text-white p-0">
                        <a href="index.php?page=project&id='.$project->project_id.'" class="card-link text-title">En savoir plus</a>
                        
                    </div>
                </div>
                    
                    
                    ';
                    $idex = $project->project_id;

                }


                   ?>
                   <span class="bg-resellroad text-white">
                   <a href="?page=sales&id=<?= $first-5 ?>" class="text-title" style="font-size:36px"><i class="fa-solid fa-arrow-left"></i></a>

                <a href="?page=sales&id=<?= $idex+1 ?>" class="text-title" style="font-size:36px"><i class="fa-solid fa-arrow-right"></i></a>
                
            </span>

            </div>




        </div>
    </div>
</section>