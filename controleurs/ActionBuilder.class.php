<?php
/**
 * Description of ActionBuilder
 *
 * @author Amoumene Toudeft
 */
require_once('/controleurs/ActionDefault.class.php');
require_once('/controleurs/ActionAjouterProduit.class.php');
require_once('/controleurs/ActionLogin.class.php');
require_once('/controleurs/ActionRegister.class.php');
require_once('/controleurs/ActionLogout.class.php');
require_once('/controleurs/ActionModifierProduit.class.php');
require_once('/controleurs/ActionSupprimerProduit.class.php');

class ActionBuilder{
    public static function getAction($nom){
        switch ($nom) {
            case "login" :
                return new ActionLogin();
            break;
            case "register" :
                return new ActionRegister();
            break; 
            case "logout" :
                return new ActionLogout();
            break; 
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
