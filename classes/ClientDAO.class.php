<?php
/**
 * Description of ClientDAO
 *
 * @author Samuel Therrien
 */
include_once('/classes/Database.class.php'); 
include_once('/classes/Client.class.php'); 

class ClientDAO {
    public static function create($x) {
        $request = "INSERT INTO client (nom,courriel,mot_de_passe,administrateur)".
                    " VALUES ('".$x->getUsername().
                    "','".$x->getCourriel().
                    "','".$x->getPassword().
                    "','".($x->isAdministrateur()===true ? 1 : 0).
                    "')";
        try {
            $db = Database::getInstance();
            return $db->exec($request);
        }
        catch(PDOException $e) {
            throw $e;
        }
    }

    public static function findBy($col, $x) {
        try {
            if (!in_array($col, array("no_client","nom","courriel","mot_de_passe","administrateur","panier"))) {
                throw new PDOException("Colonne invalide: ".(string)$col);
            }
            $db = Database::getInstance();

            $pstmt = $db->prepare("SELECT * FROM client WHERE nom = :x");
            $pstmt->execute(array(':x' => $x));

            $result = $pstmt->fetch(PDO::FETCH_OBJ);

            if ($result) {
                $pstmt->closeCursor();
                return new Client($result->no_client,
                                  $result->nom,
                                  $result->courriel,
                                  $result->mot_de_passe,
                                  $result->administrateur,
                                  $result->panier);
            }
            $pstmt->closeCursor();
            return null;
        } catch (PDOException $e) {
            print "Error!: ".$e->getMessage()."<br/>";
            return $liste;
        }
    }	
}
