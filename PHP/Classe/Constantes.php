<?php

//==================================
// DISCLAIMER
// Les tests ci-dessous on été réalisé avec la version 7.3.11 de PHP
// Si vous voulez tester ce script placer vous dans le dossier contenant ce script avec votre console et taper "php nom-du-script.php"
//==================================

class ConstanteTest {

    const LOL = 'LOL <br>';
    const NON = 'NON <br>';
    const TEST = 'TEST <br>';
    const oui = 'OUI <br>';
}
//$constanteTest = new ConstanteTest(); // Pas besoin d'instancier la classe pour utiliser une constante ( comme pour le static )
echo ConstanteTest::LOL; // Appel comme le static afin d'afficher cette constante