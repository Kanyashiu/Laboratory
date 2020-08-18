<?php

// Exercice 5, Ecrire un algorithme qui demande un nombre de départ, et qui calcule la somme des entiers jusqu’à ce nombre. 
// Par exemple, si l’on entre 5, le programme doit calculer:1 + 2 + 3 + 4 + 5 = 15

function somme($int) {
    
    $result = 0;

    for ( $i = 1; $i <= $int; $i++) {
        $result = $result + $i;
    }
    
    echo $result;
};

$number = readline("Entrez un nombre : ");
somme($number);