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
    public static function create($x) {
        $request = "INSERT INTO produit (nom,prix,rabais_pct,rabais_abs,description,image,categorie)".
                    " VALUES ('".$x->getNom().
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
        $liste = new Liste();
        try {
            $requete = 'SELECT * FROM produit';
            $db = Database::getInstance();

            $result = $db->query($requete);
            foreach($result as $row) {
                $p = new Produit();
                $p->loadFromArray($row);
                $liste->add($p);
            }
            $result->closeCursor();
            Database::close();
            return $liste;
        } catch (PDOException $e) {
            print "Error!: ".$e->getMessage()."<br/>";
            return $liste;
        }
    }
    
    public static function findAllBy($col, $x) {
        $liste = new Liste();
        try {
            if (!in_array($col, array("no_produit","nom","prix","rabais_pct","rabais_pct","description","image","categorie"))) {
                throw new PDOException("Colonne invalide: ".(string)$col);
            }
            $db = Database::getInstance();
            $pstmt = $db->prepare("SELECT * FROM produit WHERE ".$col.($x ? " = :x" : " IS NULL"));
            $pstmt->execute(array(':x' => $x));
            while ($result=$pstmt->fetch(PDO::FETCH_OBJ)) {
                $liste->add(new Produit($result->no_produit,
                                $result->nom,
                                $result->prix,
                                $result->rabais_pct,
                                $result->rabais_pct,
                                $result->description,
                                $result->image,
                                $result->categorie));
            }
            $pstmt->closeCursor();
            Database::close();
            return $liste;
        } catch (PDOException $e) {
            print "Error!: ".$e->getMessage()."<br/>";
            return $liste;
        }	
    }

    public static function findAllCategories() {
        $liste = new Liste();
        try {
            $requete = 'SELECT DISTINCT categorie FROM produit WHERE categorie IS NOT NULL';
            $db = Database::getInstance();

            $result = $db->query($requete);
            foreach($result as $row) {
                $liste->add($row["categorie"]);
            }
            
            $result->closeCursor();
            Database::close();
            return $liste;
        } catch (PDOException $e) {
            print "Error!: ".$e->getMessage()."<br/>";
            return $liste;
        }
    }
    
    public static function findAllBySpecial() {
        $liste = new Liste();
        try {
            $requete = 'SELECT * FROM produit WHERE rabais_abs>0 OR rabais_pct>0';
            $db = Database::getInstance();

            $result = $db->query($requete);
            foreach($result as $row) {
                $p = new Produit();
                $p->loadFromArray($row);
                $liste->add($p);
            }
            $result->closeCursor();
            Database::close();
            return $liste;
        } catch (PDOException $e) {
            print "Error!: ".$e->getMessage()."<br/>";
            return $liste;
        }
    }
    
    public static function find($id) {
        $db = Database::getInstance();

        $pstmt = $db->prepare("SELECT * FROM produit WHERE no_produit = :x");
        $pstmt->execute(array(':x' => $id));

        $result = $pstmt->fetch(PDO::FETCH_OBJ);
        if ($result) {
            $p = new Produit();
            $p->setNoProduit($result->no_produit);
            $p->setNom($result->nom);
            $p->setPrix($result->prix);
            $p->setRabaisPct($result->rabais_pct);
            $p->setRabaisAbs($result->rabais_abs);
            $p->setDescription($result->description);
            $p->setImage($result->image);
            $p->setCategorie($result->categorie);
            $pstmt->closeCursor();
            return $p;
        }
        $pstmt->closeCursor();
        return NULL;
}

    public static function update($x) {
        $request = "UPDATE produit SET nom = '".$x->getNom().
        "', prix = '".$x->getPrix().
        "', rabais_pct = '".$x->getRabaisPct().
        "', rabais_abs = '".$x->getRabaisAbs().
        "', description = '".$x->getDescription().
        "', image = '".$x->getCheminImage().
        "', categorie = '".$x->getCategorie().
        " WHERE no_produit = '".$x->getNoProduit()."'";
        try {
            $db = Database::getInstance();
            return $db->exec($request);
        }
        catch(PDOException $e) {
            throw $e;
        }
    }

    public static function deleteById($id) {
        $db = Database::getInstance();

        $pstmt = $db->prepare("DELETE FROM produit WHERE no_produit = :x");
        $pstmt->execute(array(':x' => $id));

        $pstmt->closeCursor();
    }
    
    public function delete($x) {
        $request = "DELETE FROM produit WHERE no_produit = '".$x->getNoProduit()."'";
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
