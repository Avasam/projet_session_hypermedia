<?php
/**
 * Description of SupprimerAction
 *
 * @author Amoumene Toudeft
 */
require_once('/controleurs/Action.interface.php');
require_once('/classes/ProduitDAO.class.php');
class ActionModifierProduit implements Action {
    public function execute(){
        var_dump($_REQUEST);
        //TODO: Fix SQL request
        $produit = new Produit((int)$_REQUEST["produitID"],
                               $_REQUEST["produitNom"],
                               (float)$_REQUEST["produitPrix"],
                               (int)$_REQUEST["produitRabaisPct"],
                               (float)$_REQUEST["produitRabaisAbs"],
                               $_REQUEST["produitDescription"],
                               $_REQUEST["produitCheminImage"],
                               $_REQUEST["produitCategorie"]
                               );
        var_dump($produit);
        ProduitDAO::update($produit);
        //TODO: Warns users si le produit a de nouveaux rabais.
        return "main";
    }
}
