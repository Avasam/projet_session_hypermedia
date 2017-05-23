<?php
/**
 * Description of ActionLogin
 *
 * @author Amoumene Toudeft
 */
require_once('/controleurs/Action.interface.php');
class ActionLogin implements Action {
    public function execute(){
        if (!ISSET($_REQUEST["username"]))
            return "main";
        if (!$this->valide()) {
            $_REQUEST["global_message"] = "Le formulaire contient des erreurs. Veuillez les corriger.";	
            return "main";
        }

        require_once('/classes/ClientDAO.class.php');
        $client = ClientDAO::findBy("nom", $_REQUEST["username"]);
        if ($client == null) {
            $_REQUEST["field_messages"]["username"] = "Utilisateur '".$_REQUEST["username"]."' inexistant.";	
            return "main";
        } else if ($client->getPassword() != $_REQUEST["password"]) {
            $_REQUEST["field_messages"]["password"] = "Mot de passe incorrect.";	
            return "main";
        }
        
        if (!ISSET($_SESSION)) session_start();
        $_SESSION["connected"]["id"] = $client->getNoClient();
        $_SESSION["connected"]["username"] = $client->getUsername();
        $_SESSION["connected"]["email"] = $client->getCourriel();
        $_SESSION["connected"]["administrateur"] = $client->isAdministrateur();
        $_SESSION["connected"]["panier"] = $client->getNoPanier();
        return "main";
    }

    public function valide()
    {
        $result = true;
        if ($_REQUEST["username"] == "") {
            $_REQUEST["field_messages"]["username"] = "Donnez votre nom d'utilisateur";
            $result = false;
        }	
        if ($_REQUEST['password'] == "") {
            $_REQUEST["field_messages"]["password"] = "Mot de passe obligatoire";
            $result = false;
        }	
        return $result;
    }
}
