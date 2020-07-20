<?php

//==================================
// DISCLAIMER
// Les tests ci-dessous on été réalisé avec la version 7.3.11 de PHP
// Si vous voulez tester ce script placer vous dans le dossier contenant ce script avec votre console et taper "php nom-du-script.php"
//==================================

//! EXEMPLE STATIC

echo '<br>==============TEST StaticTest ================<br>';
class StaticTest {
    public static $propertyStatic = self::class . '<br>';

    public static function methodStatic() {
        return 'methodStatic';
    }

    public $propertyNonstatic = self::class . '<br>';

    public function methodNonStatic() {
        return 'methodNonStatic';
    }
}

echo '<br>==============TEST APPEL STATIC================<br>';

//! APPEL STATIC SUR DES PROPRIETE ET METHODE DEFINI EN STATIC
echo StaticTest::$propertyStatic; // Marche 
echo StaticTest::methodStatic(); // Marche

//! APPEL STATIC SUR DES PROPRIETE ET METHODE NON DEFINI EN STATIC
//echo StaticTest::$propertyNonstatic; // Fatal Error ( Nécessaire que la propriété soit en STATIC Sinon Fatal Error ) ( Uncaught Error: Access to undeclared static property: StaticTest::$propertyNonstatic )
echo StaticTest::methodNonStatic(); // Marche ( AVEC Deprecated ) (Erreur Deprecated arrete pas le script ???) (Magie Php ?) //! <= /!\

echo '<br>==============TEST APPEL CLASSIQUE================<br>';

//! APPEL CLASSIQUE SUR DES PROPRIETE ET METHODE DEFINI EN STATIC
$appelStatic = new StaticTest();
//echo $appelStatic->propertyStatic; // Notice (Accessing static property) & Notice (Undefined property: StaticTest::$propertyStatic)
echo $appelStatic->methodStatic(); // Marche (Magie Php ?) //! <= /!\

//! APPEL CLASSIQUE SUR DES PROPRIETE ET METHODE NON DEFINI EN STATIC
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