<?php

// Exercice 5, Créer une fonction from scratch qui s'appelle concatenationAvecEspace().
// Elle prendra deux arguments de type string. Elle devra retourner la concatenation des deux.
// Exemple : argument 1 = Ngolo Argument 2 = Kante; Resultat : Ngolo Kante


function concatenationAvecEspace($string1, $string2) {
    return $string1 ." ". $string2;
};

echo concatenationAvecEspace('Hello', 'world!');