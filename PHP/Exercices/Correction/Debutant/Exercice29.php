<?php

// Exercice 29, Suite de Fibonacci
// « Possédant initialement un couple de lapins, combien de couples obtient-on en douze mois si chaque couple engendre tous les mois un nouveau couple à compter du second mois de son existence ? »
// Creez une fonction qui prend un argument de type int, cela correspondra à la durée en mois de la reproduction des lapins, votre fonction doit retourner le nombre de couples.

// Facon itérative
function fibonnaci($month) {
    // Documentation qui ma aidé :
    // https://www.youtube.com/watch?v=SOY6izpc9C0
    // https://fr.wikipedia.org/wiki/Suite_de_Fibonacci

    // f0 = 0;
    // f1 = 1;
    // f2 = f1 + f0
    // f3 = f2 + f1
    // f4 = f3 + f2
    // etc...
    
    if ($month == 0) {
        return $month;
    }
    
    $nb_couple_n = 0;
    $nb_couple = 1;
    $resultat = $nb_couple;

    for ($i = 2; $i <= $month; $i++) {
        $resultat = $nb_couple_n + $nb_couple;
        $nb_couple_n = $nb_couple;
        $nb_couple = $resultat;
    }
    return $resultat;
};

// Facon recursive
// Cette façon marche bien mais n'est pas le plus optimisé
// quand la variable $month commence à atteindre des gros chiffres le temps de traitement est extrémement long
function fibonnaci_recursive($month)
{
    // Documentation qui ma aidé :
    // http://serge.mehl.free.fr/anx/nb_fibo.html

    if ($month <= 1) {
        return $month;
    }
    else {
        return fibonnaci_recursive($month - 1) + fibonnaci_recursive($month - 2);
    }
    
}

echo fibonnaci(12) . PHP_EOL;
echo fibonnaci(24) . PHP_EOL;
echo fibonnaci_recursive(12) . PHP_EOL;