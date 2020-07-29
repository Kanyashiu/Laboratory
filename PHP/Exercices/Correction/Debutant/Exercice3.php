<?php

// Exercice 3, Créer une fonction from scratch qui s'appelle jeRetourneMonArgument(). Exemple : Arg = "abc" ==> Return abc Arg = 123 ==> Return 123



function jeRetourneMonArgument($arg) {
    return $arg;
};

echo jeRetourneMonArgument(123 . PHP_EOL);
echo jeRetourneMonArgument('argument'  . PHP_EOL);