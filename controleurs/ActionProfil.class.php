<?php
/**
 * Description of ActionProfil
 *
 * @author Samuel Therrien
 */
require_once('/controleurs/Action.interface.php');
class ActionProfil implements Action {
    public function execute(){
        return "profil";
    }
}
