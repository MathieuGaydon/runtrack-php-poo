<?php 
    class Cercle {
        private $rayon;
        private $centre;

        public function __construct($rayon, $centre) {
            $this->rayon = $rayon;
            $this->centre = $centre;
        }

        public function afficherInfos() {
            echo "Le cercle a pour rayon : " . $this->rayon . " et pour centre : (" . $this->centre['x'] . ", " . $this->centre['y'] . ")<br>";
        }

        public function changerRayon($rayon) {
            $this->rayon = $rayon;
        }
        public function circonference() {
            return 2 * pi() * $this->rayon;
        }

        public function aire() {
            return pi() * pow($this->rayon, 2);
        }
        public function diametre() {
            return 2 * $this->rayon;
        }
    }
    $cercle = new Cercle(5, ['x' => 0, 'y' => 0]);
    $cercle->afficherInfos();
    $cercle->changerRayon(10);
    $cercle->afficherInfos();
    echo "Circonférence : " . $cercle->circonference() . "<br>";
    echo "Aire : " . $cercle->aire() . "<br>";
    echo "Diamètre : " . $cercle->diametre() . "<br>";
?>
