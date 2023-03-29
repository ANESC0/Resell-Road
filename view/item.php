<section id="project" class="p-4 text-center">

    <div id="intro-Pt1" class="container">
        <div class="def p-2">
            <h1 class="p-3 titre mb-4 fw-bold rounded"> Article - <?= $d1->item_title ?></h4>

                <div class="row">

                    <div class="col">


                        <img class="w-50" src="<?= $d1->item_img?>">
                    </div>
                    <div class="col">
                        <p> <?= $d1->item_desc ?></p>



                    </div>



                </div>

        </div>
    </div>
</section>
<section id="commentaire" class="p-4">
    <div class="container">
        <h2>Commentaire de l'article</h2>

        <div class="card mt-3">

            <!-- En-tête de la carte -->
            <div class="card-header">
                <p> <img src="assets/avatar/ichigo.jpg" height="50px" class="imgAvatar"> <span
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