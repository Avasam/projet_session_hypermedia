<?php
$produit = ProduitDAO::find($_REQUEST["produit"]);
if (ISSET($_SESSION["connected"]))
    $listeFavoris = ProduitDAO::findAllFavorisFor($_SESSION["connected"]["id"])->asArray();
?>
<div class="thumbnail">
    <img class="img-responsive" src="<?php echo $produit->getCheminImage() ?>" alt="<?php echo $produit->getCheminImage() ?>">
    <div class="caption-full">
        <h4><a href="#"><?php echo $produit->getNom() ?></a>
        </h4>
        <p><?php echo $produit->getdescription() ?></p>
    </div>
    <div class="ratings row">
        <div class="col-xs-7 col-md-5 col-lg-6">
            <?php if (ISSET($_SESSION["connected"])) { ?>
                    <a href="?action=incrementerPanier&produitID=<?=$produit->getNoProduit()?>&commandeID=<?=$_SESSION["connected"]["panier"]?>&redirect=main&produit=<?=$produit->getNoProduit()?>"><span class="glyphicon glyphicon-shopping-cart"><?php
                    if(($quantite=ProduitDAO::findProduitCommandeQuantite($produit->getNoProduit(),$_SESSION["connected"]["panier"]))>0)
                                            echo "&times".$quantite ?></span></a>
                <?php if (in_array($produit, $listeFavoris)) { ?>
                <a href="?action=supprimerFavoris&produitID=<?=$produit->getNoProduit()?>&clientID=<?=$_SESSION["connected"]["id"]?>&redirect=main&produit=<?=$produit->getNoProduit()?>"><span class="glyphicon glyphicon-heart"></span></a>
                <?php } else { ?>
                <a href="?action=ajouterFavoris&produitID=<?=$produit->getNoProduit()?>&clientID=<?=$_SESSION["connected"]["id"]?>&redirect=main&produit=<?=$produit->getNoProduit()?>"><span class="glyphicon glyphicon-heart-empty"></span></a>
                <?php } ?>
            <?php } ?>
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
        <div class="col-xs-5 col-md-7 col-lg-6">
            <?php if ($produit->getprix() != $produit->getPrixRabais()) { ?>
            <span class="pull-right coupe"><?php echo $produit->getprix() ?>$</span>
            <?php } ?>
            <span class="pull-right rabais"><?php echo $produit->getPrixRabais() ?>$&nbsp;</span>
        </div>
    </div>
</div>
