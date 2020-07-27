<?php

//==================================
// DISCLAIMER
// Les tests ci-dessous on été réalisé avec la version 7.3.11 de PHP
// Si vous voulez tester ce script placer vous dans le dossier contenant ce script avec votre console et taper "php nom-du-script.php"
//==================================
 

echo "\e[1;33m\033[32m================================" . PHP_EOL;
echo "INTERFACE" . PHP_EOL;
echo "================================\033[0m" . PHP_EOL;

// A la différence d'une classe abstraite, l'objectif d'une interface n'est pas de donné une architecture à un objet
// mais juste d'en définir des méthodes qui permettront de comprendre comment un objet qui implémente cette interface fonctionne
// Documentation sur les interface :
//https://www.php.net/manual/fr/language.oop5.interfaces.php


// Declaration de l'interface 'interfaceA'
interface interfaceA
{
    // Force les classes qui implémente l'interface à définir ces méthodes
    public function getNumber($id);
    public function getHello();

    // Des constantes peuvent être déclaré dans l'interface mais elle à une certaine spécificité
    // Elle ne peut pas être écrasé par les classes qui utilise cette interface
    const A = 'InterfaceA' . PHP_EOL;

    // Une Interface ne peut pas contenir de définitions de propriéte en son sein
    // Cela génère une fatal error : Interfaces may not include member variables
    // public $vars = "vars";

    // Une Interface ne contient pas d'algorithmie dans ces méthodes
    // Génère une Fatal error: Interface function interfaceA::getHello() cannot contain body
    /*
    public function getHello(); 
    {
        return 'Hello' . PHP_EOL;
    }
    */

}

// Déclaration d'une classe qui implémente notre interface
class bonTemplate implements interfaceA
{

    public function getHello(){
        return "Hello". PHP_EOL;
    }

    // Comme pour les classes abstraites il faut déclarer les méthodes qui sont dans notre interfaceA
    // Sinon une erreur fatal Error
    // Fatal error: Class bonTemplate contains 1 abstract methods and must therefore be declared abstract (interfaceA::getNumber)
    public function getNumber($id){
        return $id . PHP_EOL;
    }

    const A = 'Interface Constantes modifié' . PHP_EOL;
}

$bonTemplate = new bonTemplate();

echo "========= METHODES ==========" . PHP_EOL;
echo $bonTemplate->getNumber(1); // Sortie : 1
echo $bonTemplate->getHello(); // Sortie : Hello
echo "\f\f";

echo "========= CONSTANTES ==========" . PHP_EOL;
echo interfaceA::A; // Sortie : InterfaceA
// Sans modification de la constantes dans la classe utilisant l'interface la sortie serait => InterfaceA
// Avec une tentative d'écrasement => Fatal error : Cannot inherit previously-inherited or override constant A from interface interfaceA
// echo $bonTemplate::A;

// Plus d'exemple sont disponibles dans la doc de php afin de comprendre les spécifités des interface