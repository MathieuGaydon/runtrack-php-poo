<?php

class Voiture {
    private $marque;
    private $modele;
    private $annee;
    private $kilometrage;
    private $en_marche = false;
    private $reservoir = 50;

    public function __construct($marque, $modele, $annee, $kilometrage) {
        $this->marque = $marque;
        $this->modele = $modele;
        $this->annee = $annee;
        $this->kilometrage = $kilometrage;
    }

    public function setMarque($marque) {
        $this->marque = $marque;
    }

    public function setModele($modele) {
        $this->modele = $modele;
    }

    public function setAnnee($annee) {
        $this->annee = $annee;
    }

    public function setKilometrage($kilometrage) {
        $this->kilometrage = $kilometrage;
    }

    public function setEnMarche($en_marche) {
        $this->en_marche = $en_marche;
    }

    public function getMarque() {
        return $this->marque;
    }

    public function getModele() {
        return $this->modele;
    }

    public function getAnnee() {
        return $this->annee;
    }

    public function getKilometrage() {
        return $this->kilometrage;
    }

    public function getEnMarche() {
        return $this->en_marche;
    }

    public function demarrer() {
        if ($this->verifier_plein() > 5) {
            $this->en_marche = true;
        } else {
            echo "Le réservoir est trop bas pour démarrer la voiture.";
        }
    }

    public function arreter() {
        $this->en_marche = false;
    }

    private function verifier_plein() {
        return $this->reservoir;
    }

    public function afficherDetails() {
        echo "Marque: " . $this->getMarque() . "<br>";
        echo "Modèle: " . $this->getModele() . "<br>";
        echo "Année: " . $this->getAnnee() . "<br>";
        echo "Kilométrage: " . $this->getKilometrage() . " km<br>";
        echo "En marche: " . ($this->getEnMarche() ? "Oui" : "Non") . "<br>";
        echo "Réservoir: " . $this->verifier_plein() . " litres<br>";
    }
}
$Voiture = new Voiture("Toyota", "Corolla", 2015, 100000);
$Voiture->demarrer();
$Voiture->afficherDetails();
$Voiture->arreter();
$Voiture->afficherDetails();

?>