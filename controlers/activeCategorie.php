<?php
function activeCategorie($categorie) {
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
