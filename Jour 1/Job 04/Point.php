<?php

class Point {
    private $x;
    private $y;

    public function __construct($x, $y) {
        $this->x = $x;
        $this->y = $y;
    }

    public function afficherLesPoints() {
        echo "Les coordonnées du point sont : (" . $this->x . ", " . $this->y . ")<br>";
    }

    public function afficherX() {
        echo "La coordonnée x est : " . $this->x . "<br>";
    }

    public function afficherY() {
        echo "La coordonnée y est : " . $this->y . "<br>";
    }

    public function changerX($x) {
        $this->x = $x;
    }

    public function changerY($y) {
        $this->y = $y;
    }
}
$point = new Point(3, 4);
$point->afficherLesPoints();
$point->afficherX();
$point->afficherY();

$point->changerX(10);
$point->changerY(20);
$point->afficherLesPoints();
$point->afficherX();
$point->afficherY();

?>