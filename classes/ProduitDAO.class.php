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
    
    public static function findAllFavorisFor($x) {
        $liste = new Liste();
        try {
            $db = Database::getInstance();
            $pstmt = $db->prepare("SELECT * FROM produit p "
                                 ."INNER JOIN produit_favoris f ON p.no_produit=f.no_produit "
                                 ."WHERE f.no_client = :x");
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
    
    public static function findAllPanierFor($x) {
        $liste = new Liste();
        try {
            $db = Database::getInstance();
            $pstmt = $db->prepare("SELECT p.no_produit,p.nom,p.prix,p.rabais_pct,p.rabais_pct,p.description,p.image,p.categorie "
                                 ."FROM produit p "
                                 ."INNER JOIN produit_commande pc ON p.no_produit=pc.no_produit "
                                 ."INNER JOIN client u ON pc.no_commande=u.panier "
                                 ."WHERE u.no_client = :x");
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
            $p->setCheminImage($result->image);
            $p->setCategorie($result->categorie);
            $pstmt->closeCursor();
            return $p;
        }
        $pstmt->closeCursor();
        return NULL;
    }
    
    public static function findProduitCommandeQuantite($produit,$commande) {
        $db = Database::getInstance();

        $pstmt = $db->prepare("SELECT quantite FROM produit_commande WHERE no_produit = :p AND no_commande = :c");
        $pstmt->execute(array(':p' => $produit, ':c' => $commande));

        $result = $pstmt->fetch(PDO::FETCH_OBJ);
        if ($result) {
            $pstmt->closeCursor();
            return $result->quantite;
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
        "' WHERE no_produit = '".$x->getNoProduit()."'";
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
    
    public static function deleteProduitCommande($produit, $commande) {
        $db = Database::getInstance();

        $pstmt = $db->prepare("DELETE FROM produit_commande WHERE no_produit = :p AND no_commande = :c");
        $pstmt->execute(array(':p' => $produit, ':c' => $commande));

        $pstmt->closeCursor();
    }
    
    public static function decrementproduitCommande($produit, $commande) {
        $quantite = ProduitDAO::findProduitCommandeQuantite($produit,$commande)-1;
        if ($quantite<=0) {
            ProduitDAO::deleteProduitCommande($produit, $commande);
            return;
        }
        
        $db = Database::getInstance();
        
        $pstmt = $db->prepare("UPDATE produit_commande SET quantite = :quant "
                             ."WHERE no_produit = :p AND no_commande = :c");
        $pstmt->execute(array(':quant' => $quantite, ':p' => $produit, ':c' => $commande));

        $pstmt->closeCursor();
    }
    
    public static function deleteFavoris($produit, $client) {
        $db = Database::getInstance();

        $pstmt = $db->prepare("DELETE FROM produit_favoris WHERE no_produit = :p AND no_client = :c");
        $pstmt->execute(array(':p' => $produit, ':c' => $client));

        $pstmt->closeCursor();
    }
    
}
