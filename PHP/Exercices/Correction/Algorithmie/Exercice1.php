<?php

// Exercice 1, Ecrire un algorithme qui demande à l’utilisateur un nombre compris entre 1 et 3 jusqu’à ce que la réponse convienne.

function checkInt($int) {
    
    if ( $int >= 1 && $int <= 3)
    {
        echo 'Bravo ! votre nombre est compris entre 1 et 3' . PHP_EOL;
    }
    else {
        $int = readline("Recommencez, saisie erroné : ") . PHP_EOL;
        checkInt($int);
    }
};

$number = readline("Entrez un nombre entre 1 et 3 : ");
checkInt($number);