<?php

//==================================
// DISCLAIMER
// Les tests ci-dessous on été réalisé avec la version 7.3.11 de PHP
// Si vous voulez tester ce script placer vous dans le dossier contenant ce script avec votre console et taper "php nom-du-script.php"
//==================================

// Une classe abstraite est une classe qui permet définir l'architecture des classes qui en hériteront
// Elle permet d'avoir une structure pour les classes enfants qui peuvent avoir des comportements commun 
// Exemple => Une classe abstraite Véhicule qui détermine des comportements commun à tout les types de véhicule ( Rouler, Faire le plein, etc...)
// Et des classe enfants, Camion, Voiture, Moto, qui auront une architecture commune à la classe parent, avec en plus leur spécificité

// Documentation sur les classe abstraites :
// https://www.php.net/manual/fr/language.oop5.abstract.php

echo "\e[1;33m\033[32m================================" . PHP_EOL;
echo "CLASSE ABSTRAITE" . PHP_EOL;
echo "================================\033[0m" . PHP_EOL;

abstract class ClassAbstraite
{
    

    // Force les classes filles à définir ces méthodes avec le mot clés abstract devant la déclaration
    abstract public function getNumber($id);
    abstract public function getHello();
    abstract public function publicMethod();
    abstract public function argumentMethod($_1, $_2, $_3);

    // Méthode commune
    // Rien ne nous empêche de définir une méthode dans la classe abstraite qui pourra être utilisé par les enfants
    public function printOut() {
        print $this->getHello();
    }

    // Une classe abstraite ne peut pas contenir de définitions de propriéte en son sein
    // Cela génère une fatal error : Properties cannot be declared abstract
    //abstract protected $public;
    
    // Une classe abstraite ne contient pas d'algorithmie dans ces méthodes
    // Cela génère une fatal error : Abstract function ClassAbstraite::getNumber() cannot contain body
    // abstract protected function getNumber($id) {
    //     echo $id;
    // }
    // abstract protected function getHello(){
    //     echo 'hello';
    // }


}

class EnfantAbstrait extends ClassAbstraite

{
    // Ces méthodes doivent obligatoirement existé dans l'enfant d'une classe abstraite
    // Sinon cela génère une fatal error : Class EnfantAbstrait contains 1 abstract method and must therefore be declared abstract or implement the remaining methods
    
    public function getNumber($id) {
        return $id . PHP_EOL;
    }
    public function getHello() {
        return 'Hello' . PHP_EOL;
    }

    // Les méthodes déclaré dans l'enfant doivent avoir la même visibilité que celle déclaré dans le parent voir moins restrictif
    // Sinon cela génère une fatal error : Access level to EnfantAbstrait::publicMethod() must be public (as in class ClassAbstraite)
    // Méthode déclaré public dans la classe abstraite => protected : X ; private : X
    // Méthode déclaré protected dans la classe abstraite => public : V ; private : X
    // Méthode déclaré private dans la classe abstraite => Aucune méthode avec une visibilité privé ne peut être déclaré dans une classe abstraite
    
    
    public function publicMethod() {
        return 'publicMethod' . PHP_EOL;
    }

    // Le nombre d'argument requis doivent être les mêmes que celle déclaré dans la classe abstraite
    // Sinon cela génère une fatal error : Declaration of EnfantAbstrait::argumentMethod($_1, $_2) must be compatible with ClassAbstraite::argumentMethod($_1, $_2, $_3)
    
    // Que ce soit moins d'arguments
    //public function argumentMethod($_1, $_2) {}
    
    // Que ce soit plus d'arguments
    //public function argumentMethod($_1, $_2, $_3, $_4) {}

    // Par contre si le 4ème argument ou plus est optionnelle cela ne crée aucune erreur
    //public function argumentMethod($_1, $_2, $_3, $_4 = 'optionnelle') {}
    
    
    public function argumentMethod($_1, $_2, $_3) {
        return $_1 + $_2 + $_3 . PHP_EOL;
    }
}

$enfantAbstrait = new EnfantAbstrait();
echo $enfantAbstrait->getNumber(1); // Sortie : 1
echo $enfantAbstrait->getHello(); // Sortie : Hello
$enfantAbstrait->printOut(); // Sortie : Hello
echo $enfantAbstrait->publicMethod(); // Sortie : publicMethod
echo $enfantAbstrait->argumentMethod(1, 2, 3); // Sortie : 6