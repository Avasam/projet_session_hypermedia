<?php
/**
 * Description of ActionBuilder
 *
 * @author Amoumene Toudeft
 */
require_once('/controleurs/ActionDefault.class.php');
require_once('/controleurs/ActionAjouterProduit.class.php');
//require_once('/controleurs/LoginAction.class.php');
//require_once('/controleurs/LogoutAction.class.php');
require_once('/controleurs/ActionModifierProduit.class.php');
require_once('/controleurs/ActionSupprimerProduit.class.php');

class ActionBuilder{
    public static function getAction($nom){
        switch ($nom) {
//            case "login" :
//                return new LoginAction();
//            break; 
//            case "logout" :
//                return new LogoutAction();
//            break; 
            case "ajouterProduit" :
                return new ActionAjouterProduit();
            break;
            case "modifierProduit" :
                return new ActionModifierProduit();
            break;
            case "supprimerProduit" :
                return new ActionSupprimerProduit();
            break; 
        
            default :
                return new ActionDefault();
        }
    }
}
