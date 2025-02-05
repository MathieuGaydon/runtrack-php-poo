<?php
    class Personne {
        public $nom;
        public $prenom;
        // Constructeur de la classe
    public function __construct($nom = '', $prenom = '') {
        // Initialisation des attributs avec des valeurs par défaut
        $this->nom = $nom;
        $this->prenom = $prenom;
    }
    public function SePresenter() {
        echo "Bonjour, je suis " . $this->prenom . " " . $this->nom . "<br>";
    }
}
// Instanciation de la classe avec les valeurs par défaut
$Personne = new Personne();
$Personne->nom = "Doe";
$Personne->prenom = "John";
$Personne->SePresenter();
$Personne->nom ="Dupond";
$Personne->prenom = "Jean";
$Personne->SePresenter();
?>