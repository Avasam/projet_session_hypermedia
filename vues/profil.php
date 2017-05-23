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
                                $listeProduits = ProduitDAO::$findAllFor($_SESSION["connected"]["id"]);
                                if ($listeProduits->length()>0) {
                                    for ($i=0; $i<$listeProduits->length(); $i++) {
                                        $produit = $listeProduits->get($i);
                                        ?>
                                        <div class="col-sm-6">
                                            <div class="thumbnail">
                                                <a href="?produit=<?php echo $produit->getNoProduit() ?>"><img src='<?php echo $produit->getCheminImage() ?>' alt="<?php echo $produit->getCheminImage() ?>"></a>
                                                <div class="caption">
                                                    <h4>
                                                        <a href="?produit=<?php echo $produit->getNoProduit() ?>"><?php echo $produit->getNom() ?></a>
                                                    </h4>
                                                    <p><?php echo html_entity_decode($produit->getDescription()); ?></p>
                                                </div>
                                                <div class="ratings row">
                                                    <div class="col-xs-5 col-xl-6">
                                                        <?php if ($findAllFor=="findAllPanierFor") {
                                                            $quantite = ProduitDAO::findProduitCommandeQuantite($produit->getNoProduit(),$_SESSION["connected"]["panier"]);
                                                            for ($q=0; $q<$quantite; $q++) { ?>
                                                                <a href="?action=decrementerPanier&&produitID=<?=$produit->getNoProduit()?>&commandeID=<?=$_SESSION["connected"]["panier"]?>"><span class="glyphicon glyphicon-remove"></span></a>
                                                            <?php } 
                                                       } else {?>
                                                            <a href="?action=supprimerFavoris&produitID=<?=$produit->getNoProduit()?>&clientID=<?=$_SESSION["connected"]["id"]?>"><span class="glyphicon glyphicon-trash"></span></a>
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
                                    <?php }
                                } else {
                                    echo "<div class='text-center'>Vide</div>";
                                } ?>            
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
