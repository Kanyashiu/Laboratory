<?php

//==================================
// DISCLAIMER
// Les tests ci-dessous on été réalisé avec la version 7.3.11 de PHP
// Si vous voulez tester ce script placer vous dans le dossier contenant ce script avec votre console et taper "php nom-du-script.php"
//==================================

echo '<br>==============TEST Mot clé Final================<br>';

//! EXEMPLE MOT CLE FINAL
//https://www.php.net/manual/fr/language.oop5.final.php


class FinalClass
{

    // Quand une méthode contient le mot clé final
    // Elle ne peut pas être écrasé par les enfant
    // elle conserve donc sa forme
    final public static function salut()
    {
        return 'salut <br>';
    }

    public static function crusoe()
    {
        return 'crusoe <br>';
    }
}



class FinalChild extends FinalClass
{
    // Cette methode gènèrera une Fatal error: Cannot override final method FinalClass::salut()
    // elle ne peut donc pas écrasé la méthode de son parent
    // public static function salut()
    // {
    //     return 'salut Toi <br>';
    // }

}

$finalClass = new FinalClass();
$finalChild = new FinalChild();

echo $finalClass::salut(); // salut
echo $finalClass::crusoe(); // crusoe

//echo $finalChild::salut(); //Fatal error: Cannot override final method FinalClass::salut()
echo $finalClass::crusoe(); // crusoe