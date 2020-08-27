<?php

//==================================
// DISCLAIMER
// Les tests ci-dessous on été réalisé avec la version 7.3.11 de PHP
// Si vous voulez tester ce script placer vous dans le dossier contenant ce script avec votre console et taper "php nom-du-script.php"
//==================================

// Les fonctions Anomyme, plus communement appellé 'closure' permettent de créer des fonctions sans nom,
// elle ont plusieurs utilisation que l'on va voir !

// Documentation sur les fonction anonymes :
// https://www.php.net/manual/fr/functions.anonymous.php#functions.anonymous


echo "\e[1;33m\033[32m================================" . PHP_EOL;
echo "FONCTION ANONYME" . PHP_EOL;
echo "================================\033[0m" . PHP_EOL;


echo "========= Fonction anonymes ==========" . PHP_EOL;


// De la même manière que javascript en entourant la fonction anonymes dans des parenthèses on l'éxécute directement
(function(){
    echo 'Fonction anonyme bien exécutée' . PHP_EOL;
})();


// TODO