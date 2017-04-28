<?php include_once ('/controlers/Categorie.class.php') ?>

<p class="lead">Catégories</p>
<div class="list-group">
    <a href="?categorie=Tout" class="list-group-item <?php echo Categorie::CSSActiveCategorie("Tout") ?>">Tout afficher</a>
    <?php
    $listeCategories = ProduitDAO::findAllCategories();
    while ($listeCategories->next()) {
        $categorie = $listeCategories->current();
        ?>
        <a href="?categorie=<?php echo $categorie ?>" class="list-group-item <?php echo Categorie::CSSActiveCategorie($categorie) ?>">• <?php echo $categorie ?></a>
    <?php } ?>
    <a href="?categorie=" class="list-group-item <?php echo Categorie::CSSActiveCategorie(null) ?>">• Non catégorisés</a>
    <a href="?categorie=Special" class="list-group-item <?php echo Categorie::CSSActiveCategorie("Special") ?>">En special</a>
</div>    
