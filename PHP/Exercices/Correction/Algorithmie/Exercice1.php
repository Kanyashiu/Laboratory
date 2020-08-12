<?php

// Exercice 1, Ecrire un algorithme qui demande à l’utilisateur un nombre compris entre 1 et 3 jusqu’à ce que la réponse convienne.

function checkInt() {
    
    $number = readline("Entrez un nombre entre 1 et 3 : ");

    if ( $number >= 1 && $number <= 3)
    {
        echo 'Bravo votre nombre est compris entre 1 et 3' . PHP_EOL;
    }
    else {
        echo "Votre nombre n'est pas compris entre 1 et 3" . PHP_EOL;
        checkInt();
    }
};

checkInt();