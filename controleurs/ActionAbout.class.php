<?php
/**
 * Description of ActionAbout
 *
 * @author Samuel Therrien
 */
require_once('/controleurs/Action.interface.php');
class ActionAbout implements Action {
    public function execute(){
        return "about";
    }
}
