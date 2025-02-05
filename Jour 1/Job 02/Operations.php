<?php
class Operation {
    // Déclaration des attributs
    public $nombre1;
    public $nombre2;
    // Constructeur de la classe
    public function __construct($nombre1 = 5, $nombre2 = 10) {
        // Initialisation des attributs avec des valeurs par défaut
        $this->nombre1 = $nombre1;
        $this->nombre2 = $nombre2;
    }
    public function addition() {
        return $this->nombre1 + $this->nombre2;
    }
}
// Instanciation de la classe avec les valeurs par défaut
$operation = new Operation();

// Affichage des attributs
echo "Nombre 1 : " . $operation->nombre1 . "<br>";
echo "Nombre 2 : " . $operation->nombre2 . "<br>";
echo "Résultat de l'addition : " . $operation->addition() . "<br>";

?>
