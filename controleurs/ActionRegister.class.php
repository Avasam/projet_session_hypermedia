<?php
/**
 * Description of LoginAction
 *
 * @author Amoumene Toudeft
 */
require_once('./controleurs/Action.interface.php');
class ActionRegister implements Action {
    public function execute(){
        if (!ISSET($_REQUEST["username"]))
            return "login";
        if (!$this->valide()) {
            //$_REQUEST["global_message"] = "Le formulaire contient des erreurs. Veuillez les corriger.";	
            return "login";
        }

        require_once('./modele/UserDAO.class.php');
        $udao = new UserDAO();
        $user = $udao->find($_REQUEST["username"]);
        if ($user == null) {
                $_REQUEST["field_messages"]["username"] = "Utilisateur inexistant.";	
                return "login";
            }
        else if ($user->getPassword() != $_REQUEST["password"]) {
                $_REQUEST["field_messages"]["password"] = "Mot de passe incorrect.";	
                return "login";
            }
        if (!ISSET($_SESSION)) session_start();
        $_SESSION["connected"] = $_REQUEST["username"];
        return "default";
    }
    public function valide()
    {
        $result = true;
        if ($_REQUEST['username'] == "") {
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
