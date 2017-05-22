<?php
include_once('/classes/Commande.class.php'); 
/**
 * Description of Client
 *
 * @author Samuel Therrien
 */
class Client {
    private $noClient = 0 ;
    private $username = "";
    private $courriel = "";
    private $password = "";
    private $administrateur = false;
    private $noPanier;
    
    function __construct($noClient=null, $username="", $courriel="", $password="", $administrateur=false, $noPanier=null) {
        $this->noClient = $noClient;
        $this->username = $username;
        $this->courriel = $courriel;
        $this->password = $password;
        switch ($administrateur) {
            case true:
                $this->administrateur = true;
                break;
            case 1:
                $this->administrateur = true;
                break;
            case "1":
                $this->administrateur = true;
                break;
            default:
                $this->administrateur = false;
                break;
        }
        $this->noPanier = $noPanier;
    }
    function getNoClient() {
        return $this->noClient;
    }

    function getUsername() {
        return $this->username;
    }

    function getCourriel() {
        return $this->courriel;
    }

    function getPassword() {
        return $this->password;
    }

    function isAdministrateur() {
        return $this->administrateur;
    }

    function getNoPanier() {
        return $this->noPanier;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setCourriel($courriel) {
        $this->courriel = $courriel;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setAdministrateur($administrateur) {
        switch ($administrateur) {
            case true:
                $this->administrateur = true;
                break;
            case 1:
                $this->administrateur = true;
                break;
            case "1":
                $this->administrateur = true;
                break;
            default:
                $this->administrateur = false;
                break;
        }
    }

    function setNoPanier($noPanier) {
        $this->noPanier=$noPanier;
    }
    
    function viderPanier() {
        // TODO: actually wipe out the array that's linked to this ID
        $this->noPanier = null;
    }
    
    public function __toString() {
        return $this->username;
    }
    
    public function affiche() {
        echo $this->__toString();
    }

    public function loadFromRecord($ligne) {
        $this->username = $ligne["NUMID"];
        $this->password = $ligne["MDP"];
    }	

}
