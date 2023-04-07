<section id="updateComment">
    <div class="container p-5">
        <h1 class="bg-resellroad text-title  rounded h2 p-2 text-center"> Modifier un commentaire
        </h1>
        <form method="post" enctype="multipart/form-data" class="mt-5 p-2 bg-light">
           


            <p>
                <label for="description" class="form-label">Contenu du commentaire</label>
                <textarea name="description" class="form-control" placeholder="<?= $d1->getDesc() ?>"></textarea>

            </p>
          
           





            <button class="form-control bg-primary text-white" type="submit">Valider</button>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#supprimer">
                Supprimer Le commentaire
            </button>





        </form>
        

    </div>

    
        <!-- Modale -->


        <div class="modal fade" id="supprimer" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <!-- Header -->
                    <div class="modal-header">
                        <h5 class="modal-title">Supprimer le commentaire</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>

                    <!-- Body -->
                    <div class="modal-body">
                        <p class="m-0">Etes-vous sûr de vouloir supprimmer le commentaire?</p>
                    </div>

                    <!-- Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fermer</button>
                        <a href="?page=suppComment&id=<?=  $d1->getId() ?>" class="btn btn-danger">Supprimer</a>
                    </div>

                </div>
            </div>
        </div>
</section>