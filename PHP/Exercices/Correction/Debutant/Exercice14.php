<?php

// Exercice 14, Créer une fonction from scratch qui s'appelle dernierElementTableau(). 
// Elle prendra un argument de type array. Elle devra retourner le dernier élement du tableau. Si l'array est vide, il faudra retourner null;


function dernierElementTableau($array) {
    
    return !empty($array) ? $array[count($array) - 1] : null;

};

var_dump(premierElementTableau([20, 70, 3]));
var_dump(premierElementTableau([]));