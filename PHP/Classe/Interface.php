<?php

//==================================
// DISCLAIMER
// Les tests ci-dessous on été réalisé avec la version 7.3.11 de PHP
// Si vous voulez tester ce script placer vous dans le dossier contenant ce script avec votre console et taper "php nom-du-script.php"
//==================================


echo '<br>==============TEST ClassInterface Classique ================<br>';


//! EXEMPLE CLASSE INTERFACE
//https://www.php.net/manual/fr/language.oop5.interfaces.php
// Les interfaces objet vous permettent de créer du code qui spécifie quelles méthodes une classe doit implémenter, sans avoir à définir comment ces méthodes fonctionneront.

// Declaration de l'interface 'interfaceTest'
interface interfaceTest
{
    //! Une interface ne peut pas contenir de corps ( algorithme défini à l'intérieur )
    //! Génère une Fatal error: Interface function interfaceTest::getHello() cannot contain body
    public function getHello(); 
    /*{
        dadadz;
    }*/
    public function getAddition($num1, $num2);
}

// Déclaration d'une classe qui implémente notre interfaceTest
class bonTemplate implements interfaceTest
{

    public function getHello(){
        return 'hello <br>';
    }

    // Comme pour les classe abstract il faut déclarer les méthode qui sont dans notre interfaceTest
    // Sinon une erreur fatal Error
    // Fatal error: Class bonTemplate contains 1 abstract methods
    // and must therefore be declared abstract (interfaceTest::getAddition)
    // Commenter pour voir l'erreur
    public function getAddition($num1, $num2){
        return $num1 + $num2;
    }
}

$bonTemplate = new bonTemplate();
echo $bonTemplate->getHello();
echo $bonTemplate->getAddition(1 , 2);


// Plus d'exemple sont disponibles dans la doc de php afin de comprendre les spécifités des interface