<?php include_once ('/controlers/Categorie.class.php') ?>

<p class="lead">Catégories</p>
<div class="list-group">
    <a href="#" class="list-group-item <?php echo Categorie::CSSActiveCategorie("Tout") ?>">Tout afficher</a>
    <?php
    $listeCategories = ProduitDAO::findAllCategories();
    while ($listeCategories->next()) {
        $categorie = $listeCategories->current();

        ?>
        <a href="#" class="list-group-item <?php echo Categorie::CSSActiveCategorie($categorie) ?>"><?php echo $categorie ?></a>
    <?php } ?>
    <a href="#" class="list-group-item <?php echo Categorie::CSSActiveCategorie(null) ?>">Non catégorisé</a>
</div>    
