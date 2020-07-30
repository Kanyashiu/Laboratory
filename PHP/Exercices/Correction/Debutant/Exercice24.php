<?php

// Exercice 24, Acronyme : Créez une fonction qui prend en argument un string et qui retourne les initiales de chaque mot en majuscule.


function acronyme($string) {
    
    // On veut que chaque caractère de la chaîne de caractère soit au début d'un mot. Le meilleur moyen d'identifier ces caractères est de regarder les caractères qui sont précédés d'un espace
    // On veut matcher tout ce qui est précédé d'un espace, ou le premier caractère de la chaîne de caractère
    // On veut éviter le possible risque d'une ponctuation après un espacement, ou de multiples espacement, on veut juste matcher des lettres, donc on utilise le groupe [a-z]
    $expr = '/(?<=\s|^)[a-z]/i';
    preg_match_all($expr, $string, $matches);

    $result = implode('', $matches[0]);
    $result = strtoupper($result);

    return $result;
};

echo acronyme('Bienvenue au laboratoire !') . PHP_EOL;
echo acronyme('Welcome to the laboratory !') . PHP_EOL;