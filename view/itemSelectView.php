<section id="selectItem">
    <div class="container p-4">

<h1 class="text-center mb-3"><?= $d1->project_title ?></h1>

<?php
 while ( $items = $d2->fetch(PDO::FETCH_OBJ) ){
    echo '<div class="row bg-light mb-1"><a class="text-decoration-none" href="?page=modifArticle&id='.$items->item_id.'"><img src="'.$items->item_img.'"
    class="imgAvatar"> '. $items->item_title . '</a></div>';
 }
?>

</div>

</section>