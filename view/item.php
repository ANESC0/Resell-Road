<section id="project" class="p-4 text-center">

    <div id="intro-Pt1" class="container">
        <div class="def p-2">
            <h1 class="p-3 titre mb-4 fw-bold rounded"> Article - <?= $d1->item_title ?></h4>

                <div class="row">

                    <div class="col-xl">


                        <img class="w-50 rounded" src="<?= $d1->item_img?>">
                    </div>
                    <div class="col-xl mt-2 bg-light rounded">
                        <div class="row p-2 rounded text-start">
                            <p> <?= $d1->item_desc ?></p>
                        </div>
                        <div class="row p-2 mt-2 text-start">
                        <p> <b>Marque :</b> <?= $d1->item_brand ?> </p>
                            <p> <b>Prix d'achat :</b> <?= $d1->item_purchase ?> €</p>
                            <p> <b>Prix de vente :</b> <?= $d1->item_sale ?> € </p>
                            
                        </div>

                        <p class="text-end"> Mis en ligne en <?= $d1->item_date ?> </p>



                    </div>



                </div>

        </div>
    </div>
</section>
<section id="commentaire" class="p-4">
    <div class="container">
        <h2>Commentaire de l'article</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#comment">
            ajouter un commentaire
        </button>

        <?php
        while ($comment = $d2->fetch(PDO::FETCH_OBJ)){
            if($userPseudo==$comment->user_pseudo){
                // afficher un commentaire modifiable ou supprimmable
                echo '
                <div class="card mt-3">
        
                    <!-- En-tête de la carte -->
                    <div class="card-header bg-dark text-white">
                        <p> <img src="assets/avatar/default.jpg" height="50px" class="imgAvatar"> <span
                                class="fs-5 text-color1 text-break"> '. $comment->user_pseudo .' </span> </p>
                    </div>
        
                    <!-- Corps -->
                    <div class="card-body">
        
                        <p class="card-text">'.$comment->comment_desc.'
                        </p>
                        <p class="text-end">
                        '.$comment->comment_date.' / '.$comment->comment_time.'
                        </p>
        
                    </div>

                    <!-- Pied -->
                    <div class="card-footer p-0">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                            <span class="fa-stack fa-1x">
                            <i class="fas fa-circle fa-stack-2x text-success"></i>
                            <i class="fas fa-pen-to-square fa-stack-1x text-white"></i>
    
                        </span><a href="?page=modifComment&id='.$comment->comment_id.'">Modifier</a></li>
                        <li class="list-group-item">
                            <span class="fa-stack fa-1x">
                            <i class="fas fa-circle fa-stack-2x text-danger"></i>
                            <i class="fas fa-eraser fa-stack-1x text-white"></i>
    
                        </span><a href="?page=suppComment&id='.$comment->comment_id.'">Supprimer</a></li>
                          
                        </ul>
                    </div>
        
        
                </div>';
            } else {

                echo '
                <div class="card mt-3">
        
                    <!-- En-tête de la carte -->
                    <div class="card-header bg-dark text-white">
                        <p> <img src="assets/avatar/default.jpg" height="50px" class="imgAvatar"> <span
                                class="fs-5 text-color1 text-break">'.$comment->user_pseudo.'</span> </p>
                    </div>
        
                    <!-- Corps -->
                    <div class="card-body">
        
                        <p class="card-text">'.$comment->comment_desc.'
                        </p>
                        <p class="text-end">
                        '.$comment->comment_date.' / '.$comment->comment_time.'
                        </p>
        
                    </div>
        
        
                </div>';
    

            }
           
        }
        ?>

        <div class="card mt-3">

            <!-- En-tête de la carte -->
            <div class="card-header">
                <p> <img src="assets/avatar/default.jpg" height="50px" class="imgAvatar"> <span
                        class="fs-5 text-color1 text-break">Anesco</span> </p>
            </div>

            <!-- Corps -->
            <div class="card-body">

                <p class="card-text">Article très interessant ! ou l'as tu trouvé!
                </p>

            </div>


        </div>

        <div class="card mt-3">

            <!-- En-tête de la carte -->
            <div class="card-header bg-dark text-white">
                <p> <img src="assets/avatar/white.jpg" class="imgAvatar"> <span
                        class="fs-5 p-2 text-color1 text-break">Paco</span> </p>
            </div>

            <!-- Corps -->
            <div class="card-body p-3">

                <p class="card-text">Article très interessant ! ou l'as tu trouvé!
                    Article très interessant ! ou l'as tu trouvé!
                    Article très interessant ! ou l'as tu trouvé!
                    Article très interessant ! ou l'as tu trouvé!

                    Article très interessant ! ou l'as tu trouvé!

                </p>

            </div>


        </div>

    </div>



</section>

<!-- Modale -->


<div class="modal fade" id="comment" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Header -->
            <div class="modal-header">
                <h5 class="modal-title">Ajouter un commentaire</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">

                </button>
            </div>

            <!-- Body -->
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" class=" p-2">
                    <p class="mb-3">Pour inscrire un commentaire sur l'article , vous devez posséder un compte et être
                        authentifier. Vous pouvez vous inscrire / connecter en cliquant ici</p>
                    <textarea name="commentaire" class="form-control" required></textarea>
                    <button class="form-control bg-primary text-white" type="submit">Valider</button>
                </form>
            </div>

            <!-- Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-danger">Supprimer</button>
            </div>

        </div>
    </div>
</div>