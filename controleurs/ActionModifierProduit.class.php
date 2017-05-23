<?php
/**
 * Description of ActionModifierProduit
 *
 * @author Samuel Therrien
 */
require_once('/controleurs/Utils.class.php');
require_once('/controleurs/Action.interface.php');
require_once('/classes/ProduitDAO.class.php');
class ActionModifierProduit implements Action {
    public function execute(){
        $ancientPrixRabais = ProduitDAO::find($_REQUEST["produitID"])->getPrixRabais();
        $produit = new Produit($_REQUEST["produitID"],
                               $_REQUEST["produitNom"],
                               $_REQUEST["produitPrix"],
                               $_REQUEST["produitRabaisPct"],
                               $_REQUEST["produitRabaisAbs"],
                               $_REQUEST["produitDescription"],
                               $_REQUEST["produitCheminImage"],
                               $_REQUEST["produitCategorie"]
                               );
        ProduitDAO::update($produit);

        if ($ancientPrixRabais != $produit->getPrixRabais()){
            Utils::alerterClients($_REQUEST["produitID"]);
        }
        return "main";
    }
}
