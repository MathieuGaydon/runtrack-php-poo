<?php

class Personnage {
    private $x;
    private $y;

    public function __construct($x, $y) {
        $this->x = $x;
        $this->y = $y;
    }

    public function gauche() {
        $this->x--;
    }

    public function droite() {
        $this->x++;
    }

    public function haut() {
        $this->y--;
    }

    public function bas() {
        $this->y++;
    }

    public function position() {
        return ['x' => $this->x, 'y' => $this->y];
    }
}
$perso = new Personnage(0, 0);
$perso->droite();
$perso->bas();
$position = $perso->position();
echo "Position: x = " . $position['x'] . ", y = " . $position['y'];
?>