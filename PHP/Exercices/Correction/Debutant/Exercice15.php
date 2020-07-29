<?php

// Exercice 15, Créer une fonction from scratch qui s'appelle plusGrand(). 
// Elle prendra un argument de type array. Elle devra retourner le plus grand des élements présent dans l'array. Si l'array est vide, il faudra retourner null;


function plusGrand($array) {
    
    if ($array == null) {
        return null;
    }

    $max = $array[0];
    foreach($array as $number) {

        if ($max < $number) {
            $max = $number;
        }
    }
    return $max;

};

var_dump(plusGrand([20, 70, 3, 150, 520]));
var_dump(plusGrand([]));