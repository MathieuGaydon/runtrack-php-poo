<?php
    class Livre {
        private $titre;
        private $auteur;
        private $nbPages;
        private $disponible;

        public function __construct($titre, $auteur, $nbPages) {
            $this->titre = $titre;
            $this->auteur = $auteur;
            $this->setNbPages($nbPages);
            $this->disponible = true;
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

        public function verification() {
            return $this->disponible;
        }

        public function emprunter() {
            if ($this->verification()) {
                $this->disponible = false;
                echo "Le livre a été emprunté.<br>";
            } else {
                echo "Le livre n'est pas disponible pour emprunt.<br>";
            }
        }

        public function rendre() {
            if (!$this->verification()) {
                $this->disponible = true;
                echo "Le livre a été rendu.<br>";
            } else {
                echo "Le livre n'a pas été emprunté.<br>";
            }
        }
        public function afficherRendre() {
            if ($this->verification()) {
                echo "Le livre a été rendu.<br>";
            } else {
                echo "Le livre n'a pas été rendu.<br>";
            }
        }

        public function setDisponibilite($disponible) {
            if (is_bool($disponible)) {
                $this->disponible = $disponible;
            } else {
                echo "Erreur: La disponibilité doit être un booléen.<br>";
            }
        }

        public function afficherDisponibilite() {
            if ($this->verification()) {
                echo "Le livre est disponible.<br>";
            } else {
                echo "Le livre n'est pas disponible.<br>";
            }
        }
    }

$Livre = new Livre("Le Seigneur des Anneaux", "J.R.R. Tolkien", 1200);
echo "Titre: " . $Livre->getTitre() . ", Auteur: " . $Livre->getAuteur() . ", Nombre de pages: " . $Livre->getNbPages() . "<br>";
$Livre->afficherDisponibilite();
$Livre->emprunter(); 
$Livre->rendre();
$Livre->setTitre("Harry Potter");
$Livre->setAuteur("J.K. Rowling");
$Livre->setNbPages(800);
$Livre->setDisponibilite(false);
echo "Titre modifié: " . $Livre->getTitre() . ", Auteur modifié: " . $Livre->getAuteur() . ", Nombre de pages modifié: " . $Livre->getNbPages() . "<br>";
$Livre->afficherDisponibilite();
$Livre->emprunter(); 
$Livre->afficherRendre(false);
?>