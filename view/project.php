<section id="project" class="p-4 text-center">

    <div id="intro-Pt1" class="container">
        <div class="def p-2">
            <h1 class="p-3 titre mb-4 fw-bold rounded"> Projet - <?= $d1->project_title ?></h4>

                <div class="row justify-content-between">
                    <div class="col-lg-8 text-center">

                        <h2 class="p-2 "> Objectif - <?= $d1->project_goalamount ?> € </h2>

                        <?php
                                // on calcule le pourcentage de la barre
                                $pourcentage = ($d1->project_curramount * 100) / $d1->project_goalamount;
                                 echo '
                                <div class="progress">
                                    <div class="progress-bar" style="width:'.$pourcentage.'">'.$d1->project_curramount.'€</div>
                                </div>
                                ';
                                ?>



                        <p class="p-3 mt-5 mb-4 text-start bg-dark" style="color: white; border-radius: 5px;">
                            <?= $d1->project_desc ?>

                        </p>


                        <div class="tab1 mb-4">

                            <table class="table">
                                <thead>
                                    <tr class="table-light">
                                        <th>Type produit</th>
                                        <th>Prix d'achat</th>
                                        <th>Prix de vente</th>
                                        <th>Marge</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                        // on stock dans un tableau le titre et l'id de l'article
                                        $tabArt = array();
                                        // afficher tous les item du projet
                                        while ($items = $d2->fetch(PDO::FETCH_OBJ)){
                                            $benefice = $items->item_sale - $items->item_purchase;
                                            echo '
                                            <tr class="table-primary">
                                            <td class="table-light">'.$items->item_title.'</td>
                                            <td class="table-light">'.$items->item_purchase.'</td>
                                            <td class="table-light">'.$items->item_sale.'€</td>
                                            <td class="table-light">'.$benefice.'€</td>


                                        </tr>
                                            ';
                                            array_push($tabArt, $items->item_title);
                                            array_push($tabArt, $items->item_id);

                                        }
                                        ?>
                                    <tr class="table-primary">
                                        <td class="table-light">Sweat-shirt noir</td>
                                        <td class="table-light">10€</td>
                                        <td class="table-light">25€</td>
                                        <td class="table-light">15€</td>


                                    </tr>
                                </tbody>
                            </table>
                        </div>


                    </div>


                    <div class="col-lg-3" style="color: white;">

                        <h2 class="bg-dark p-1" style="color: white; border-radius: 5px;"> Articles /
                            <?= $d1->project_nbelement ?> </h2>
                        <ul class="bg-dark p-2" style="list-style-type: none; overflow-x: scroll; height: 600px">

                            <?php
                                $compteur =0;
                                $limite = count($tabArt);
                               
                                while ($compteur<$limite){
                                   
                                    echo '
                                    <li class="article1 mt-1 p-2"><a href="?page=article&id='.$tabArt[$compteur+1].'">" '.$tabArt[$compteur].'</a> </li>
                                    ';
                                    $compteur+=2;
                                }

                                ?>
                            <li class="article1 mt-1 p-2"> 2 - Pull </li>

                        </ul>
                    </div>
                </div>




        </div>
    </div>
</section>