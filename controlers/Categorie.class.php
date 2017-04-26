<?php
class Categorie {
    public static function CSSActiveCategorie($categorie) {
        if (ISSET($_SESSION['categorie'])) {
            if ($_SESSION['categorie'] == $categorie) {
                return "active";
            }
        } else {
            if ($categorie == null) {
                return "active";
            }
        }
        return "";
    }

    public static function setActiveCategorie($categorie) {
        $_SESSION['categorie'] = $categorie;
    }
}
