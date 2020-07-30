<?php

// Exercice 27, Conjecture de Syracuse : Créez une fonction qui prend comme argument n'importe quel nombre entier supérieur à zéro, 
// si le nombre est pair divisez-le par 2, si le nombre est impair multipliez-le par 3 et ajoutez 1. 
// Au final votre fonction doit retourner une série de nombre, le dernier de ces nombres doit être le chiffre 1.

function syracuse($int) {
    
    $result = null;

    if ($int > 0 && is_int(intval($int))) {
        
        $result = '';
        do {
            $int = $int % 2 == 0 ? $int / 2 : $int * 3 + 1;
            $result .= $int . ' ';
        }
        while ($int != 1);

    }
    else {
        return 'Votre nombre doit être un entier supérieur à zéro !';
    }
    
    return $result;
};

echo syracuse('5') . PHP_EOL;
echo syracuse('1') . PHP_EOL;