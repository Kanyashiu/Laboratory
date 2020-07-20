<?php

//==================================
// DISCLAIMER
// Les tests ci-dessous on été réalisé avec la version 7.3.11 de PHP
// Si vous voulez tester ce script placer vous dans le dossier contenant ce script avec votre console et taper "php nom-du-script.php"
//==================================



class ParentTest
{   
    public $publiqueParent = "Propriété public PARENT" . PHP_EOL;
    private $priveParent = "Propriété privé PARENT" . PHP_EOL;
    protected $protegeParent = "Propriété protégé PARENT \f\f" . PHP_EOL;

    public function affichageParent()
    {
        echo "========= Methode affichageParent ==========\f\f" . PHP_EOL;

        // Propriétés appartenant a la classe Parent
        echo "== Propriétés PARENT == \f\f" . PHP_EOL;
        echo $this->publiqueParent; // Sortie : Propriété public PARENT
        echo $this->priveParent; // Sortie : Propriété privé PARENT
        echo $this->protegeParent; // Sortie : Propriété protégé PARENT
        
        // ==========================
        // La classe Parent ne peut pas faire appel au propriétés de la classe Enfant
        // =========================
        
        // Propriétés appartenant à la classe Enfant
        echo "== Propriétés ENFANT == \f\f"  . PHP_EOL;
        // la classe Parent ne peut pas appeler directement les propriétés de la classe Enfant car il n'hérite pas des propriétés de celui ci
        // mais quand la classe Enfant appel cette méthode les propriétés peuvent être appeler
        echo $this->publiqueEnfant; // Sortie : Notice error
        //echo $this->priveEnfant; // Sortie : Fatal Error ( Propriété de type privé )
        echo $this->protegeEnfant; // Sortie : Notice error
        echo PHP_EOL;
    }
}


$ClassParent = new ParentTest();
//echo $ClassParent->publiqueParent;// Sortie : Propriété public PARENT ( Propriété de type publique )
//echo $ClassParent->priveParent;// Sortie : Fatal Error ( Propriété de type privé )
//echo $ClassParent->protegeParent;// Sortie : Fatal Error  ( Propriété de type protégé )

echo "\e[1;33m\033[32m================================" . PHP_EOL;
echo "CLASSE PARENT" . PHP_EOL;
echo "================================\033[0m\f\f" . PHP_EOL;

$ClassParent->affichageParent(); // Sortie : affiche tout les types de propriétés contenu dans la classe Parent mais pas ceux de la classe Enfant


class EnfantTest extends ParentTest
{   
    public $publiqueEnfant = "Propriété public ENFANT" . PHP_EOL;
    private $priveEnfant = "Propriété privé ENFANT" . PHP_EOL;
    protected $protegeEnfant = "Propriété protégé ENFANT \f\f" . PHP_EOL;

    public function affichageEnfant()
    {   
        echo "========= Methode affichageEnfant ========== \f\f" . PHP_EOL;
        
        // Propriétés appartenant a la classe Parent
        echo "== Propriétés PARENT == \f\f" . PHP_EOL;
        echo $this->publiqueParent; // Sortie : Propriété public PARENT
        echo $this->priveParent; // Sortie : Notice Error ( Ne fonctionne pas car seul le parent peut l'appeler ( Propriété de type privé ) )
        echo $this->protegeParent; // Sortie : Propriété protégé PARENT ( Merci l'héritage )

        // Propriété appartenant a la classe Enfant
        echo "== Propriétés ENFANT == \f\f" . PHP_EOL;
        echo $this->publiqueEnfant; // Sortie : "Propriété public ENFANT"
        echo $this->priveEnfant; // Sortie : "Propriété privé ENFANT"
        echo $this->protegeEnfant; // Sortie : "Propriété protégé ENFANT"
        echo PHP_EOL;
    }
}

$ClassEnfant = new EnfantTest();
//echo $ClassEnfant->publiqueParent; // Sortie : "Propriété public PARENT" ( Propriété de type publique )
//echo $ClassEnfant->priveParent; // Sortie : Fatal Error ( Propriété de type privé )
//echo $ClassEnfant->protegeParent; // Sortie : Fatal Error ( Propriété de type protégé )

echo "\e[1;33m\033[32m================================" . PHP_EOL;
echo "CLASSE ENFANT" . PHP_EOL;
echo "================================\033[0m\f\f" . PHP_EOL;

$ClassEnfant->affichageParent(); // Sortie : affiche tout les types de propriétés contenu dans la classe Parent et la classe Enfant
$ClassEnfant->affichageEnfant(); // Sortie : affiche tout les types de propriétés contenu dans la classe Parent ( sauf la propriété privé ) et la classe Enfant
