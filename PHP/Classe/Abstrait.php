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

    // Force les classes filles à définir ces méthode
    abstract protected function getNumber($id);
    abstract protected function getHello();

    //! Une classe abstraite ne peut pas contenir de corps ( algorithme défini à l'intérieur )
    //! Génère une fatal error : Abstract function ClassAbstraite::getNumber() cannot contain body
    // abstract protected function getNumber($id) {
    //     echo $id;
    // }
    // abstract protected function getHello(){
    //     echo 'hello';
    // }


}

class EnfantAbstrait extends ClassAbstraite

{
    // ces méthode doivent obligatoirement existé dans l'enfant d'un classe abstraite
    public function getNumber($id) {
        return $id  . '<br>';
    }
    public function getHello() {
        return 'hello <br>';
    }


}

$enfantAbstrait = new EnfantAbstrait();
echo $enfantAbstrait->getNumber(1); // expected output 1
echo $enfantAbstrait->getHello(); // expected output 'hello'