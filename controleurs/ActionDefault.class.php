<?php
/**
 * Description of DefaultAction
 *
 * @author Amoumene Toudeft
 */
require_once('/controleurs/Action.interface.php');

class ActionDefault implements Action {
    public function execute(){
        return "main";
    }
}
