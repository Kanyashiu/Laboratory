<?php

/* Exercice 18, Créer une fonction from scratch qui s'appelle verificationPassword(). 
Elle prendra un argument de type string. 
Elle devra retourner un boolean qui vaut true si le password respecte les règles suivantes :
Faire au moins 8 caractères
Avoir au moins 1 chiffre
Avoir au moins une majuscule et une minuscule
*/


function verificationPassword($password) {
    
    return preg_match('/^(?=.*[^a-zA-Z0-9 ])(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/', $password) ? true : false;
};

var_dump(verificationPassword('salutJolan_0/'));
var_dump(verificationPassword('mauvaisMDP'));