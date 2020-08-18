<?php

// Exercice 6, Ecrire un algorithme qui demande un nombre de départ, et qui calcule sa factorielle.
// NB: la factorielle de 8, notée 8!, vaut 1 x 2 x 3 x 4 x 5 x 6 x 7 x 8

function factorielle($int) {
    
    $result = 1;

    for ( $i = 2; $i <= $int; $i++) {
        
        $result = $result * $i;
    }
    
    echo $result;
};

$number = readline("Entrez un nombre : ");
factorielle($number);