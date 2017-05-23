<?php
/**
 * Description of ActionSupprimerPanier
 *
 * @author Samuel Therrien
 */
require_once('/controleurs/Action.interface.php');
require_once('/classes/ProduitDAO.class.php');
class ActionDecrementerPanier implements Action {
    public function execute(){
        ProduitDAO::decrementProduitCommande($_REQUEST["produitID"], $_REQUEST["commandeID"]);
        return "profil";
    }
}
