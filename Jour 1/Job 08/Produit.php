<?php

class Produit {
    private $nom;
    private $prixHT;
    private $TVA;

    public function __construct($nom, $prixHT, $TVA) {
        $this->nom = $nom;
        $this->prixHT = $prixHT;
        $this->TVA = $TVA;
    }

    public function CalculerPrixTTC() {
        return $this->prixHT * (1 + $this->TVA / 100);
    }

    public function afficher() {
        echo "Nom: " . $this->nom . "<br>";
        echo "Prix HT: " . $this->prixHT . "€<br>";
        echo "TVA: " . $this->TVA . "%<br>";
        echo "Prix TTC: " . $this->CalculerPrixTTC() . "€<br>";
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPrixHT($prixHT) {
        $this->prixHT = $prixHT;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrixHT() {
        return $this->prixHT;
    }

    public function getTVA() {
        return $this->TVA;
    }
}

// Création de plusieurs produits
$produit1 = new Produit("Produit 1", 100, 20);
$produit2 = new Produit("Produit 2", 200, 10);

// Affichage des informations des produits
$produit1->afficher();
$produit2->afficher();

// Modification du nom et du prix des produits
$produit1->setNom("Nouveau Produit 1");
$produit1->setPrixHT(150);
$produit2->setNom("Nouveau Produit 2");
$produit2->setPrixHT(250);

// Affichage des nouvelles informations des produits
echo "Après modification:<br>";
$produit1->afficher();
$produit2->afficher();
?>