<?php

//==================================
// DISCLAIMER
// Les tests ci-dessous on été réalisé avec la version 7.3.11 de PHP
// Si vous voulez tester ce script placer vous dans le dossier contenant ce script avec votre console et taper "php nom-du-script.php"
//==================================
 
// Une référence sur un objet, permet à deux variable de pointer ( faire référence ) sur le même objet

// Documentation sur les références :
https://www.php.net/manual/fr/language.oop5.references.php

echo "\e[1;33m\033[32m================================" . PHP_EOL;
echo "REFERENCE" . PHP_EOL;
echo "================================\033[0m" . PHP_EOL;
echo "\f\f";

class a {
    public $propriete = 1;
}

$a = new a();
$b = $a;

echo "==============OBJET AVEC LA MÊME REFERENCE================" . PHP_EOL;
// Par référence l'objet $a et $b sont les mêmes
var_dump($a); // Identifiant de l'objet : 1 //  Valeur propriété : 1
var_dump($b); // Identifiant de l'objet : 1 //  Valeur propriété : 1
echo "\f\f";

// Donc quand on change la propriété dans l'objet $b
// l'objet $a à etait affecté aussi
$b->propriete = 15;

echo "============== MODIFICATION PROPRIETE================" . PHP_EOL;
var_dump($a); // Identifiant de l'objet : 1 // Valeur propriété : 15
var_dump($b); // Identifiant de l'objet : 1 // Valeur propriété : 15
echo "\f\f";


// On pourrait cloner afin d'avoir 2 objet distinct
// https://www.php.net/manual/fr/language.oop5.cloning.php
// Désormais avec le clone l'objet $b et $a sont 2 objet différents
$b = (clone $a);
// Maintenant en changeant la propriété de l'objet $b, $a n'est plus affecté
// car il n'ont plus référence commune
$b->propriete = 30;

echo "============== CLONAGE ================" . PHP_EOL;
var_dump($a); // Identifiant de l'objet : 1 // Valeur propriété : 15
var_dump($b); // Identifiant de l'objet : 2 // Valeur propriété : 30