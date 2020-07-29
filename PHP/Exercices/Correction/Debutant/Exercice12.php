<?php

// Exercice 12, Créer une fonction from scratch qui s'appelle plusPetit(). Elle prendra trois arguments de type int. 
// Elle devra retourner le plus petit des trois.


function plusPetit($int1, $int2, $int3) {
    
    // Version avec une fonction native de php
    return min($int1, $int2, $int3);
    
    // Version plus complexe en écriture ternaire
    //return $int1 < $int2 ? ($int1 < $int3 ? $int1 : $int3) : ($int2 < $int3 ? $int2 : $int3);
};

echo plusPetit(20, 70, 3) . PHP_EOL;
echo plusPetit(-15, 5, 3) . PHP_EOL;