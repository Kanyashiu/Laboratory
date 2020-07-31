<?php

//==================================
// DISCLAIMER
// Les tests ci-dessous on été réalisé avec la version 7.3.11 de PHP
// Si vous voulez tester ce script placer vous dans le dossier contenant ce script avec votre console et taper "php nom-du-script.php"
//==================================
 
// La déclaration de type ( TypeHinting ), permet de créer une restriction sur les argument passé à des méthodes,
// générant une erreur fatal

// Documentation sur les trait :
//https://www.php.net/manual/fr/functions.arguments.php#functions.arguments.type-declaration

echo "\e[1;33m\033[32m================================" . PHP_EOL;
echo "TYPE HINTING" . PHP_EOL;
echo "================================\033[0m" . PHP_EOL;

/*
Les différents Déclarations de type possible sonts
entiers => integer
décimaux => float
booléen => bool
valeur null => null
chaine de caractère => string
un tableau ou instance de la classe Traversable => array / instanceof Traversable
un objet => object
Nom de la classe ou interface => Le paramètre doit être une instanceof de la classe ou interface donnée.
self => Le paramètre doit être une instanceof de la même classe qui a défini la méthode. Ceci ne peut être utilisé que sur les méthodes des classes et des instances.
*/


class TypeHinting 
{
    public function checkInt (int $int)
    {
        return $int . '<br>';
    }
    
    public function checkFloat (float $float)
    {
        return $float . '<br>';
    }

    public function checkBool (bool $bool)
    {
        return $bool . ' OK<br>';
    }
}

$typeHinting = new TypeHinting();

// Int
////echo $typeHinting->checkInt(1); // 1
////echo $typeHinting->checkInt('2'); // 2 // php est capable de parser un string qui est un chiffre en int
// génère une erreur notice mais affiche quand le chiffre 3 contenu dans le string
////echo $typeHinting->checkInt('3ZNZZZZZ'); // Notice: A non well formed numeric value encountered 
// afficher seulement le 4
////echo $typeHinting->checkInt('4ZNZZZZZ522222');
//echo $typeHinting->checkInt('ZZ'); // Fatal Error Uncaught TypeError: Argument 1 passed to TypeHinting::checkInt() must be of the type int, string given


// Float
////echo $typeHinting->checkFloat(1.5); // 1.5
//! Pour tout les test ci-dessous php génère une notice error mais la valeur est quand même affiché
////echo $typeHinting->checkFloat('2.5'); // 2.5 // php est capable de parser un string qui est un chiffre en float
// affiche seulement le 2 ( la virgule ne permet a chiffre d'être un float)
////echo $typeHinting->checkFloat('2,5'); // 2 
////echo $typeHinting->checkFloat('3.5ZNZZZZZ'); // Notice: A non well formed numeric value encountered
// affiche seulement le 3 ( la virgule ne permet a chiffre d'être un float)
////echo $typeHinting->checkFloat('3,5ZNZZZZZ');
// afficher seulement le 4.5
////echo $typeHinting->checkFloat('4.5ZNZZZZZ522222');
// affiche seulement le 4 ( la virgule ne permet a chiffre d'être un float)
////echo $typeHinting->checkFloat('4,5ZNZZZZZ522222');
//! Erreur Fatale
//echo $typeHinting->checkFloat('ZZ'); // Fatal Error Uncaught TypeError: Argument 1 passed to TypeHinting::checkFloat() must be of the type int, string given


// Bool // https://www.php.net/manual/fr/language.types.boolean.php
///echo $typeHinting->checkBool(true); // 1 OK
///echo $typeHinting->checkBool(false); // OK // le false n'affiche rien à l'écran
// php est capable de parser en suivant la régle
// true => 1, 'string'
// false => 0, ''
///echo '<br> Cas true <br>';
///echo $typeHinting->checkBool('string'); // 1 OK
///echo $typeHinting->checkBool(1); // 1 OK 
///echo $typeHinting->checkBool(1.1); // 1 OK 
//echo $typeHinting->checkBool(['tableau']); // Erreur Fatale Uncaught TypeError: Argument 1 passed to TypeHinting::checkBool() must be of the type bool, array given 
///echo '<br> Cas true <br>';
///echo $typeHinting->checkBool(''); // 1 OK 
///echo $typeHinting->checkBool(0); // OK
///echo $typeHinting->checkBool(0.0); // OK 
//echo $typeHinting->checkBool(null); // Erreur Fatale Uncaught TypeError: Argument 1 passed to TypeHinting::checkBool() must be of the type bool, null given


// Null