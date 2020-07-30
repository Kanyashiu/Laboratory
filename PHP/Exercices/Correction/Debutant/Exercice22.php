<?php

// Exercice 22, Créer une fonction from scratch qui s'appelle quelleAnnee(). Elle devra retourner un integer representant l'année actuelle.


function quelleAnnee() {
    
    return intval(date('Y'));
};

var_dump(quelleAnnee()) . PHP_EOL;