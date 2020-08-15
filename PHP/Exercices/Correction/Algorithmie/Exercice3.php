<?php

// Exercice 3, Ecrire un algorithme qui demandeun nombre de départ, et qui ensuite affiche les dix nombres suivants. 
// Par exemple, si l'utilisateur entre le nombre 17, le programme affichera les nombres de 18 à 27.

function addition($int) {
    
    $result = '';

    for ( $i = 0; $i < 10; $i++) {

        $int = $int + 1;
        $result .= $int . ' ';
    }
    
    echo $result;
};

$number = readline("Entrez un nombre : ");
addition($number);