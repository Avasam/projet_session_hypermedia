<div class="row carousel-holder">

    <div class="col-md-12">
        <div id="carousel-produit-special" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php 
                $listeProduits = ProduitDAO::findAllBySpecial();
                for ($i=0; $i<$listeProduits->length(); $i++) {
                    ?>
                    <li data-target="#carousel-produit-special" data-slide-to="<?php echo $i ?>" class="<?php echo($i==0 ? "active" : "") ?>"></li>
                <?php } ?>
            </ol>
            <div class="carousel-inner">
                <?php
                for ($i=0; $i<$listeProduits->length(); $i++) {
                    $produit = $listeProduits->get($i);
                    ?>
                <div class="item <?php echo($i==0 ? "active" : "") ?>">
                    <img class="slide-image" src="<?php echo $produit->getCheminImage() ?>" alt="">
                    <span><?php echo $produit->getNom() ?></span><span class="pull-right coupe"><?php echo $produit->getprix() ?>$</span><span class="pull-right rabais"><?php echo $produit->getPrixRabais() ?>$&nbsp;</span>
                </div>
                <?php } ?>
            </div>
            <a class="left carousel-control" href="#carousel-produit-special" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-produit-special" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
    </div>

</div>



<div class="row">
    
    <div class="col-sm-4 col-lg-4 col-md-4">
        <button type="button" class="btn btn-primary btn-add-product" data-toggle="modal" data-target="#produitModal" data-action="Ajouter"><div class="glyphicon glyphicon-plus"></div></button>
    </div>

    <?php
    if (ISSET($_REQUEST['categorie'])) {
        if ($_REQUEST['categorie'] == "Tout") {
            $listeProduits = ProduitDAO::findAll();
        } elseif ($_REQUEST['categorie'] == "Special") {
            $listeProduits = ProduitDAO::findAllBySpecial();
        } else {
            $categorie = $_REQUEST['categorie'];
            $listeProduits = ProduitDAO::findAllBy('categorie', $categorie);
        }
    } else {
        $listeProduits = ProduitDAO::findAll();
    }
    while ($listeProduits->next()) {
        $produit = $listeProduits->current();
        ?>
        <div class="col-sm-4 col-lg-4 col-md-4">
            <div class="thumbnail">
                <img src='<?php echo $produit->getCheminImage() ?>' alt="">
                <div class="caption">
                    <h4 class="pull-right"><?php echo number_format((float)$produit->getPrixRabais(),2,'.',''); ?>$</h4>
                    <h4>
                        <a href="#"><?php echo $produit->getNom() ?></a>
                        <a href="#"><span class="glyphicon glyphicon-edit" data-toggle="modal" data-target="#produitModal" data-action="Modifier"></span></a>
                    </h4>
                    <p><?php echo html_entity_decode($produit->getDescription()); ?></p>
                </div>
                <div class="ratings">
                    <p class="pull-right">31 reviews</p>
                    <p>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star-empty"></span>
                    </p>
                </div>
            </div>
        </div>
    <?php } ?>
</div>