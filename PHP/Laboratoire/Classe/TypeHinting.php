<?php

//==================================
// DISCLAIMER
// Les tests ci-dessous on été réalisé avec la version 7.3.11 de PHP
// Si vous voulez tester ce script placer vous dans le dossier contenant ce script avec votre console et taper "php nom-du-script.php"
//==================================
 
// La déclaration de type ( TypeHinting ), permet de créer une restriction sur les arguments passé à des méthodes, générant une erreur fatal

// Documentation sur les déclaration de type :
// https://www.php.net/manual/fr/functions.arguments.php#functions.arguments.type-declaration

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
        return $bool;
    }

    public function checkNull ( ?int $null)
    {
        return $null;
    }

    public function checkString ( string $string)
    {
        return $string . PHP_EOL;
    }

    public function checkArray( array $array)
    {
        return $array[0];
    }

    public function checkObject( object $object)
    {
        return "C'est bien un objet qui a été envoyé !";
    }
}

$typeHinting = new TypeHinting();


echo "==============INTEGER ( NOMBRE ENTIER )================" . PHP_EOL;
// Documentation sur les entiers : https://www.php.net/manual/fr/language.types.integer.php

echo $typeHinting->checkInt(1); // Sortie : 1

// PHP est capable de parser une chaine de caractère ( string ) qui est un chiffre, en integer
echo $typeHinting->checkInt('2'); // Sortie : 2

// echo $typeHinting->checkInt('ZZ22'); // Sortie : Fatal Error Uncaught TypeError: Argument 1 passed to TypeHinting::checkInt() must be of the type int, string given

// Pour tout les tests ci-dessous PHP génère une notice error mais la valeur est quand même affiché
// L'erreur : Notice Error : A non well formed numeric value encountered 

// echo $typeHinting->checkInt('3ZNZZZZZ'); // Sortie : 3
// echo $typeHinting->checkInt('4ZNZZZZZ522222'); Sortie : 4

// Nous pouvons pousser la vérification des entiers plus loin en utilisant d'autre système de numération

// Nombre octal ( Base 8 ) : https://fr.wikipedia.org/wiki/Syst%C3%A8me_octal
echo "Octal => " . $typeHinting->checkInt(0210); // Sortie : 136 ( Base 10 )

// Hexadécimal ( Base 16 ) : https://fr.wikipedia.org/wiki/Syst%C3%A8me_hexad%C3%A9cimal
echo "Hexadécimal => " . $typeHinting->checkInt(0x1A0); // Sortie : 416

// Binaire ( Base 2 ) : https://fr.wikipedia.org/wiki/Syst%C3%A8me_hexad%C3%A9cimal
echo "Binaire => " . $typeHinting->checkInt(0b011101101010); // Sortie : 1898
echo "\f\f";


echo "==============FLOAT ( NOMBRE FLOTTANT )================" . PHP_EOL;
// Documentation sur les nombre flottant : https://www.php.net/manual/fr/language.types.float.php

echo $typeHinting->checkFloat(1.5); // Sortie : 1.5
echo $typeHinting->checkFloat(1.5e5); // Sortie : 150000
echo $typeHinting->checkFloat(700000E-3); // Sortie : 700

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

var_dump($typeHinting->checkBool(true)); PHP_EOL; // Sortie : true
var_dump($typeHinting->checkBool(false)); PHP_EOL; // Sortie : false
echo "\f\f";

echo "================On vérifie des booleens avec des variable de type différent ( True )================" . PHP_EOL;
var_dump($typeHinting->checkBool('string')); PHP_EOL; // Sortie : true
var_dump($typeHinting->checkBool(1)); PHP_EOL; // Sortie : true
var_dump($typeHinting->checkBool(-1)); PHP_EOL; // Sortie : true  
var_dump($typeHinting->checkBool(1.1)); PHP_EOL; // Sortie : true 
var_dump($typeHinting->checkBool(-1.1)); PHP_EOL; // Sortie : true 
// var_dump($typeHinting->checkBool(['tableau'])); PHP_EOL; // Erreur Fatale Uncaught TypeError: Argument 1 passed to TypeHinting::checkBool() must be of the type bool, array given
echo "\f\f";

echo "================On vérifie des booleens avec des variable de type différent ( False )================" . PHP_EOL;
var_dump($typeHinting->checkBool('')); PHP_EOL; // Sortie : false
var_dump($typeHinting->checkBool(0)); PHP_EOL; // Sortie : false
var_dump($typeHinting->checkBool(-0)); PHP_EOL; // Sortie : false  
var_dump($typeHinting->checkBool(0.0)); PHP_EOL; // Sortie : false 
var_dump($typeHinting->checkBool(-0.0)); PHP_EOL; // Sortie : false 
// var_dump($typeHinting->checkBool([])); PHP_EOL; // Erreur Fatale Uncaught TypeError: Argument 1 passed to TypeHinting::checkBool() must be of the type bool, array given
echo "\f\f";

// On peut voir que contrairement à d'autre langage, les variable dans php ne sont pas très typé


echo "==============NULL================" . PHP_EOL;
// Documentation sur null : https://www.php.net/manual/fr/language.types.null.php

// Pour le null il n'y pas grand chose au sujet de TypeHinting, elle représente une variable sans valeur
var_dump($typeHinting->checkNull(null)); PHP_EOL; // Sortie : Null
echo "\f\f";

echo "==============STRING ( chaine de caractère ) ================" . PHP_EOL;
// Documentation sur les chaine de caractère : https://www.php.net/manual/fr/language.types.string.php

echo $typeHinting->checkString('quote');
echo $typeHinting->checkString("double quote");

$heredoc = <<<EOT
Syntaxe 
    Heredoc
EOT;

echo $typeHinting->checkString($heredoc);

$nowdoc = <<<EOD
Syntaxe 
    Nowdoc
EOD;

echo $typeHinting->checkString($nowdoc);
echo "\f\f";

echo "==============ARRAY ( Tableaux )================" . PHP_EOL;
// Documentation sur les tableau : https://www.php.net/manual/fr/language.types.array.php

echo $typeHinting->checkArray(['array']) . PHP_EOL;

echo $typeHinting->checkArray(array('array with function')) . PHP_EOL;
echo "\f\f";


echo "==============OBJECT ( Objet )================" . PHP_EOL;
// Documentation sur les objets : https://www.php.net/manual/fr/language.types.object.php

class testObject 
{
    
}

$obj1 = new testObject();
echo $typeHinting->checkObject($obj1) . PHP_EOL;


$obj2 = (object) ['object'];
echo $typeHinting->checkObject($obj2) . PHP_EOL;

echo "\f\f";

