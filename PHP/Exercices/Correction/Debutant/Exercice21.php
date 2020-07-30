<?php

/* Exercice 21, Créer une fonction from scratch qui s'appelle remplacerLesLettres(). 
Elle prendra un argument de type string. Elle devra retourner cette même string mais en remplacant les e par des 3, les i par des 1 et les o par des 0 
Exemple :
input : "Bonjour les amis" ==> Output : B0nj0ur l3s am1s
input : "Les cours de programmation Web sont trops cools" ==> Output : L3s c0urs d3 pr0grammat10n W3b s0nt tr0ps c00ls
*/


function remplacerLesLettres($string) {
    
    $string = str_replace(['e', 'i', 'o'], ['3', '1', '0'], $string);
    return $string;
};

echo remplacerLesLettres('Les cours de programmation Web sont trops cools') . PHP_EOL;
echo remplacerLesLettres('Bienvenu dans le laboratoire !') . PHP_EOL;