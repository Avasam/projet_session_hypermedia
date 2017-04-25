<?php
include_once('/classes/Database.class.php'); 
include_once('/classes/Produit.class.php'); 
include_once('/classes/Liste.class.php'); 
/**
 * Description of ProduitDAO
 *
 * @author Patrik Artur Kabore Blez
 */
class ProduitDAO {	
    public function create($x) {
        $request = "INSERT INTO produit (no_produit,nom,prix,rabais_pct,rabais_abs,description,image,categorie)".
                    " VALUES ('".$x->getNoProduit().
                    "','".$x->getNom().
                    "','".$x->getPrix().
                    "','".$x->getRabaisPct().
                    "','".$x->getRabaisAbs().
                    "','".$x->getDescription().
                    "','".$x->getCheminImage().
                    "','".$x->getCategorie().
                    "')";
        try {
            $db = Database::getInstance();
            return $db->exec($request);
        }
        catch(PDOException $e) {
            throw $e;
        }
    }

    public static function findAll() {
        try {
            $liste = new Liste();
            
            $requete = 'SELECT * FROM produit';
            $cnx = Database::getInstance();

            $res = $cnx->query($requete);
            foreach($res as $row) {
                $p = new Produit();
                $p->loadFromArray($row);
                $liste->add($p);
            }
            $res->closeCursor();
            Database::close();
            $cnx = null;
            return $liste;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            return $liste;
        }
    }
    
    public static function findAllBy($attr, $x) {
        try {
            $liste = new Liste();
            $cnx = Database::getInstance();

            $pstmt = $cnx->prepare("SELECT * FROM produit WHERE :col = :x");
            $pstmt->execute(array(':col' => $attr, ':x' => $x));
            
            $res = $pstmt->fetch(PDO::FETCH_OBJ);
            
            foreach($res as $row) {
                $p = new Produit();
                $p->loadFromArray($row);
                $liste->add($p);
            }
            $res->closeCursor();
            Database::close();
            $cnx = null;
            return $liste;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            return $liste;
        }	
    }

    public static function find($id) {
        $db = Database::getInstance();

        $pstmt = $db->prepare("SELECT * FROM produit WHERE NO_PRODUIT = :x");
        $pstmt->execute(array(':x' => $id));

        $result = $pstmt->fetch(PDO::FETCH_OBJ);

        if ($result) {
            $p = new Produit();
            $p->setNoProduit($result->NO_PRODUIT);
            $p->setNom($result->NOM);
            $p->setPrix($result->PRIX);
            $p->setRabaisPct($result->RABAIS_PCT);
            $p->setRabaisAbs($result->RABAIS_ABS);
            $p->setDescription($result->DESCRIPTION);
            $p->setImage($result->IMAGE);
            $p->setCategorie($result->CATEGORIE);
            $pstmt->closeCursor();
            return $p;
        }
        $pstmt->closeCursor();
        return NULL;
}

    public function update($x) {
        $request = "UPDATE produit SET NOM = '".$x->getNom().
        "', PRIX = '".$x->getPrix().
        "', RABAIS_PCT = '".$x->getRabaisPct().
        "', RABAIS_ABS = '".$x->getRabaisAbs().
        "', DESCRIPTION = '".$x->getDescription().
        "', IMAGE = '".$x->getImage().
        "', CATEGORIE = '".$x->getCategorie().
        " WHERE NO_PRODUIT = '".$x->getNoProduit()."'";
        try {
            $db = Database::getInstance();
            return $db->exec($request);
        }
        catch(PDOException $e) {
            throw $e;
        }
    }

    public function delete($x) {
        $request = "DELETE FROM produit WHERE NO_PRODUIT = '".$x->getNoProduit()."'";
        try {
            $db = Database::getInstance();
            return $db->exec($request);
        }
        catch(PDOException $e) {
            throw $e;
        }
    }
}
?>
