<?php

class Student {
    private $nom;
    private $prenom;
    private $numeroEtudiant;
    private $credits = 0;
    private $level;

    public function __construct($nom, $prenom, $numeroEtudiant) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->numeroEtudiant = $numeroEtudiant;
        $this->level = $this->studentEval();
    }

    public function add_credits($credits) {
        if ($credits > 0) {
            $this->credits += $credits;
            $this->level = $this->studentEval();
        }
    }

    private function studentEval() {
        if ($this->credits >= 90) {
            return "Excellent";
        } elseif ($this->credits >= 80) {
            return "Très bien";
        } elseif ($this->credits >= 70) {
            return "Bien";
        } elseif ($this->credits >= 60) {
            return "Passable";
        } else {
            return "Insuffisant";
        }
    }

    public function studentInfo() {
        echo "Nom: " . $this->nom . "<br>";
        echo "Prénom: " . $this->prenom . "<br>";
        echo "Numéro d'étudiant: " . $this->numeroEtudiant . "<br>";
        echo "Niveau: " . $this->level . "<br>";
    }
}


$student = new Student("Doe", "John", 145);
$student->add_credits(30);
$student->add_credits(40);
$student->studentInfo();
?>