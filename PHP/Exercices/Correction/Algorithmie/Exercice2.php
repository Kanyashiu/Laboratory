<?php

// Exercice 2, Ecrire un algorithme qui demande un nombre compris entre 10 et 20, jusqu’à ce que la réponse convienne. 
// En cas de réponse supérieure à 20, on fera apparaître un message: «Plus petit!», et inversement, «Plus grand! » si le nombre est inférieur à 10

function checkInt($int) {
    
    if ( $int >= 10 && $int <= 20)
    {
        echo 'Bravo votre nombre est compris entre 10 et 20' . PHP_EOL;
    }
    else if ( $int < 10) {
        $int = readline("Plus grand ! Recommencez : ")  . PHP_EOL;
        checkInt($int);
    }
    else {
        $int = readline("Plus petit ! Recommencez : ")  . PHP_EOL;
        checkInt($int);
    }
};

$number = readline("Entrez un nombre entre 10 et 20 : ");
checkInt($number);