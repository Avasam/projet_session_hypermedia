<?php include_once ('/controlers/activeCategorie.php') ?>

<p class="lead">Catégories</p>
<div class="list-group">
    <a href="#" class="list-group-item <?php echo activeCategorie("Tout") ?>">Tout afficher</a>
    <?php
    //    $listeProduits = null;
    //    if (ISSET($_SESSIONI['categorie']))
    //        $listeProduits = $produitDAO.findByCategorie($_SESSION['categorie']);
    //    else
    //        $listeProduits = $produitDAO.findAll();
    for ($i = 1; $i <= 7; $i++) {
    ?>

    <a href="#" class="list-group-item <?php echo activeCategorie("Catégorie ".$i) ?>">Category <?php echo $i ?></a>
    <?php } ?>
    <a href="#" class="list-group-item <?php echo activeCategorie(null) ?>">Non catégorisé</a>
</div>    
