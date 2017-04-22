<?php
/**
 * Description of Commande
 *
 * @author Avasam
 */
class Commande {
    private $noCommande = 0;
    private $datePaiement = null;
    private $listeProduits = null;
    
    function __construct($noCommande, $datePaiement) {
        $this->noCommande = $noCommande;
        $this->datePaiement = $datePaiement;
    }
    
    function getNoCommande() {
        return $this->noCommande;
    }

    function getDatePaiement() {
        return $this->datePaiement;
    }

    function getListeProduits() {
        return $this->listeProduits;
    }

    function setDatePaiement($datePaiement) {
        $this->datePaiement = $datePaiement;
    }

    function setListeProduits($listeProduits) {
        $this->listeProduits = $listeProduits;
    }



            
}
