<?php
class Categorie {

    public static function CSSActiveCategorie($categorie) {
        if (ISSET($_REQUEST['categorie'])) {
            if ($_REQUEST['categorie'] == $categorie) {
                return "active";
            }
        } else {
            if ($categorie == "Tout") {
                return "active";
            }
        }
        return "";
    }

}
