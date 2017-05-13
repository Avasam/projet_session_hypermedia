<?php
/**
 * Description of SupprimerAction
 *
 * @author Samuel Therrien
 */
require_once('/controleurs/Action.interface.php');
require_once('/classes/ProduitDAO.class.php');
class ActionAjouterProduit implements Action {
    public function execute(){
        $produit = new Produit((int)$_REQUEST["produitID"],
                               $_REQUEST["produitNom"],
                               (float)$_REQUEST["produitPrix"],
                               (int)$_REQUEST["produitRabaisPct"],
                               (float)$_REQUEST["produitRabaisAbs"],
                               $_REQUEST["produitDescription"],
                               $_REQUEST["produitCheminImage"],
                               $_REQUEST["produitCategorie"]
                               );
        ProduitDAO::create($produit);
        return "main";
    }
}
