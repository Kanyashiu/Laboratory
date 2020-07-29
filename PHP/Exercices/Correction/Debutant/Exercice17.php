<?php

// Exercice 17, Créer une fonction from scratch qui s'appelle verificationPassword(). Elle prendra un argument de type string. 
// Elle devra retourner un boolean qui vaut true si le password fait au moins 8 caractères et false si moins.


function verificationPassword($password) {
    
    return strlen($password) >= 8 ? true : false;
};

var_dump(verificationPassword('plusDeHuit'));
var_dump(verificationPassword('moins8'));