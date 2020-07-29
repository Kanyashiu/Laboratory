<?php

// Exercice 16, Créer une fonction from scratch qui s'appelle plusPetit(). 
// Elle prendra un argument de type array. Elle devra retourner le plus petit des élements présent dans l'array. Si l'array est vide, il faudra retourner null;


function plusPetit($array) {
    
    if ($array == null) {
        return null;
    }

    $min = $array[0];
    foreach($array as $number) {
        
        if ($min > $number ) {
            $min = $number;
        }
    }
    return $min;

};

var_dump(plusPetit([20, 70, 3, 150, 520]));
var_dump(plusPetit([]));