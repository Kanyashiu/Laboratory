<?php

//==================================
// DISCLAIMER
// Les tests ci-dessous on été réalisé avec la version 7.3.11 de PHP
// Si vous voulez tester ce script placer vous dans le dossier contenant ce script avec votre console et taper "php nom-du-script.php"
//==================================

// Les fonctions Anomyme, plus communement appellé 'closure' permettent de créer des fonctions sans nom,
// elle ont plusieurs utilisation que l'on va voir !

// Documentation sur les fonction anonymes :
// https://www.php.net/manual/fr/functions.anonymous.php#functions.anonymous
// https://www.pierre-giraud.com/php-mysql-apprendre-coder-cours/oriente-objet-closure-classe-anonyme/


echo "\e[1;33m\033[32m================================" . PHP_EOL;
echo "FONCTION ANONYME" . PHP_EOL;
echo "================================\033[0m" . PHP_EOL;


// De la même manière que javascript en entourant la fonction anonymes dans des parenthèses on l'éxécute directement

// Sans Arguments
// Version PHP 7.x
(function(){
    echo 'Fonction anonyme 7.x bien exécutée' . PHP_EOL;
})();
// Version PHP 5.x
(call_user_func(function(){
    echo 'Fonction anonyme 5.x bien exécutée' . PHP_EOL;
}));

// Avec Arguments
// Version PHP 7.x
(function($name){
    echo 'Hello' . $name . PHP_EOL;
})('Karim 7.x');

// Version PHP 5.x
(call_user_func(function($name){
    echo 'Hello' . $name . PHP_EOL;
}, 'Karim 5.x'));


// Dans ce cas la notre fonction anonymes à été déclarée dans une variable
// PHP va convertir cette variable en objet Closure
// Documentation sur la classe Closure : https://www.php.net/manual/fr/class.closure.php
$multiplication = function($x) {
    return $x*2;
};

$tableau = [1, 2, 3, 4, 5, 6, 8, 15];

// array_map permet d'appliquer une fonction de rappel ( 1er argument)
// sur un tableau ( 2ème arguement )
// Documentation : https://www.php.net/manual/fr/function.array-map.php
$multiplication_tableau = array_map($multiplication, $tableau);

print_r($multiplication_tableau); PHP_EOL;


echo "\e[1;33m\033[32m================================" . PHP_EOL;
echo "CREATION D'UNE CLASSE ANONYMES" . PHP_EOL;
echo "================================\033[0m" . PHP_EOL;

// Comme pour les fonction anonymes, les classe anonymes sont des classe sans nom
// un des objectifs des classe anonymes est de créer des objet simple et unique à la volée

// On stocke la classe anonyme dans une variable
$anonyme = new class
    {
        public $name;
        public const HELLO = "Hello ";

        public function setName($name) 
        {
            $this->name = $name;
        }

        public function getName()
        {
            return $this->name;
        }

    };

$anonyme->setName('Karim');
echo $anonyme::HELLO;
echo $anonyme->getName() . PHP_EOL; // Sortie : Hello Karim

// On crée la classe anonyme dans une fonction
function anonyme1() {
    
    return new class {
        public $name;
        public const BONJOUR = "Bonjour ";

        public function setName($name) 
        {
            $this->name = $name;
        }

        public function getName()
        {
            return $this->name;
        }

    };
}
    
$anonyme1 = anonyme1();
$anonyme1->setName('Karim');
echo $anonyme1::BONJOUR;
echo $anonyme1->getName() . PHP_EOL; // Sortie : Bonjour Karim

// On crée la classe anonyme avec son constructeur dans une fonction
function anonyme2($name) {
    
    return new class($name) {
        public $name;
        public const HALLO = "Hallo ";

        public function __construct($name)
        {
            $this->name = $name;
        }

        public function getName()
        {
            return $this->name;
        }

    };
}
    
$anonyme2 = anonyme2('Karim');
echo $anonyme2::HALLO;
echo $anonyme2->getName() . PHP_EOL; // Sortie : Hallo Karim