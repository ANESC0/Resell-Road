
    <section id="dashAddProject">
        <div class="container p-5">
            <form method="post" enctype="multipart/form-data" class="mt-5">
                <p>
                    <label for="titre" class="form-label">Titre du projet</label>
                    <input type="text" name="titre" id="titre" class="form-control" required>
                </p>


                <p>
                    <label for="description" class="form-label">Description du projet</label>
                    <textarea name="description" class="form-control" required></textarea>

                </p>
                <p>
                <div class="input-group">
                    <span class="input-group-text">
                        Montant à Obtenir
                    </span>
                    <input name="montant" maxlength="15" class="form-control" required></input>
                </div>

                </p>


                <p>
                    <label for="img">Sélectionnez votre fichier</label><br>
                    <input type="file" name="img" id="img">
                </p>


                <button class="form-control bg-primary text-white" type="submit">Valider</button>





            </form>

        </div>
    </section>

