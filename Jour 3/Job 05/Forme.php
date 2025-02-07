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
class Cercle extends Forme {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function aire() {
        return pi() * pow($this->radius, 2);
    }
}
$cercle = new Cercle(3);
$result = $cercle->aire();
echo "L'aire du cercle est : " . round($result, 2)."<br>";

$rectangle = new Rectangle(5, 10);
echo "L'aire du rectangle est : " . $rectangle->aire();

?>
