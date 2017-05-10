<?php
/**
 * Description of DefaultAction
 *
 * @author Amoumene Toudeft
 */
require_once('./controleur/Action.interface.php');
class DefaultAction implements Action {
    public function execute(){
        return "default";
    }
}
