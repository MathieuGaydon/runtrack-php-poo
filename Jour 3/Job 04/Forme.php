<?php

class Forme {
    public function aire() {
        return 0;
    }
}

class Rectangle extends Forme {
    private $largeur;
    private $hauteur;

    public function __construct($largeur, $hauteur) {
        $this->largeur = $largeur;
        $this->hauteur = $hauteur;
    }

    public function aire() {
        return $this->largeur * $this->hauteur;
    }
}

$rectangle = new Rectangle(5, 10);
echo "L'aire du rectangle est : " . $rectangle->aire();

?>