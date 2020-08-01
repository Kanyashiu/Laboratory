<?php

//==================================
// DISCLAIMER
// Les tests ci-dessous on été réalisé avec la version 7.3.11 de PHP
// Si vous voulez tester ce script placer vous dans le dossier contenant ce script avec votre console et taper "php nom-du-script.php"
//==================================
 
// Les trait sont un mécanisme trés utile ! Car il permet de réutiliser du code générique dans n'importe quelle classe

// Documentation sur les trait :
//https://www.php.net/manual/fr/language.oop5.traits.php

echo "\e[1;33m\033[32m================================" . PHP_EOL;
echo "TRAIT" . PHP_EOL;
echo "================================\033[0m" . PHP_EOL;

// Les traits peuvent contenir des méthode générique qu'on pourrait utiliser dans n'importe quelle classe
Trait Random
{
    public function number($id)
    {
        return $id . PHP_EOL;
    }
    public function woot()
    {
        return 'woot' . PHP_EOL;
    }
}

// Ce trait crée une instance unique d'une classe
Trait SingletonTrait
{
    protected static $instance = null;

    public static $count = 0;

    private function __construct(){

        self::$count++;
    }

    public static function getInstance()
    {
        if(!static::$instance) {
            // Le new static ici va créer une instance de la classe qui appelle ce trait
            static::$instance = new static();
        }
        return static::$instance;
   }
}

// Contrairement au use classique qui fait appel à une classe
// les traits ont des use directement utilisable dans la classe
// Ce qui permet de faire appel au méthode contenu dans ces trait
class BDDAccess
{
    use SingletonTrait;
}

class User
{
    use SingletonTrait;
    use Introspectable;
    use Random;
}


class King extends User
{
    
}

// Les classes BDDAccess, User peuvent grâce au trait utiliser le code présent en leur sein

echo "========= BDDACCESS ==========" . PHP_EOL;
$bdd = BDDAccess::getInstance();
echo(BDDAccess::$count) . PHP_EOL; // Sortie Voulu : 1 , Sortie : 1

$bdd = BDDAccess::getInstance();
echo(BDDAccess::$count) . PHP_EOL; // Sortie Voulu : 1 , Sortie : 1

$bdd = BDDAccess::getInstance();
echo(BDDAccess::$count) . PHP_EOL; // Sortie Voulu : 1 , Sortie : 1
echo "\f\f";


echo "========= USER ==========" . PHP_EOL;
$user = User::getInstance();
echo(User::$count) . PHP_EOL; // Sortie Voulu : 1 , Sortie : 1

$user = User::getInstance();
echo(User::$count) . PHP_EOL; // Sortie Voulu : 1 , Sortie : 1

$user = User::getInstance();
echo(User::$count) . PHP_EOL; // Sortie Voulu : 1 , Sortie : 1
echo "\f\f";


// La Classe King est complètement vide mais avec l'heritage,
// elle hérite de son parent, donc par extension elle à accés au Trait !

echo "========= KING ==========" . PHP_EOL;
$king = King::getInstance();
echo(King::$count) . PHP_EOL; // Sortie Voulu : 1 , Sortie : 1
echo($king->number(5)); //  Sortie : 5
echo($king->woot()); //  Sortie : woot