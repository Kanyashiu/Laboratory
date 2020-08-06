<?php

//==================================
// DISCLAIMER
// Les tests ci-dessous on été réalisé avec la version 7.3.11 de PHP
// Si vous voulez tester ce script placer vous dans le dossier contenant ce script avec votre console et taper "php nom-du-script.php"
//==================================

echo "\e[1;33m\033[32m================================" . PHP_EOL;
echo "FINAL" . PHP_EOL;
echo "================================\033[0m" . PHP_EOL;

// Le mot clé final empêche les classe filles de surcharger une méthode contenu dans leur parent
// cette déclaration se fait par le mot clé devant la méthode,
// on peut aussi empêcher qu'une classe soit étendue ( héritage ) en mettant le mot clé devant la classe
// Documentation sur le mot clé final :
// https://www.php.net/manual/fr/language.oop5.final.php


echo "========= METHODES FINALE ==========" . PHP_EOL;
class FinalClass
{

    // Quand une méthode contient le mot clé final
    // elle ne peut pas être écrasé par les enfants
    final public static function salut()
    {
        return 'Salut' . PHP_EOL;
    }

    public static function crusoe()
    {
        return 'Crusoé' . PHP_EOL;
    }
}



class FinalChild extends FinalClass
{
    // Cette methode gènèrera une Fatal error: Cannot override final method FinalClass::salut()
    // elle ne peut donc pas écrasé la méthode de son parent
    // public static function salut()
    // {
    //     return 'Salut toi' . PHP_EOL;
    // }

}

$finalClass = new FinalClass();
$finalChild = new FinalChild();

echo $finalClass::salut(); // Sortie : Salut
echo $finalClass::crusoe(); // Sortie : Crusoé

// echo $finalChild::salut(); // Génère une erreur fatale ou la sortie attendu selon le cas surchargé ou non
echo $finalClass::crusoe(); // Sortie : Crusoé
echo "\f\f";


echo "========= CLASSE FINALE ==========" . PHP_EOL;
final class LastFinalClass {

}

// Cette déclaration de classe créera un erreur fatale
// PHP Fatal error:  Class LastFinalChild may not inherit from final class (LastFinalClass)
// Une classe déclaré comme final, ne peut étendue ( notion d'héritage )

/*
class LastFinalChild extends LastFinalClass {


}
*/