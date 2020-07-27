<?php

//==================================
// DISCLAIMER
// Les tests ci-dessous on été réalisé avec la version 7.3.11 de PHP
// Si vous voulez tester ce script placer vous dans le dossier contenant ce script avec votre console et taper "php nom-du-script.php"
//==================================


echo "\e[1;33m\033[32m================================" . PHP_EOL;
echo "STATIC != SELF" . PHP_EOL;
echo "================================\033[0m" . PHP_EOL;


// https://www.php.net/manual/en/language.oop5.late-static-bindings.php
// Self => L'affichage sera fait par rapport au parent ( Plus restrictif )
// Static => L'affichage sera fait de manière dynamique selon la classe qui à appeler la méthode ( Plus contextuelle )


class ParentClass
{

    public static function static()
    {
        return static::class . '<br>';
    }

    public static function self()
    {
        return self::class . '<br>';
    }
}



class Child1 extends ParentClass
{


}


$parent = new ParentClass();
$child = new Child1();

echo $parent->static(); // ExpectedOutput 'ParentClass'
echo $parent->self(); // ExpectedOutput 'ParentClass'

echo $child->static(); // ExpectedOutput 'Child1'
echo $child->self(); // ExpectedOutput 'ParentClass'

// Il y a une petite subtilité entre les 2
// Le static affichera le nom de la classe qui l'appeler
// Le self contrairement au static retournera toujours le nom de la classe dans laquelle il à été initiliser