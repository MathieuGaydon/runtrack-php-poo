<?php
class Vehicule {
    protected $marque;
    protected $modele;
    protected $annee;
    protected $prix;
    public function __construct($marque, $modele, $annee, $prix) {
        $this->marque = $marque;
        $this->modele = $modele;
        $this->annee = $annee;
        $this->prix = $prix;
    }
    public function informationsVehicule() {
        return "Marque: $this->marque, Modèle: $this->modele, Année: $this->annee, Prix: $this->prix<br>";
    }
    public function demarrer() {
        return "Attention, je roule<br>";
    }
}

class Voiture extends Vehicule {
    private $portes;
    public function __construct($marque, $modele, $annee, $prix) {
        parent::__construct($marque, $modele, $annee, $prix);
        $this->portes = 4;
    }
    public function informationsVehicule() {
        return parent::informationsVehicule() . "Nombre de portes: $this->portes<br>";
    }
    public function demarrer() {
        return "La voiture démarre<br>";
    }
}
class Moto extends Vehicule {
    private $roue;
    public function __construct($marque, $modele, $annee, $prix) {
        parent::__construct($marque, $modele, $annee, $prix);
        $this->roue = 2;
    }
    public function informationsVehicule() {
        return parent::informationsVehicule() . "Nombre de roues: $this->roue<br>";
    }
    public function demarrer() {
        return "La moto démarre<br>";
    }
}
$voiture = new Voiture("Mercedes", "Classe A", 2020, 18500);
echo $voiture->informationsVehicule();
echo $voiture->demarrer();
$moto = new Moto("Yamaha", "1200 Vmax", 1987, 4500);
echo $moto->informationsVehicule();
echo $moto->demarrer();

?>
