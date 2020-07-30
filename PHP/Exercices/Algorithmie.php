<?php

//==================================
// DISCLAIMER
// Source des exercices 1 à 10 : https://www.fustel-yaounde.net/sites/default/files/Doucments-2017-03/exercices%20corrig%C3%A9s%20algorithme.pdf
// Source des exercices 11 à 14 : https://fabien-torre.fr/Enseignement/Exercices/algo-exos.php
// Ce fichier est un énoncé d'exercices pour php, les corrections sont dans le dossier correspondant
//==================================

// Exercice 1, Ecrire un algorithme qui demande à l’utilisateur un nombre compris entre 1 et 3 jusqu’à ce que la réponse convienne.

// Exercice 2, Ecrire un algorithme qui demande un nombre compris entre 10 et 20, jusqu’à ce que la réponse convienne. 
// En cas de réponse supérieure à 20, on fera apparaître un message: «Plus petit!», et inversement, «Plus grand! » si le nombre est inférieur à 10

// Exercice 3, Ecrire un algorithme qui demandeun nombre de départ, et qui ensuite affiche les dix nombres suivants. 
// Par exemple, si l'utilisateur entre le nombre 17, le programme affichera les nombres de 18 à 27.

// Exercice 4, Ecrire un algorithme qui demandeun nombre de départ, et qui ensuite écrit la table de multiplication de ce nombre ( Sur 10 multiplication ),

// Exercice 5, Ecrire un algorithme qui demandeun nombre de départ, et qui calcule la somme des entiers jusqu’à ce nombre. 
// Par exemple, si l’on entre 5, le programme doit calculer:1 + 2 + 3 + 4 + 5 = 15

// Exercice 6, Ecrire un algorithme qui demandeun nombre de départ, et qui calcule sa factorielle.
// NB: la factorielle de 8, notée 8!, vaut 1 x 2 x 3 x 4 x 5 x 6 x 7 x 8

/* Exercice 7, Ecrire un algorithme qui demande successivement 20 nombres à l’utilisateur, et qui lui dise ensuite quel était le plus grand parmi ces 20 nombres:
Entrez le nombre numéro 1: 12
Entrez le nombre numéro 2: 14
etc....
Entrez le nombre numéro 20: 6
Le plus grand de ces nombres est: 14
Modifiez ensuite l’algorithme pour que le programme affiche de surcroît en quelle position avait été saisie ce nombre
Exemple : C’était le nombre numéro 2
*/ 

// Exercice 8, Réécrire l’algorithme précédent, mais cette fois-ci on ne connaît pas d’avance combien l’utilisateur souhaite saisir de nombres. 
// La saisie des nombres s’arrête lorsque l’utilisateur entre un zéro.

// Exercice 9, Lire la suite des prix (en euros entiers et terminée par zéro) des achats d’un client. 
// Calculer la somme qu’il doit, lire la somme qu’il paye, et simuler la remise de la monnaie en affichant les textes "10 Euros", "5 Euros" et "1 Euro" autant de fois qu’il y a de coupures de chaque sorte à rendre.

/* Exercice 10, Écrire un algorithme qui permette de connaître ses chances de gagner au tiercé, quarté, quinté et autres impôts volontaires.
On demande à l’utilisateur le nombre de chevaux partants, et le nombre de chevaux joués. 
Les deux messages affichés devront être:
Dans l’ordre: une chance sur X de gagner
Dans le désordre: une chance sur Y de gagner
X et Y nous sont donnés par la formule suivante, si n est le nombre de chevaux partants et p le nombre de chevaux joués 
(on rappelle que le signe! signifie "factorielle", comme dans l'exercice 6 ci-dessus):
X = n! / (n -p)! 
Y = n! / (p! * (n –p)!)
NB: cet algorithme peut être écrit d’une manière simple, mais relativement peu performante. .
Ses performances peuvent être singulièrement augmentées par une petite astuce. 
Vous commencerez par écrire la manière la plus simple, puis vous identifierez le problème, et écrirez une deuxième version permettant de le résoudre.
*/

// Exercice 11,
// 1. Proposer un algorithme qui affiche une table de multiplication 10x10.
// 2. Compléter votre algorithme par des instructions affichant des balises HTML : le résultat doit être un code HTML bien formé qui permette de visualiser joliment la table de multiplication.


/* Exercice 12,
1. Écrire un algorithme qui dessine un carré plein 10x10 (rempli du caractère * par exemple). 
2. Fournir de nouveaux algorithmes pour des triangles rectangles, isocèles, etc.
3. Idem, pour les mêmes figures, mais creuses cette fois.
4. Proposer des versions HTML de ces figures.
*/


// Exercice 13,
// Pour chacune des deux figures suivantes, écrire et commenter un algorithme qui la produise. 
/*
                        0000000000
X                        111111111
XX                        22222222
XOX                        3333333
XOOX                        444444
XOOOX                        55555
XOOOOX                        6666
XOOOOOX                        777
XXXXXXXX                        88
                                 9
*/

// Exercice 14, Proposer un algorithme position qui recherche un élément e dans un tableau t et fournit la position (le numéro de la case) à laquelle e est trouvé.
// Si l'élément e n'est pas présent dans le tableau t, l'algorithme doit répondre -1.