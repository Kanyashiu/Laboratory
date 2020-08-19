<?php

// Exercice 8, Réécrire l’algorithme précédent, mais cette fois-ci on ne connaît pas d’avance combien l’utilisateur souhaite saisir de nombres. 
// La saisie des nombres s’arrête lorsque l’utilisateur entre un zéro.

function plusGrand() {
    
    while(true) {
        
        $number = readline("Entrez un nombre : ");
        
        $number = intval($number);

        $numbers[] = $number;

        if ($number === 0) {
            break;
        }
    }

    $result = 0;
    $position = 0;

    foreach ( $numbers as $index => $data) {

        if ($data > $result) {
            $result = $data;
            $position = $index + 1;
        }
    }
    

    echo "Le plus grand de ces nombres est: " . $result . ", C’était le nombre numéro " . $position;
};


plusGrand();