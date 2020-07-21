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


echo "==============APPEL CLASSIQUE================" . PHP_EOL;

// Appel static sur des propriété et méthode defini de manière classique
//echo StaticTest::$propertyNonstatic; // Sortie : Fatal Error ( Nécessaire que la propriété soit en STATIC Sinon Fatal Error ) ( L'erreur : Uncaught Error: Access to undeclared static property: StaticTest::$propertyNonstatic )
echo StaticTest::methodNonStatic(); // Sortie : methodNonStatic ( La sortie est bien effectué mais une erreur deprecated est déclenché ) ( L'erreur : Non-static method StaticTest::methodNonStatic() should not be called statically )
echo "\f\f";

echo "==============APPEL CLASSIQUE SUR DES PROPRIETE ET METHODE DEFINI EN STATIC================" . PHP_EOL;

$appelStatic = new StaticTest();
//echo $appelStatic->propertyStatic; // Sortie : 2 Notice Error ( L'erreur : Accessing static property StaticTest::$propertyStatic as non static ) & ( L'erreur : Undefined property: StaticTest::$propertyStatic)
echo $appelStatic->methodStatic(); // Sortie : methodStatic
echo "\f\f";

//! RESTE A FAIRE CI DESSOUS
echo "==============APPEL CLASSIQUE SUR DES PROPRIETE ET METHODE CLASSIQUE================" . PHP_EOL;
$appelNonStatic = new StaticTest();
echo $appelNonStatic->propertyNonstatic; // Marche ( classique )
echo $appelNonStatic->methodNonStatic(); // Marche ( classique )




//! CE QUE JE PEUX EN DEDUIRE ?
//Les méthode non défini en static peuvent être appeler en static ( avec une erreur Deprecated ( Magie php ?) )
//Les méthodes défini en static peuvent être appeler en non static ( sans erreur ( Magie php ?) )
//Les propriétés en static sont appelable seulement en static
//Les propriété en non static sont appelable seulement à leur manière (private, protected, public)



echo '<br>==============TEST StaticTestAdvanced ================<br>';
class StaticTestAdvanced {
    public static $random = 15;
    public $random1 = 50;

    public static function methodSelf() {
        return self::$random . '<br>';
    }

    public function methodThis() {
        return $this->random1 . '<br>';
    }
}

echo '<br>==============TEST APPEL STATIC================<br>';

//! APPEL STATIC
echo StaticTestAdvanced::methodSelf(); // Marche
//echo StaticTestAdvanced::methodThis(); // Fatal Error (Uncaught Error: Using $this when not in object context) (Deprecated : Non-static method StaticTestAdvanced::methodThis() should not be called statically )

echo '<br>==============TEST APPEL CLASSIQUE================<br>';

//! APPEL NON STATIC
$appelStaticAdvanced = new StaticTestAdvanced();
echo $appelStaticAdvanced->methodSelf(); // Marche
echo $appelStaticAdvanced->methodThis(); // Marche

//! CE QUE JE PEUX EN DEDUIRE ?
// Le self marche en appel static ou non
// Le this marche que dans le cadre d'un objet instancié