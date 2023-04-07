<section id="dashUpdateProject">
    <div class="container p-5">
        <h1 class="bg-resellroad text-title rounded p-2 text-center"> Modification de Projet </h1>
        <form method="post" enctype="multipart/form-data" class="mt-5 p-3 bg-light rounded">
            <p>
                <label for="titre" class="form-label">Titre du projet</label>
                <input type="text" name="titre" id="titre" placeholder="<?= $d1->project_title ?>" class="form-control">
            </p>


            <p>
                <label for="description" class="form-label">Description du projet</label>
                <textarea name="description" placeholder="<?= $d1->project_desc ?>" class="form-control"></textarea>

            </p>
            <p>
            <div class="input-group">
                <span class="input-group-text">
                    Montant à Obtenir
                </span>
                <input name="montant" maxlength="15" placeholder="<?= $d1->project_goalamount ?>"
                    class="form-control"></input>
            </div>

            </p>


            <p>
                <img src="<?= $d1->project_img ?>" width="200px">
                <br>
                <input type="file" class="form-control" name="img" id="img">
            </p>


            <button class="form-control bg-primary text-white" type="submit">Valider</button>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#supprimer">
                Supprimer Le projet
            </button>





        </form>

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
                        <a href="?page=suppProjet&id=<?=  $d1->project_id ?>" class="btn btn-danger">Supprimer</a>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>