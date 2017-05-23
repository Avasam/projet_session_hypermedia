<?php
/**
 * Description of Utils
 * Plusieurs fonctions statiques utilitaires
 * 
 * @author Samuel Therrien
 */
require_once('/classes/ClientDAO.class.php');
class Utils {

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
    
    public static function alerterClients($produit) {
        $listeMails = ClientDAO::findAllMailByFavoris($produit);
        echo "<div class='alert alert-success'>";
        while($listeMails->next()) {
            echo "Alerte envoyée à ".$listeMails->current();
            //TODO: Envoyer un vrai mail.
        }
        echo "</div>";
    }

}
