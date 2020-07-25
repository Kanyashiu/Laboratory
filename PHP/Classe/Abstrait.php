<?php

//==================================
// DISCLAIMER
// Les tests ci-dessous on été réalisé avec la version 7.3.11 de PHP
// Si vous voulez tester ce script placer vous dans le dossier contenant ce script avec votre console et taper "php nom-du-script.php"
//==================================


// Documentation sur les classe abstraites :
// https://www.php.net/manual/fr/language.oop5.abstract.php

echo "\e[1;33m\033[32m================================" . PHP_EOL;
echo "CLASSE ABSTRAITE" . PHP_EOL;
echo "================================\033[0m" . PHP_EOL;

abstract class ClassAbstraite
{
    

    // Force les classes filles à définir ces méthodes
    abstract protected function getNumber($id);
    abstract protected function getHello();
    abstract protected function publicMethod();

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
    

}

$enfantAbstrait = new EnfantAbstrait();
echo $enfantAbstrait->getNumber(1); // Sortie : 1
echo $enfantAbstrait->getHello(); // Sortie : Hello
echo $enfantAbstrait->publicMethod(); // Sortie : publicMethod