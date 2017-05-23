<?php
/**
 * Description of ActionModifierProduit
 *
 * @author Samuel Therrien
 */
require_once('/controleurs/Action.interface.php');
require_once('/classes/ProduitDAO.class.php');
class ActionModifierProduit implements Action {
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
        ProduitDAO::update($produit);
        //TODO: Warns users si le produit a de nouveaux rabais.
        return "main";
    }
}
