<?php

// Exercice 9, Lire la suite des prix (en euros entiers et terminée par zéro) des achats d’un client. 
// Calculer la somme qu’il doit, lire la somme qu’il paye, et simuler la remise de la monnaie en affichant les textes "10 Euros", "5 Euros" et "1 Euro" autant de fois qu’il y a de coupures de chaque sorte à rendre.

function achat() {
    
    $total = 0;
    $nb10e = 0;
    $nb5e = 0;
    $reste = 0;

    while(true) {
        
        $sommeDue = readline("Entrez le montant : ");
        $sommeDue = intval($sommeDue);

        $total = $total + $sommeDue;

        if ($sommeDue === 0) {
            break;
        }
    }

    echo "Vous devez : {$total} euros" . PHP_EOL;

    $montant = readline("Montant versé : ");
    $montant = intval($montant);

    if ($montant < $total) {

        echo "Montant insuffisant, transaction annulé";
        exit();
    }

    $reste = $montant - $total;

    while($reste >= 10) {

        $nb10e = $nb10e + 1;
        $reste = $reste - 10;
    }

    while($reste >= 5) {

        $nb5e = $nb5e + 1;
        $reste = $reste - 5;
    }

    echo "Voici votre monnaie : Billet de 10€ ({$nb10e}), Billet de 5€ ({$nb5e}), Pièce de 1€ ({$reste})" . PHP_EOL;
};


achat();