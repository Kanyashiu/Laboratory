<?php

// Exercice 9, Créer une fonction from scratch qui s'appelle estIlMajeure().
// Elle prendra un argument de type int. Elle devra retourner un boolean.
// Si age >= 18 elle doit retourner true si age < 18 elle doit retourner false Exemple : age = 5 ==> false age = 34 ==> true



function estIlMajeure($age) {
    return $age > 18 ? true : false;
};

var_dump(estIlMajeure(20));
var_dump(estIlMajeure(5));