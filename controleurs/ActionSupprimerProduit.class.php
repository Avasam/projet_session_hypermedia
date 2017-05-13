<?php
/**
 * Description of SupprimerAction
 *
 * @author Amoumene Toudeft
 */
require_once('/controleurs/Action.interface.php');
require_once('/classes/ProduitDAO.class.php');
class ActionSupprimerProduit implements Action {
    public function execute(){
        ProduitDAO::deleteById($_REQUEST["produitID"]);
        return "main";
    }
}
