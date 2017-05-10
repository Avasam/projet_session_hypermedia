<?php
/**
 * Description of ActionBuilder
 *
 * @author Amoumene Toudeft
 */
require_once('./controleur/DefaultAction.class.php');
require_once('./controleur/AjouterAction.class.php');
require_once('./controleur/LoginAction.class.php');
require_once('./controleur/LogoutAction.class.php');
require_once('./controleur/SupprimerAction.class.php');

class ActionBuilder{
    public static function getAction($nom){
        switch ($nom) {
            case "login" :
                return new LoginAction();
            break; 
            case "logout" :
                return new LogoutAction();
            break; 
            case "afficher" :
                return new AfficherAction();
            break; 
            case "ajouter" :
                return new AjouterAction();
            break; 
            case "supprimer" :
                return new SupprimerAction();
            break; 
            default :
                return new DefaultAction();
        }
    }
}
