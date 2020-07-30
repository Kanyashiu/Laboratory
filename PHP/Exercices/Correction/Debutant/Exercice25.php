<?php

// Exercice 25, Créez une fonction qui prend en argument un string et qui inverse cette chaîne de caractères;


function reverse($string) {
    
    return strrev($string);
};

echo reverse('Bienvenue au laboratoire !') . PHP_EOL;
echo reverse('Welcome to the laboratory !') . PHP_EOL;