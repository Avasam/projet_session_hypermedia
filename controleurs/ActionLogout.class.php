<?php
/**
 * Description of LogoutAction
 *
 * @author Amoumene Toudeft
 */
require_once('./controleurs/Action.interface.php');
class ActionLogout implements Action {
    public function execute(){
        if (!ISSET($_SESSION)) session_start();
        UNSET($_SESSION["connected"]);
        session_destroy();
        return "default";
    }
}
