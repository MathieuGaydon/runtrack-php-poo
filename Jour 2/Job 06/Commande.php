<?php

class Commande {
    private $numeroCommande;
    private $listePlatsCommandes = [];
    private $statutCommande;

    public function __construct($numeroCommande) {
        $this->numeroCommande = $numeroCommande;
        $this->statutCommande = 'en cours';
    }

    public function ajouterPlat($nomPlat, $prix) {
        if ($this->statutCommande === 'en cours') {
            $this->listePlatsCommandes[$nomPlat] = $prix;
        } else {
            echo "Impossible d'ajouter un plat, la commande est " . $this->statutCommande . ".<br>";
        }
    }

    public function annulerCommande() {
        if ($this->statutCommande === 'en cours') {
            $this->statutCommande = 'annulée';
            $this->listePlatsCommandes = [];
        } else {
            echo "La commande ne peut pas être annulée car elle est " . $this->statutCommande . ".<br>";
        }
    }

    private function calculerTotal() {
        return array_sum($this->listePlatsCommandes);
    }

    public function afficherCommande() {
        echo "Commande N°: " . $this->numeroCommande . "<br>";
        echo "Statut: " . $this->statutCommande . "<br>";
        echo "Plats commandés:<br>";
        foreach ($this->listePlatsCommandes as $nomPlat => $prix) {
            echo "- $nomPlat: $prix €<br>";
        }
        echo "Total à payer: " . $this->calculerTotal() . " €<br>";
    }

    public function calculerTVA($tauxTVA) {
        $total = $this->calculerTotal();
        return $total * ($tauxTVA / 100);
    }
}
$Commande= new Commande(1);
$Commande->ajouterPlat("Pizza", 10);
$Commande->ajouterPlat("Pâtes", 8);
$Commande->ajouterPlat("Salade", 5);
$Commande->afficherCommande();
echo "TVA: " . $Commande->calculerTVA(20) . " €<br>";
$Commande->annulerCommande();
$Commande->ajouterPlat("Burger", 15);
$Commande->afficherCommande();

?>