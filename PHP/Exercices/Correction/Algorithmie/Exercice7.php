<?php

/* Exercice 7, Ecrire un algorithme qui demande successivement 20 nombres à l’utilisateur, et qui lui dise ensuite quel était le plus grand parmi ces 20 nombres:
Entrez le nombre numéro 1: 12
Entrez le nombre numéro 2: 14
etc....
Entrez le nombre numéro 20: 6
Le plus grand de ces nombres est: 14
Modifiez ensuite l’algorithme pour que le programme affiche de surcroît en quelle position avait été saisie ce nombre
Exemple : C’était le nombre numéro 2
*/ 

function plusGrand() {
    
    $count = 20;

    for ($i = 0; $i < 20; $i++) {

        $number[] = readline("Entrez un nombre (" . $count . ") : ");
        
        $number[$i] = intval($number[$i]);
        
        $count --;
    }


    $result = 0;
    $position = 0;

    foreach ( $number as $index => $data) {

        if ($data > $result) {
            $result = $data;
            $position = $index + 1;
        }
    }
    

    echo "Le plus grand de ces nombres est: " . $result . ", C’était le nombre numéro " . $position;
};


plusGrand();