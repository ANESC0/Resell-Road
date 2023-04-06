<section id="dashUpdateItem">
    <div class="container p-5">
        <h1> Modifier un article</h1>
        <form method="post" enctype="multipart/form-data" class="mt-5 p-2">
            <p>
                <label for="titre" class="form-label">Titre de l'article</label>
                <input type="text" name="titre" id="titre" class="form-control" placeholder="<?= $d1->item_title ?>" maxlength="60">
            </p>


            <p>
                <label for="description" class="form-label">Description de l'article</label>
                <textarea name="description" class="form-control" placeholder="<?= $d1->item_desc ?>"></textarea>

            </p>
            <p>
            <div class="input-group">
                <span class="input-group-text">
                    Prix d'achat
                </span>
                <input type="number" name="purchase" maxlength="15" class="form-control" maxlength="7" placeholder="<?= $d1->item_purchase ?>"></input>
            </div>
            <div class="input-group">
                <span class="input-group-text">
                    Prix de vente
                </span>
                <input type="number" name="sale" maxlength="15" class="form-control" maxlength="7" placeholder="<?= $d1->item_sale ?>"></input>

            </div>

            </p>

            <p>
                <label for="brand" class="form-label">Marque de l'article</label>
                <input name="brand" class="form-control" maxlength="60" placeholder="<?= $d1->item_brand ?>"></input>


            </p>
            <p>
                <select class="form-control" name="project">
                    <?php
                    while ($project = $d2->fetch(PDO::FETCH_OBJ)){
                        if ($project->project_id==$d1->project_id){
                            echo '<option value="'.$project->project_id.'" selected> '.$project->project_title.' </option>';
                        } else {

                        
                        echo '<option value="'.$project->project_id.'"> '.$project->project_title.' </option>';
                        }
                    }
                    ?>
                    
                </select>
            </p>


            <p>
                <img src="<?= $d1->item_img ?>" height="200px">
                <br>
                <input type="file" name="img" id="img">
            </p>




            <button class="form-control bg-primary text-white" type="submit">Valider</button>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#supprimer">
                Supprimer Le projet
            </button>





        </form>
        

    </div>

    
        <!-- Modale -->


        <div class="modal fade" id="supprimer" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <!-- Header -->
                    <div class="modal-header">
                        <h5 class="modal-title">Supprimer le projet</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>

                    <!-- Body -->
                    <div class="modal-body">
                        <p class="m-0">Etes-vous sûr de vouloir supprimmer le projet?</p>
                    </div>

                    <!-- Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fermer</button>
                        <a href="?page=suppArticle&id=<?=  $d1->item_id ?>" class="btn btn-danger">Supprimer</a>
                    </div>

                </div>
            </div>
        </div>
</section>