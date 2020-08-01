<?php

// Exercice 28, Triangle : Créez une fonction qui prend un argument de type int, cela déterminera la hauteur (en ligne) d'un triangle isocèle rempli d'étoiles
/* Exemple :
       **       
      ****      
     ******     
    ********    
   **********   
  ************  
 ************** 
****************
*/

function triangle($int) {

    $space = $int - 1;
    $star = 2;
    $triangle = '';

    for ($i = 0; $i < $int; $i++) {
        
        // Espace
        for ($j = 0; $j < $space; $j++) {
            $triangle .= ' ';
        }
        
        // Etoiles
        for ($k = 0; $k < $star; $k++) {
            $triangle .= '*';
        }
        
        $triangle .= PHP_EOL;
        $space --;
        $star = $star + 2;
    }
    return $triangle;
};

echo triangle(8) . PHP_EOL;
echo triangle(16) . PHP_EOL;