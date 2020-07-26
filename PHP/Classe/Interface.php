<?php

//==================================
// DISCLAIMER
// Les tests ci-dessous on été réalisé avec la version 7.3.11 de PHP
// Si vous voulez tester ce script placer vous dans le dossier contenant ce script avec votre console et taper "php nom-du-script.php"
//==================================
 

echo "\e[1;33m\033[32m================================" . PHP_EOL;
echo "INTERFACE" . PHP_EOL;
echo "================================\033[0m" . PHP_EOL;


// Documentation sur les interface :
//https://www.php.net/manual/fr/language.oop5.interfaces.php


// Declaration de l'interface 'interfaceTest'
interface interfaceTest
{
    // Force les classes qui implémente l'interface à définir ces méthodes
    public function getNumber($id);
    public function getHello();

    // Une Interface ne peut pas contenir de définitions de propriéte en son sein
    // Cela génère une fatal error : Interfaces may not include member variables
    // public $vars = "vars";

    // Une classe abstraite ne contient pas d'algorithmie dans ces méthodes
    // Génère une Fatal error: Interface function interfaceTest::getHello() cannot contain body
    /*
    public function getHello(); 
    {
        return 'Hello' . PHP_EOL;
    }
    */

}

// Déclaration d'une classe qui implémente notre interface
class bonTemplate implements interfaceTest
{

    public function getHello(){
        return "Hello". PHP_EOL;
    }

    // Comme pour les classes abstraites il faut déclarer les méthodes qui sont dans notre interfaceTest
    // Sinon une erreur fatal Error
    // Fatal error: Class bonTemplate contains 1 abstract methods
    // and must therefore be declared abstract (interfaceTest::getAddition)
    public function getNumber($id){
        return $id . PHP_EOL;
    }
}

$bonTemplate = new bonTemplate();
echo $bonTemplate->getNumber(1); // Sortie : 1
echo $bonTemplate->getHello(); // Sortie : Hello


// Plus d'exemple sont disponibles dans la doc de php afin de comprendre les spécifités des interface