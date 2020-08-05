<?php

/* Exercice 31, Table de multiplication binaire
Créez une fonction qui prend en argument un entier positif non nul, cela correspondra au nombre de lignes et de colonnes d'une table de multiplication. Tous les nombres affichés doivent être des nombres en base binaire. 
Vous devez séparer les nombres sur une ligne par des caractères de tabulation.
Remarque:
Vous pouvez utiliser la fonction decbin() si vous avez du mal à résoudre cet exercice, cependant il est possible et plus interessant de ne pas l'utiliser.
Exemple :
En entrée : 6
En sortie :
1       10       11       100       101       110
10      100      110      1000      1010      1100
11      110      1001     1100      1111      10010
100     1000     1100     10000     10100     11000
101     1010     1111     10100     11001     11110
110     1100     10010    11000     11110     100100

Commencez par la gauche et ajoutez un 0 ou un 1 à chaque case du tableau pour obtenir le nombre que vous souhaitez.
*/

// Avec decbin
function decimalToBinaireV1($int) {
    // Documentation qui ma aidé :
    // https://www.php.net/manual/fr/function.decbin.php

    for ($j = 1; $j <= $int; $j++) {
        
        for ($i = 1; $i <= $int; $i++) {
            echo decbin($i*$j) . "\t";
        }

        echo PHP_EOL;
    }
    
    
}

// Sans decbin ( juste pour le fun ne réinventons pas la roue :P )
function decimalToBinaireV2($int) {
    // Documentation qui ma aidé :
    // https://www.php.net/manual/fr/function.array-reverse.php
    // https://www.youtube.com/watch?v=6YI8A8oeVLw

    // colonne
    for ($j = 1; $j <= $int; $j++) {

        // ligne
        for ($i = 1; $i <= $int; $i++) {
            
            $restes = [];
            $sum = $i*$j;

            while ($sum != 0) {
                
                $restes[] = ($sum) % 2;
                
                // Permet de transformer les potentien chiffre flottant en entier
                $sum = intval($sum / 2);
            }
            
            $restes = array_reverse($restes);

            foreach ($restes as $binaire) {
                echo $binaire;
            }

            echo "\t";
        }

        echo PHP_EOL;
    }
    
    
}

echo decimalToBinaireV1(6) . PHP_EOL;
echo decimalToBinaireV2(6) . PHP_EOL;




