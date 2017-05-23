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
require_once('/controleurs/ActionAbout.class.php');
require_once('/controleurs/ActionProfil.class.php');
require_once('/controleurs/ActionDecrementerPanier.class.php');
require_once('/controleurs/ActionSupprimerFavoris.class.php');

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
            case "about" :
                return new ActionAbout();
                break;
            case "profil" :
                return new ActionProfil();
                break;
            case "decrementerPanier" :
                return new ActionDecrementerPanier();
                break;
            case "supprimerFavoris" :
                return new ActionSupprimerFavoris();
                break;
            default :
                return new ActionDefault();
        }
    }
}
