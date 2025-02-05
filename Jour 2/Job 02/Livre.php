<?php
    class Livre {
        private $titre;
        private $auteur;
        private $nbPages;
        
        public function __construct($titre, $auteur, $nbPages) {
            $this->titre = $titre;
            $this->auteur = $auteur;
            $this->setNbPages($nbPages); 
        }
        
        public function getTitre() {
            return $this->titre;
        }
        
        public function setTitre($titre) {
            $this->titre = $titre;
        }
        
        public function getAuteur() {
            return $this->auteur;
        }
        
        public function setAuteur($auteur) {
            $this->auteur = $auteur;
        }
        
        public function getNbPages() {
            return $this->nbPages;
        }
        
        public function setNbPages($nbPages) {
            if (is_int($nbPages) && $nbPages > 0) {
                $this->nbPages = $nbPages;
            } else {
                echo "Erreur: Le nombre de pages doit être un entier positif.<br>";
            }
        }
    }

$Livre = new Livre("Le Seigneur des Anneaux", "J.R.R. Tolkien", 1200);
echo "Titre: " . $Livre->getTitre() . ", Auteur: " . $Livre->getAuteur() . ", Nombre de pages: " . $Livre->getNbPages() . "<br>";

$Livre->setTitre("Harry Potter");
$Livre->setAuteur("J.K. Rowling");
$Livre->setNbPages(800);
echo "Titre modifié: " . $Livre->getTitre() . ", Auteur modifié: " . $Livre->getAuteur() . ", Nombre de pages modifié: " . $Livre->getNbPages() . "<br>";
$Livre->setNbPages(-100);
?>