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
                    <a href="?produit=<?php echo $produit->getNoProduit() ?>"><img class="slide-image" src="<?php echo $produit->getCheminImage() ?>" alt="<?php echo $produit->getCheminImage() ?>"></a>
                    <span class="carousel-info-nom"><span><?php echo $produit->getNom() ?></span></span>
                    <span class="carousel-info-prix">
                        <span class="pull-right coupe"><?php echo $produit->getprix() ?>$</span>
                        <span class="pull-right rabais"><?php echo $produit->getPrixRabais() ?>$&nbsp;</span>
                    </span>
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
    <?php if (ISSET($_SESSION["connected"]["administrateur"]) && $_SESSION["connected"]["administrateur"]==true) { ?>
    <div class="col-sm-4 col-lg-4 col-md-4">
        <button type="button" class="btn btn-primary btn-add-product" data-toggle="modal" data-target="#produitModal" data-action="Ajouter"><div class="glyphicon glyphicon-plus"></div></button>
    </div>
    <?php } ?>

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
        <div class="col-sm-4">
            <div class="thumbnail">
                <a href="?produit=<?php echo $produit->getNoProduit() ?>"><img src='<?php echo $produit->getCheminImage() ?>' alt="<?php echo $produit->getCheminImage() ?>"></a>
                <div class="caption">
                    <h4><a href="?produit=<?php echo $produit->getNoProduit() ?>"><?php echo $produit->getNom() ?></a></h4>
                    <p><?php echo html_entity_decode($produit->getDescription()); ?></p>
                </div>
                <div class="ratings row">
                    <div class="col-xs-5 col-xl-6">
                        <a href="#"><span class="glyphicon glyphicon-shopping-cart"></span></a>
                        <a href="#"><span class="glyphicon glyphicon-heart"></span></a>
                        <?php if (ISSET($_SESSION["connected"]["administrateur"]) && $_SESSION["connected"]["administrateur"]==true) { ?>
                        <a href="#"><span class="glyphicon glyphicon-edit" data-toggle="modal"
                                                                           data-target="#produitModal"
                                                                           data-action="Modifier"
                                                                           data-no-produit="<?php echo $produit->getNoProduit() ?>"
                                                                           data-nom="<?php echo $produit->getNom() ?>"
                                                                           data-prix="<?php echo $produit->getPrix() ?>"
                                                                           data-rabais-pct="<?php echo $produit->getRabaisPct() ?>"
                                                                           data-rabais-abs="<?php echo $produit->getRabaisAbs() ?>"
                                                                           data-description="<?php echo $produit->getdescription() ?>"
                                                                           data-chemin-image="<?php echo $produit->getCheminImage() ?>"
                                                                           data-categorie="<?php echo $produit->getCategorie() ?>"
                                                                           ></span></a>
                        <?php } ?>
                    </div>
                    <div class="col-xs-7 col-xl-6">
                        <?php if ($produit->getprix() != $produit->getPrixRabais()) { ?>
                        <span class="pull-right coupe"><?php echo $produit->getprix() ?>$</span>
                        <?php } ?>
                        <span class="pull-right rabais"><?php echo $produit->getPrixRabais() ?>$&nbsp;</span>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
