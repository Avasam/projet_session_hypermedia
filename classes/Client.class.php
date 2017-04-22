<?php
include_once('/classes/Commande.class.php'); 
/**
 * Description of Client
 *
 * @author Samuel Therrien
 */
class Client {
    private $noClient = 0 ;
    private $nom = "";
    private $courriel = "";
    private $motDePasse = "";
    private $administrateur = false;
    private $panier;
    
    function __construct($noClient, $nom, $courriel, $motDePasse, $administrateur, $panier) {
        $this->noClient = $noClient;
        $this->nom = $nom;
        $this->courriel = $courriel;
        $this->motDePasse = $motDePasse;
        $this->administrateur = $administrateur;
        //listeProduits = array()
        //remplir la liste avec les produits de la commande liée à l'utilisateur
        //$this->panier = = new Commande();
    }
    function getNoClient() {
        return $this->noClient;
    }

    function getNom() {
        return $this->nom;
    }

    function getCourriel() {
        return $this->courriel;
    }

    function getMotDePasse() {
        return $this->motDePasse;
    }

    function getAdministrateur() {
        return $this->administrateur;
    }

    function getPanier() {
        return $this->panier;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setCourriel($courriel) {
        $this->courriel = $courriel;
    }

    function setMotDePasse($motDePasse) {
        $this->motDePasse = $motDePasse;
    }

    function setAdministrateur($administrateur) {
        $this->administrateur = $administrateur;
    }

    function viderPanier() {
        $this->panier = null;
    }



}
