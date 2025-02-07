<?php

class Carte {
    public $valeur;
    public $couleur;
    

    public function __construct($valeur, $couleur) {
        $this->valeur = $valeur;
        $this->couleur = $couleur;
    }

    public function getValeur() {
        if (in_array($this->valeur, ['J', 'Q', 'K'])) {
            return 10; 
        } elseif ($this->valeur == 'A') {
            return 11; 
        }
        return (int)$this->valeur;
    }
}


class Jeu {
    private $paquet = [];
    private $joueur = [];
    private $croupier = [];
    
    public function __construct() {
        $couleurs = ['Coeurs', 'Piques', 'Carreaux', 'Trèfles'];
        $valeurs = ['2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A'];
        
        foreach ($couleurs as $couleur) {
            foreach ($valeurs as $valeur) {
                $this->paquet[] = new Carte($valeur, $couleur);
            }
        }
        shuffle($this->paquet);
    }

    // Distribuer les cartes
    public function distribuer() {
        $this->joueur[] = array_shift($this->paquet);
        $this->joueur[] = array_shift($this->paquet);
        $this->croupier[] = array_shift($this->paquet);
        $this->croupier[] = array_shift($this->paquet);
    }

    // Calculer la valeur d'une main
    public function calculerMain($main) {
        $total = 0;
        $asCompterComme11 = false;
        
        foreach ($main as $carte) {
            $total += $carte->getValeur();
            if ($carte->valeur == 'A') {
                $asCompterComme11 = true;
            }
        }

        // Si le total dépasse 21 et qu'il y a un As compté comme 11, on le compte comme 1
        if ($total > 21 && $asCompterComme11) {
            $total -= 10;
        }
        
        return $total;
    }

    // Afficher la main d'un joueur
    public function afficherMain($main) {
        foreach ($main as $carte) {
            echo $carte->valeur . ' de ' . $carte->couleur . ' | ';
        }
        echo "\n";
    }

    // Jouer la partie
    public function jouer() {
        $this->distribuer();
        
        // Afficher les cartes initiales
        echo "Cartes du joueur :\n";
        $this->afficherMain($this->joueur);
        echo "Total joueur : " . $this->calculerMain($this->joueur) . "\n\n";

        echo "Cartes du croupier :\n";
        $this->afficherMain([$this->croupier[0]]);
        echo "Total croupier : " . $this->calculerMain([$this->croupier[0]]) . "\n\n";
        
        // Tour du joueur
        while ($this->calculerMain($this->joueur) < 21) {
            echo "Souhaitez-vous (P)rendre une carte ou (Q)uitter ?\n";
            $choix = trim(fgets(STDIN));
            if (strtoupper($choix) == 'P') {
                $this->joueur[] = array_shift($this->paquet);
                echo "Carte tirée : " . $this->joueur[count($this->joueur) - 1]->valeur . "\n";
                $this->afficherMain($this->joueur);
                $totalJoueur = $this->calculerMain($this->joueur);
                echo "Total joueur : $totalJoueur\n";
                if ($totalJoueur > 21) {
                    echo "Désolé, vous avez dépassé 21. Vous avez perdu.\n";
                    return;
                }
            } elseif (strtoupper($choix) == 'Q') {
                break;
            }
        }

        // Tour du croupier (s'arrête si 17 ou plus)
        $totalCroupier = $this->calculerMain($this->croupier);
        while ($totalCroupier < 17) {
            $this->croupier[] = array_shift($this->paquet);
            $totalCroupier = $this->calculerMain($this->croupier);
        }
        
        // Afficher les mains et les résultats
        echo "\nCartes du croupier :\n";
        $this->afficherMain($this->croupier);
        echo "Total croupier : $totalCroupier\n";

        // Déterminer le gagnant
        $totalJoueur = $this->calculerMain($this->joueur);
        if ($totalJoueur > 21) {
            echo "Le joueur a dépassé 21, le croupier gagne.\n";
        } elseif ($totalCroupier > 21 || $totalJoueur > $totalCroupier) {
            echo "Le joueur gagne !\n";
        } elseif ($totalJoueur < $totalCroupier) {
            echo "Le croupier gagne.\n";
        } else {
            echo "Égalité.\n";
        }
    }
}
$jeu = new Jeu();
$jeu->jouer();
?>