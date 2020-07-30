<?php

// Exercice 26, Bataille Navale
/*
Image : https://user.oc-static.com/files/175001_176000/175985.png
Ci-dessus un tableau de 10 cases sur 10, vous devez créez une fonction qui prend deux arguments, le premier de type char le second de type int, ce seront les coordonnées horizontales et verticales du tableau.
Votre fonction doit retourner trois valeurs différentes:
[1] Si les coordonnées correspondent à une case grise, votre fonction doit afficher touché.
[2] Si les coordonnées correspondent à une case blanche, votre fonction doit afficher loupé.
[3] Si les coordonnées ne correspondent à aucune case, votre fonction doit afficher hors-jeu.
 Contrainte: Vous ne devez pas dépasser 30 lignes, avec un code correctement indenté.
*/


function batailleNavale($string, $int) {
    
    $board = [
        'A' => [0,0,0,0,0,0,0,0,0,0],
        'B' => [0,0,0,0,0,0,0,0,0,0],
        'C' => [0,0,0,0,0,0,0,0,1,0],
        'D' => [0,0,0,0,0,0,0,0,1,0],
        'E' => [0,0,0,0,0,0,0,0,1,0],
        'F' => [0,0,1,1,1,0,0,0,1,0],
        'G' => [0,0,0,0,0,0,0,0,0,0],
        'H' => [0,0,0,0,0,0,0,0,0,0],
        'I' => [0,0,0,0,1,1,0,0,0,0],
        'J' => [0,0,0,0,0,0,0,0,0,0],
    ];

    if (isset($board[strtoupper($string)][$int - 1])) {
        return $board[strtoupper($string)][$int - 1] == 1 ? 'Touché' : 'Loupé';
    }
    else {
        return 'Hors-jeu';
    }                                                                                                                                                                                                                                                                                                                                                                                          
};

echo batailleNavale('C', 9) . PHP_EOL;
echo batailleNavale('F', 3) . PHP_EOL;
echo batailleNavale('I', 5) . PHP_EOL;
echo batailleNavale('C', 5) . PHP_EOL;
echo batailleNavale('Z', 5) . PHP_EOL;