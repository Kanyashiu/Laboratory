<?php

//==================================
// DISCLAIMER
// Les tests ci-dessous on été réalisé avec la version 7.3.11 de PHP
// Si vous voulez tester ce script placer vous dans le dossier contenant ce script avec votre console et taper "php nom-du-script.php"
//==================================
 
// La déclaration de type ( TypeHinting ), permet de créer une restriction sur les arguments passé à des méthodes, générant une erreur fatal

// Documentation sur les déclaration de type :
//https://www.php.net/manual/fr/functions.arguments.php#functions.arguments.type-declaration

echo "\e[1;33m\033[32m================================" . PHP_EOL;
echo "TYPE HINTING" . PHP_EOL;
echo "================================\033[0m" . PHP_EOL;
echo "\f\f";

/*
Les différents Déclarations de type possible sont :
nombre entiers => integer
nombre flottant => float
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
        return $int . PHP_EOL;
    }
    
    public function checkFloat (float $float)
    {
        return $float . PHP_EOL;
    }

    public function checkBool (bool $bool)
    {
        return $bool . PHP_EOL;
    }
}

$typeHinting = new TypeHinting();


echo "==============INTEGER ( NOMBRE ENTIER )================" . PHP_EOL;

echo $typeHinting->checkInt(1); // Sortie : 1

// PHP est capable de parser une chaine de caractère ( string ) qui est un chiffre, en integer
echo $typeHinting->checkInt('2'); // Sortie : 2

// echo $typeHinting->checkInt('ZZ22'); // Sortie : Fatal Error Uncaught TypeError: Argument 1 passed to TypeHinting::checkInt() must be of the type int, string given

// Pour tout les tests ci-dessous PHP génère une notice error mais la valeur est quand même affiché
// L'erreur : Notice Error : A non well formed numeric value encountered 

// echo $typeHinting->checkInt('3ZNZZZZZ'); // Sortie : 3
// echo $typeHinting->checkInt('4ZNZZZZZ522222'); Sortie : 4
echo "\f\f";


echo "==============FLOAT ( NOMBRE FLOTTANT )================" . PHP_EOL;

echo $typeHinting->checkFloat(1.5); // Sortie : 1.5

// PHP est capable de parser une chaine de caractère ( string ) qui est un chiffre en float
echo $typeHinting->checkFloat('2.5'); // Sortie : 2.5

// echo $typeHinting->checkFloat('ZZ'); // Sortie : Fatal Error Uncaught TypeError: Argument 1 passed to TypeHinting::checkFloat() must be of the type int, string given

// Pour tout les tests ci-dessous PHP génère une notice error mais la valeur est quand même affiché
// L'erreur : Notice Error : A non well formed numeric value encountered 

// echo $typeHinting->checkFloat('2,5'); // Sortie : 2 ( la virgule ne permet a chiffre d'être un float)
// echo $typeHinting->checkFloat('3.5ZNZZZZZ'); // Sortie : 3.5
// echo $typeHinting->checkFloat('3,5ZNZZZZZ'); // Sortie : 3
// echo $typeHinting->checkFloat('4.5ZNZZZZZ522222'); // Sortie : 4.5
// echo $typeHinting->checkFloat('4,5ZNZZZZZ522222'); // Sortie : 4
echo "\f\f";


echo "==============BOOL ( BOOLEEN )================" . PHP_EOL;
// Documentation sur les booléen : https://www.php.net/manual/fr/language.types.boolean.php

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