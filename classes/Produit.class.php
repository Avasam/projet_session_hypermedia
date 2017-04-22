<?php

class Produit {
	private $numProduit=0;
	private $nom = "";
	private $prix = 0.0;
	private $rabais_pct = 0;
	private $rabais_abs = 0;
	private $description = "";
	private $image = "";
	private $categorie = "";

	public function __construct($n="XXX000")	//Constructeur
	{
		$this->nom = $n;
	}	
	
	//getters
	public function getNumProduit()
	{
			return $this->numProduit;
	}
	
	public function getNom()
	{
			return $this->nom;
	}
	
	public function getPrix()
	{
			return $this->prix;
	}
	
	public function getDescription()
	{
			return $this->description;
	}
	public function getCategorie()
	{
			return $this->categorie;
	}
	public function getImage()
	{
			return $this->image;
	}
	
	//setters
	public function setNom($value)
	{
			$this->nom = $value;
	}
        
	public function setPrix($value)
	{
			$this->prix = $value;
	}
	
	public function setRabaisPCT($value)
	{
			$this->rabais_pct = $value;
	}
	
	public function setRabaisABS($value)
	{
			$this->rabais_abs = $value;
	}
	
	public function setDescription($value)
	{
			$this->description = $value;
	}
	public function setImage($value)
	{
			$this->image = $value;
	}
	
	//void
	public function __toString()
	{
		return "Produit[".$this->nom.",".$this->prix.",".$this->rabais_pct.",".this->rabais_abs."]";
	}
	public function affiche()
	{
		echo $this->__toString();
	}
	public function loadFromArray($tab)
	{
		$this->nom = $tab["NOM"];
		$this->prix = $tab["PRIX"];
		$this->rabais_abs = $tab["RABAIS_ABS"];
		$this->rabais_pct = $tab["RABAIS_PCT"];
	}	
}
?>