<?php
/**
 * Description of ActionSupprimerFavoris
 *
 * @author Samuel Therrien
 */
require_once('/controleurs/Action.interface.php');
require_once('/classes/ProduitDAO.class.php');
class ActionSupprimerFavoris implements Action {
    public function execute(){
        ProduitDAO::deleteFavoris($_REQUEST["produitID"], $_REQUEST["clientID"]);
        return "profil";
    }
}
