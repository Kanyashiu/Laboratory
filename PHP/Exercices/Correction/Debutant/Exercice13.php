<?php

// Exercice 13, Créer une fonction from scratch qui s'appelle premierElementTableau(). 
// Elle prendra un argument de type array. Elle devra retourner le premier élement du tableau. Si l'array est vide, il faudra retourner null


function premierElementTableau($array) {
    
    return !empty($array) ? $array[0] : null;
};

var_dump(premierElementTableau([20, 70, 3]));
var_dump(premierElementTableau([]));