<?php

// Exercice 10, Créer une fonction from scratch qui s'appelle plusGrand().
// Elle prendra deux arguments de type int. Elle devra retourner le plus grand des deux.



function plusGrand($int1, $int2) {
    return $int1 > $int2 ? $int1 : $int2 . PHP_EOL;
};

echo plusGrand(20, 50);
echo plusGrand(5, 2);