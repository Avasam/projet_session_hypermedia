<?php require_once('/classes/ProduitDAO.class.php'); ?>
<div class="container">
    <div class="panel-group">
        <div class="row">
            <?php $f = ['findAllPanierFor', 'findAllfavorisFor'];
            foreach ($f as $findAllFor) { ?>
                <div class="col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading"><h4><?php echo ($findAllFor=="findAllPanierFor" ? "Mon panier" : "Mes favoris") ?></h4></div>
                        <div class="panel-body">
                            <div class="row">
                                <?php
                                $listeProduits = ProduitDAO::$findAllFor(3);
                                for ($i=0; $i<$listeProduits->length(); $i++) {
                                    $produit = $listeProduits->get($i);
                                    ?>
                                    <div class="col-sm-6">
                                        <div class="thumbnail">
                                            <a href="?produit=<?php echo $produit->getNoProduit() ?>"><img src='<?php echo $produit->getCheminImage() ?>' alt="<?php echo $produit->getCheminImage() ?>"></a>
                                            <div class="caption">
                                                <h4 class="pull-right"><?php echo number_format((float)$produit->getPrixRabais(),2,'.',''); ?>$</h4>
                                                <h4>
                                                    <a href="?produit=<?php echo $produit->getNoProduit() ?>"><?php echo $produit->getNom() ?></a>
                                                    <a href="#"><span class="glyphicon glyphicon-remove"></span></a>
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
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
