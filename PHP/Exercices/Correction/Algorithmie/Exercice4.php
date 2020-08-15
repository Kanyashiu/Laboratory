<?php

// Exercice 4, Ecrire un algorithme qui demandeun nombre de départ, et qui ensuite écrit la table de multiplication de ce nombre ( Sur 10 multiplication ),

function multiplication($int) {
    
    $result = '';

    for ( $i = 1; $i <= 10; $i++) {

        $result .= $int * $i . ' ';
    }
    
    echo $result;
};

$number = readline("Entrez un nombre : ");
multiplication($number);