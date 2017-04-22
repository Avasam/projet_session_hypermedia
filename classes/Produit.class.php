<?php
/**
 * Description of Produit
 *
 * @author Samuel Therrien
 */
class Produit {
    private $noProduit = 0 ;
    private $nom = "";
    private $prix = 0.00;
    private $rabaisPct = 0;
    private $rabaisAbs = 0;
    private $description = "";
    private $cheminImage = "default.png";
    private $categorie = null;
    
    function __construct($noProduit, $nom, $prix, $rabaisPct=0, $rabaisAbs=0, $description="", $cheminImage="default.png", $categorie=null) {
        $this->noProduit = $noProduit;
        $this->nom = $nom;
        $this->prix = $prix;
        $this->rabaisPct = $rabaisPct;
        $this->rabaisAbs = $rabaisAbs;
        $this->description = $description;
        $this->cheminImage = $cheminImage;
        $this->categorie = $categorie;
    }
    
    function getNoProduit() {
        return $this->noProduit;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrix() {
        return $this->prix;
    }

    function getPrixRabais() {
        return ($this->prix-$this->rabaisAbs)*(100-$this->rabaisPct)/100;
    }
    
    function getRabaisPct() {
        return $this->rabaisPct;
    }

    function getRabaisAbs() {
        return $this->rabaisAbs;
    }

    function getDescription() {
        return $this->description;
    }

    function getCheminImage() {
        return $this->cheminImage;
    }

    function getCategorie() {
        return $this->categorie;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPrix($prix) {
        $this->prix = $prix;
    }

    function setRabaisPct($rabaisPct) {
        $this->rabaisPct = $rabaisPct;
    }

    function setRabaisAbs($rabaisAbs) {
        $this->rabaisAbs = $rabaisAbs;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setCheminImage($cheminImage) {
        $this->cheminImage = $cheminImage;
    }

    function setCategorie($categorie) {
        $this->categorie = $categorie;
    }

    public function __toString() {
        return "Produit[".$this->nom.", ".$this->categorie.", ".$this->getPrixRabais()."$ (".$this->prix."$)]".$this->description;
    }

}
