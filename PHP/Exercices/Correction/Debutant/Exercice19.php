<?php

/* Exercice 19, Créer une fonction from scratch qui s'appelle capital(). 
Elle prendra un argument de type string. Elle devra retourner le nom de la capitale des pays suivants :
France ==> Paris
Allemagne ==> Berlin
Italie ==> Rome
Maroc ==> Rabat
Espagne ==> Madrid
Portugal ==> Lisbonne
Angleterre ==> Londres
Tout autre pays ==> Inconnu
Il faudra utiliser la structure SWITCH pour faire cette exercice.
*/


function capital($country) {
    
    switch (ucfirst(strtolower($country))) {
        case 'France':
            $country = "Paris";
            break;
        case 'Allemagne':
            $country = "Berlin";
            break;
        case 'Italie':
            $country = "Rome";
            break;
        case 'Maroc':
            $country = "Rabat";
            break;
        case 'Espagne':
            $country = "Madrid";
            break;
        case 'Portugal':
            $country = "Lisbonne";
            break;
        case 'Angleterre':
            $country = "Londres";
            break;
        default:
            $country = "Inconnu";

    }
    return $country;
};

echo capital('FrancE') . PHP_EOL;
echo capital('Allemagne')  . PHP_EOL;
echo capital('ItAliE')  . PHP_EOL;
echo capital('MAROC')  . PHP_EOL;
echo capital('espagne')  . PHP_EOL;
echo capital('PortUGAL')  . PHP_EOL;
echo capital('Argentine')  . PHP_EOL;