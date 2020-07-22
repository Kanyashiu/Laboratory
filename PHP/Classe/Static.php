<?php

//==================================
// DISCLAIMER
// Les tests ci-dessous on été réalisé avec la version 7.3.11 de PHP
// Si vous voulez tester ce script placer vous dans le dossier contenant ce script avec votre console et taper "php nom-du-script.php"
//==================================

echo "\e[1;33m\033[32m================================" . PHP_EOL;
echo "CLASSE StaticTest" . PHP_EOL;
echo "================================\033[0m\f\f" . PHP_EOL;

class StaticTest
{
    
    // Propriété et méthode déclaré en static
    public static $propertyStatic = self::class . PHP_EOL;

    public static function methodStatic()
    {
        return "methodStatic" . PHP_EOL;
    }

    // Propriété et méthode déclaré de manière classique
    public $propertyNonstatic = self::class . PHP_EOL;

    public function methodNonStatic()
    {
        return "methodNonStatic" . PHP_EOL;
    }
}

echo "==============APPEL STATIC================" . PHP_EOL;

// Appel static sur des propriété et méthode defini en static
echo StaticTest::$propertyStatic; // Sortie : StaticTest
echo StaticTest::methodStatic(); // Sortie : methodStatic
echo "\f\f";


echo "==============APPEL NON STATIC================" . PHP_EOL;

// Appel static sur des propriété et méthode defini de manière non static
//echo StaticTest::$propertyNonstatic; // Sortie : Fatal Error ( Nécessaire que la propriété soit en STATIC Sinon Fatal Error ) ( L'erreur : Uncaught Error: Access to undeclared static property: StaticTest::$propertyNonstatic )
echo StaticTest::methodNonStatic(); // Sortie : methodNonStatic ( La sortie est bien effectué mais une erreur deprecated est déclenché ) ( L'erreur : Non-static method StaticTest::methodNonStatic() should not be called statically )
echo "\f\f";

echo "==============APPEL NON STATIC SUR DES PROPRIETES ET METHODE DEFINI EN STATIC================" . PHP_EOL;

$appelStatic = new StaticTest();
//echo $appelStatic->propertyStatic; // Sortie : 2 Notice Error ( Accessing static property StaticTest::$propertyStatic as non static ) & ( Undefined property: StaticTest::$propertyStatic)
echo $appelStatic->methodStatic(); // Sortie : methodStatic
echo "\f\f";


echo "==============APPEL NON STATIC SUR DES PROPRIETES ET METHODES NON STATIC================" . PHP_EOL;
$appelNonStatic = new StaticTest();
echo $appelNonStatic->propertyNonstatic; // Sortie : StaticTest
echo $appelNonStatic->methodNonStatic(); // Sortie : methodNonStatic
echo "\f\f";



// CE QUE JE PEUX EN DEDUIRE ?

//Les méthodes non défini en static peuvent être appeler en static ( Mais une erreur Deprecated est enclenchée )
//Les méthodes défini en static peuvent être appeler en non static ( Sans erreur )

//Les propriétés défini en static sont appelable seulement en static
//Les propriétés défini en non static ne sont pas appelable en static



echo "\e[1;33m\033[32m================================" . PHP_EOL;
echo "CLASSE StaticTestAdvanced" . PHP_EOL;
echo "================================\033[0m\f\f" . PHP_EOL;

class StaticTestAdvanced {
    
    public static $number = 15 . PHP_EOL;
    public $number1 = 30 . PHP_EOL;

    public static function methodSelf() {
        return self::$number;
    }

    public function methodThis() {
        return $this->number1;
    }
}

echo "==============APPEL STATIC================" . PHP_EOL;

echo StaticTestAdvanced::methodSelf(); // Sortie : 15
//echo StaticTestAdvanced::methodThis(); // Sortie : 2 erreur ( Fatal Error Uncaught Error: Using $this when not in object context) & ( Deprecated Non-static method StaticTestAdvanced::methodThis() should not be called statically )
echo "\f\f";

echo "==============APPEL NON STATIC================" . PHP_EOL;

$appelStaticAdvanced = new StaticTestAdvanced();
echo $appelStaticAdvanced->methodSelf(); // Sortie : 15
echo $appelStaticAdvanced->methodThis(); // Sortie : 30

// CE QUE JE PEUX EN DEDUIRE ?

// Le self marche en appel static ou non static dans le cadre d'un objet instancié
// Le this marche que dans le cadre d'un objet instancié