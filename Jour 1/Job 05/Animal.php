<?php

class Animal {
    public $age;
    public $prenom;

    public function __construct() {
        $this->age = 0;
        $this->prenom = "";
    }

    public function vieillir() {
        $this->age += 1;
    }

    public function nommer($nom) {
        $this->prenom = $nom;
    }
}

// Instancier un objet Animal
$animal = new Animal();

// Afficher l'attribut age
echo "Age de l'animal: " . $animal->age . "<br>";

// Faire vieillir l'animal
$animal->vieillir();

// Afficher l'âge après vieillissement
echo "Age de l'animal après vieillissement: " . $animal->age . "<br>";

// Nommer l'animal
$animal->nommer("Rex");

// Afficher le nom de l'animal
echo "Nom de l'animal: " . $animal->prenom . "<br>";

?>