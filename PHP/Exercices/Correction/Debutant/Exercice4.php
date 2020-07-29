<?php

// Exercice 4, Créer une fonction from scratch qui s'appelle concatenation().
// Elle prendra deux arguments de type string. Elle devra retourner la concatenation des deux.
// Exemple : argument 1 = Antoine Argument 2 = Griezmann; Resultat : AntoineGriezmann


function concatenation($string1, $string2) {
    return $string1 . $string2;
};

echo concatenation('Hel', 'lo');