<?php
class Rectangle {
    private $longueur;
    private $largeur;

    public function __construct($longueur, $largeur) {
        $this->longueur = $longueur;
        $this->largeur = $largeur;
    }

    public function getLongueur() {
        return $this->longueur;
    }

    public function setLongueur($longueur) {
        $this->longueur = $longueur;
    }

    public function getLargeur() {
        return $this->largeur;
    }

    public function setLargeur($largeur) {
        $this->largeur = $largeur;
    }
}

$rectangle = new Rectangle(10, 5);
echo "Longueur: " . $rectangle->getLongueur() . ", Largeur: " . $rectangle->getLargeur() . "<br>";

$rectangle->setLongueur(15);
$rectangle->setLargeur(8);
echo "Longueur modifiée: " . $rectangle->getLongueur() . ", Largeur modifiée: " . $rectangle->getLargeur() . "<br>";

?>