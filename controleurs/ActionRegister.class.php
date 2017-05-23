<?php
/**
 * Description of ActionRegister
 *
 * @author Amoumene Toudeft
 */
require_once('/controleurs/Action.interface.php');
class ActionRegister implements Action {
    public function execute(){
        if (!ISSET($_REQUEST["username"]))
            return "main";
        if (!$this->valide()) {
            $_REQUEST["global_message"] = "Le formulaire contient des erreurs. Veuillez les corriger.";	
            return "main";
        }

        require_once('/classes/ClientDAO.class.php');

        if (ClientDAO::findBy("nom", $_REQUEST["username"]) != null || ClientDAO::findBy("courriel", $_REQUEST["email"])) {
            $_REQUEST["field_messages"]["username"] = "Utilisateur '".$_REQUEST["username"]."' déjà existant.";	
            return "main";
        } else {
            $client = New Client(null, $_REQUEST["username"], $_REQUEST["email"], $_REQUEST["password"]);
            ClientDAO::create($client);

            return ActionBuilder::getAction("login")->execute();
        }

        return "main";
    }

    public function valide()
    {
        $result = true;
        if ($_REQUEST['username'] == "") {
            $_REQUEST["field_messages"]["username"] = "Donnez votre nom d'utilisateur";
            $result = false;
        }
        if ($_REQUEST['email'] == "") {
            $_REQUEST["field_messages"]["email"] = "Courriel obligatoire";
            $result = false;
        }
        if ($_REQUEST['password'] == "") {
            $_REQUEST["field_messages"]["password"] = "Mot de passe obligatoire";
            $result = false;
        }	
        return $result;
    }
}
