<?php

//==================================
// DISCLAIMER
// Les tests ci-dessous on été réalisé avec la version 7.3.11 de PHP
// Si vous voulez tester ce script placer vous dans le dossier contenant ce script avec votre console et taper "php nom-du-script.php"
//==================================


echo "\e[1;33m\033[32m================================" . PHP_EOL;
echo "STATIC != SELF" . PHP_EOL;
echo "================================\033[0m" . PHP_EOL;
echo "\f\f";

// Il y a une différence subtile entre le static et le self
// Self => Il fait appel à la classe dans lequel il à été défini à l'origine
// Static => Il fait appel à la classe qu'il a utilisé ( Plus contextuelle )

// Documentation
// https://www.php.net/manual/en/language.oop5.late-static-bindings.php

class ParentClass
{

    public static function static()
    {
        return static::class . PHP_EOL;
    }

    public static function self()
    {
        return self::class . PHP_EOL;
    }
}



class Child1 extends ParentClass
{


}


$parent = new ParentClass();
$child = new Child1();

echo "==============PARENT================" . PHP_EOL;
echo $parent->static(); // Sortie : ParentClass
echo $parent->self(); // Sortie ParentClass
echo "\f\f";

echo "==============ENFANT================" . PHP_EOL;
echo $child->static(); // Sortie : Child1
echo $child->self(); // Sortie : ParentClass

// Il y a une petite subtilité entre les 2 appel
// Le static affichera le nom de la classe qui l'a appeler
// Le self contrairement au static retournera toujours le nom de la classe dans laquelle il à été iniatiliser