<?php
/**
 * Description of ActionAjouterFavoris
 *
 * @author Samuel Therrien
 */
require_once('/controleurs/Action.interface.php');
require_once('/classes/ProduitDAO.class.php');
class ActionAjouterFavoris implements Action {
    public function execute(){
        ProduitDAO::createFavoris($_REQUEST["produitID"], $_REQUEST["clientID"]);
        return $_REQUEST["redirect"];
    }
}
