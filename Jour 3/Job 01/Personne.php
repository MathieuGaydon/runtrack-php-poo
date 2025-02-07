<?php

class Personne {
    protected $age = 14;

    public function afficherAge() {
        return "J'ai " . $this->age . " ans<br>";
    }

    public function bonjour() {
        return "Hello<br>";
    }

    public function modifierAge($age) {
        $this->age = $age;
    }
}

class Eleve extends Personne {
    public function allerEnCours() {
        return "Je vais en cours<br>";
    }

    public function afficherAge() {
        return "J'ai " . $this->age . " ans<br>";
    }
}

class Professeur {
    private $matiereEnseignee;

    public function __construct($matiere) {
        $this->matiereEnseignee = $matiere;
    }

    public function enseigner() {
        return "Le cours va commencer<br>";
    }

    public function getMatiere() {
        return "La matière enseignée est " . $this->matiereEnseignee . "<br>";
    }
}
$personne = new Personne();
$eleve = new Eleve();


$eleveAgeMessage = $eleve->afficherAge();



echo $eleveAgeMessage;


?>