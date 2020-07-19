<?php

//==================================
// DISCLAIMER
// Les tests ci-dessous on été réalisé avec la version 7.3.11 de PHP
// Si vous voulez tester ce script placer vous dans le dossier contenant ce script avec votre console et taper "php nom-du-script.php"
//==================================

class ConstanteTest {

    const LOL = 'LOL' . PHP_EOL;
    const NON = 'NON' . PHP_EOL;
    const TEST = 'TEST' . PHP_EOL;
    const oui = 'OUI' . PHP_EOL;
}
//$constanteTest = new ConstanteTest(); // Pas besoin d'instancier la classe pour utiliser une constante ( comme pour les propriétés ou méthodes de type static )

// Comme pour les appel static cette écriture permet d'appeler une constante stocké dans une classe
echo ConstanteTest::LOL;
echo ConstanteTest::NON;
echo ConstanteTest::TEST;
echo ConstanteTest::oui;