<?php

// Exercice 11, Créer une fonction from scratch qui s'appelle plusPetit().
// Elle prendra deux arguments de type int. Elle devra retourner le plus petit des deux.


function plusPetit($int1, $int2) {
    return $int1 < $int2 ? $int1 : $int2;
};

echo plusPetit(20, 50) . PHP_EOL ;
echo plusPetit(5, 2) . PHP_EOL ;