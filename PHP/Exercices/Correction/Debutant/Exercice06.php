<?php

// Exercice 6, Créer une fonction from scratch qui s'appelle somme().
// Elle prendra deux arguments de type int. Elle devra retourner la somme des deux.
// Exemple : argument 1 = 5 Argument 2 = 5 ; Resultat : 10


function somme($int1, $int2) {
    return $int1 + $int2;
};

echo somme(4, 6);