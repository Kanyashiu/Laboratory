<?php

//==================================
// DISCLAIMER
// Les tests ci-dessous on été réalisé avec la version 7.3.11 de PHP
// Si vous voulez tester ce script placer vous dans le dossier contenant ce script avec votre console et taper "php nom-du-script.php"
//==================================

echo "\e[1;33m\033[32m================================" . PHP_EOL;
echo "Singleton" . PHP_EOL;
echo "================================\033[0m" . PHP_EOL;

// Le patron de conception Singleton à pour objectif de permettre à une classe de ne pas pouvoir être instancié plus d'une seule fois,
// une fois la classe instancié elle ne peut plus être instancié une seule version de l'objet existe dans le code mais ce design pattern est sujet à débat !
// Lien :
// Mais https://www.google.com/search?client=firefox-b-d&q=singleton+is+evil
// Mais https://dzone.com/articles/whats-so-evil-about-singletons
// Voir Builder Pattern https://fr.wikipedia.org/wiki/Monteur_(patron_de_conception) ou Factory Pattern https://fr.wikipedia.org/wiki/Fabrique_(patron_de_conception)

class Singleton {

    private $object;
    
    private static $instanceUnique;

    public static $count = 0;

    private function __construct() {

        $this->object = new Exception();

        self::$count++;
    }

    public static function creationInstanceUnique() {
        if ( empty(self::$instanceUnique) ) {
            self::$instanceUnique = new Singleton();
        }

        return self::$instanceUnique->object;
    }
}

// La variable $count me permet de vérifier que la classe à été instancié qu'une seule fois quand je l'appel plusieurs fois !
$singleton = Singleton::creationInstanceUnique();
echo(Singleton::$count) . PHP_EOL; // Sortie Voulu : 1 , Sortie : 1

$singleton = Singleton::creationInstanceUnique();
echo(Singleton::$count) . PHP_EOL; // Sortie Voulu : 1 , Sortie : 1

$singleton = Singleton::creationInstanceUnique();
echo(Singleton::$count) . PHP_EOL; // Sortie Voulu : 1 , Sortie : 1

$singleton = Singleton::creationInstanceUnique();
echo(Singleton::$count) . PHP_EOL; // Sortie Voulu : 1 , Sortie : 1

$singleton = Singleton::creationInstanceUnique();
echo(Singleton::$count) . PHP_EOL; // Sortie Voulu : 1 , Sortie : 1
echo "\f\f";


echo "\e[1;33m\033[32m================================" . PHP_EOL;
echo "Fail Singleton" . PHP_EOL;
echo "================================\033[0m" . PHP_EOL;

class FailSingleton {

    private $object;
    
    private static $instanceUnique;

    public static $count = 0;

    private function __construct() {

        $this->object = new Exception();

        self::$count++;
    }

    public static function creationInstanceUnique() {
        if ( true ) {
            self::$instanceUnique = new FailSingleton();
        }

        return self::$instanceUnique->object;
    }
}

// Dans ce cas la classe n'est pas un Singleton car chaque appel crée un nouvel objet de la classe FailSingleton
$failSingleton = FailSingleton::creationInstanceUnique();
echo(FailSingleton::$count) . PHP_EOL; // Sortie Voulu : 1 , Sortie : 1

$failSingleton = FailSingleton::creationInstanceUnique();
echo(FailSingleton::$count) . PHP_EOL; // Sortie Voulu : 1 , Sortie : 2

$failSingleton = FailSingleton::creationInstanceUnique();
echo(FailSingleton::$count) . PHP_EOL; // Sortie Voulu : 1 , Sortie : 3

$failSingleton = FailSingleton::creationInstanceUnique();
echo(FailSingleton::$count) . PHP_EOL; // Sortie Voulu : 1 , Sortie : 4

$failSingleton = FailSingleton::creationInstanceUnique();
echo(FailSingleton::$count) . PHP_EOL; // Sortie Voulu : 1 , Sortie : 5