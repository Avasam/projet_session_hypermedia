<?php
/**
 * Description of ActionIncrementerPanier
 *
 * @author Samuel Therrien
 */
require_once('/controleurs/Action.interface.php');
require_once('/classes/ProduitDAO.class.php');
class ActionIncrementerPanier implements Action {
    public function execute(){
        ProduitDAO::incrementProduitCommande($_REQUEST["produitID"], $_REQUEST["commandeID"]);
        return $_REQUEST["redirect"];
    }
}
