<?php

/* Exercice 20, Créer une fonction from scratch qui s'appelle listHTML(). Elle prendra deux arguments :
Un string représentant le nom de la liste
Un array représentant les élements de cette liste
Elle devra retourner une liste HTML. Chaque element de cette liste viendra du tableau passé en paramètre.
Exemple : Paramètre : Titre : Capitale Liste : ["Paris", "Berlin", "Moscou"] Résultat : <h3>Capitale</h3><ul><li>Paris</li><li>Berlin</li><li>Moscou</li></ul>
Comme vous pouvez le voir il n'y a pas d'espace ni de retour à la ligne entre les élements de la liste. Pas d'espace non plus entre le titre et la liste.
Si le titre est null et vide il faut que la fonction retourne null. Si l'array est vide, il faut que la fonction retourne null.
*/


function listHTML($listName, $elementArray) {
    
    $h3 = "<h3>{$listName}</h3>";

    $beginUl = "<ul>";

    $li = null;
    foreach ($elementArray as $element) {
        $li .= "<li>{$element}</li>";
    }

    $endUl = "</ul>";

    return $h3 . $beginUl . $li . $endUl;

};

echo listHTML('Capitale', ["Paris", "Berlin", "Moscou"]) . PHP_EOL;
echo listHTML('Voiture', ["BMW", "Mercedes", "Audi"]) . PHP_EOL;