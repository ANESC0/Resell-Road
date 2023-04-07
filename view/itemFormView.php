<section id="dashAddItem">
    <div class="container p-5">
        <h1 class="bg-resellroad text-title rounded p-2 text-center"> Ajouter un article</h1>
        <form method="post" enctype="multipart/form-data" class="mt-5 p-3 bg-light rounded">
            <p>
                <label for="titre" class="form-label">Titre de l'article</label>
                <input type="text" name="titre" id="titre" class="form-control" maxlength="60" required>
            </p>


            <p>
                <label for="description" class="form-label">Description de l'article</label>
                <textarea name="description" class="form-control" required></textarea>

            </p>
            <p>
            <div class="input-group">
                <span class="input-group-text">
                    Prix d'achat
                </span>
                <input type="number" name="purchase" maxlength="15" class="form-control" maxlength="7" required></input>
            </div>
            <div class="input-group">
                <span class="input-group-text">
                    Prix de vente
                </span>
                <input type="number" name="sale" maxlength="15" class="form-control" maxlength="7" required></input>

            </div>

            </p>

            <p>
                <label for="brand" class="form-label">Marque de l'article</label>
                <input name="brand" class="form-control" maxlength="60" required></input>


            </p>
            <p>
                <select name="project">
                    <?php
                    while ($project = $d1->fetch(PDO::FETCH_OBJ)){
                        echo '<option value="'.$project->project_id.'"> '.$project->project_title.' </option>';
                    }
                    ?>
                    
                </select>
            </p>


            <p>
                <label for="img">Sélectionnez votre fichier</label><br>
                <input type="file" class="form-control" name="img" id="img">
            </p>




            <button class="form-control bg-primary text-white" type="submit">Valider</button>





        </form>

    </div>
</section>