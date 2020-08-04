<?php

/* Exercice 30, Conjugaison
Créez une fonction qui prend une string en argument, l'argument sera un verbe régulier du premier groupe (finissant par "er"). Votre fonction doit conjuguer ce verbe au présent de l'indicatif.
Contrainte:
La chaîne passée en argument ne doit pas dépasser 15 caractères ni contenir d'espaces.
Vérifiez que la chaîne passée en argument se termine bien par "er".
*/


function verbe($string) {
    
    if (preg_match("/^.+(er)$/", $string) && strlen($string) <= 15) {
        
        $conjugaison = [
            "je" => "e",
            "tu" => "es",
            "il" => "e",
            "nous" => "ons",
            "vous" => "ez",
            "ils" => "ent",
        ];

        foreach ($conjugaison as $pronom => $terminaison) {
            echo $pronom . " " . substr($string, 0, -2) . $terminaison . PHP_EOL; 
        }
    }
    else {
        return "Le verbe doit faire au maximum 15 caractère et être un verbe du 1er groupe";
    }
};

echo verbe('fermer') . PHP_EOL;
echo verbe('chanter') . PHP_EOL;


// echo verbe('manger') . PHP_EOL; // Mal conjugé avec le code ci-dessus
// echo verbe('balayer') . PHP_EOL; // Mal conjugé avec le code ci-dessus
// echo verbe('placer') . PHP_EOL; // Mal conjugé avec le code ci-dessus
// echo verbe('appeler') . PHP_EOL; // Mal conjugé avec le code ci-dessus
// echo verbe('acheter') . PHP_EOL; // Mal conjugé avec le code ci-dessus


