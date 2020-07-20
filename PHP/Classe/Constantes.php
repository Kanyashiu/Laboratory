<?php

//==================================
// DISCLAIMER
// Les tests ci-dessous on été réalisé avec la version 7.3.11 de PHP
// Si vous voulez tester ce script placer vous dans le dossier contenant ce script avec votre console et taper "php nom-du-script.php"
//==================================

class ConstanteTest {

    const INSTANCE = 'INSTANCE' . PHP_EOL;

    // Comme pour les propriétés les constantes peuvent avoir un type

    public const PUBLIC = 'PUBLIC' . PHP_EOL;
    private const PRIVATE = 'PRIVATE' . PHP_EOL;
    protected const PROTECTED = 'PROTECDED' . PHP_EOL;
}

echo "\e[1;33m\033[32m================================" . PHP_EOL;
echo "CLASSE INSTANCIÉ" . PHP_EOL;
echo "================================\033[0m\f\f" . PHP_EOL;

// Cette écriture est possible, mais pas besoin d'instancier la classe pour utiliser une constante ( comme pour les propriétés ou méthodes de type static )

$constanteTest = new ConstanteTest(); 
echo $constanteTest::INSTANCE; // Sortie : INSTANCE


echo "\e[1;33m\033[32m================================" . PHP_EOL;
echo "CLASSE NON INSTANCIÉ" . PHP_EOL;
echo "================================\033[0m\f\f" . PHP_EOL;

// Comme pour les appel static cette écriture permet d'appeler une constante stocké dans une classe sans avoir à l'instancier

echo ConstanteTest::INSTANCE; // Sortie : INSTANCE
echo ConstanteTest::PUBLIC; // Sortie : PUBLIC
// echo ConstanteTest::PRIVATE; // Sortie : Fatal Error ( Propriété de type privé )
// echo ConstanteTest::PROTECTED; // Sortie : Fatal Error ( Propriété de type protégée )
