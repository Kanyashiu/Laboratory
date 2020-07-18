<?php

//==================================
// DISCLAIMER
// Les tests ci-dessous on été réalisé avec la version 7.3.11 de PHP
// Si vous voulez tester ce script placer vous dans le dossier contenant ce script avec votre console et taper "php nom-du-script.php"
//==================================



class ParentTest
{   
    public $publiqueParent = 'Propriété public PARENT' . PHP_EOL;
    private $priveParent = 'Propriété privé PARENT' . PHP_EOL;
    protected $protegeParent = 'Propriété protégé PARENT' . PHP_EOL;

    public function affichage()
    {

        // Propriété appartenant au Parent
        echo '==Propriétés PARENT== ' . PHP_EOL;
        echo $this->publiqueParent; // Expected Output : Propriété public PARENT
        echo $this->priveParent; // Expected Output : Propriété privé PARENT
        echo $this->protegeParent; // Expected Output : Propriété protégé PARENT
        
        // ==========================
        // Le parent ne peut pas faire appel au propriétés de l'enfant
        // =========================
        
        // Propriété appartenant à l'Enfant
        echo '==Propriétés ENFANT=='  . PHP_EOL;
        // le parent ne peut pas appeler directement le propriétés car il n'hérite pas des propriétés de l'enfant
        // mais quand l'enfant appel cette méthode la propriété peut-être appeler
        echo $this->publiqueEnfant; // Expected Output : Notice error
        //echo $this->priveEnfant; // Expected Output : Fatal Error ( scope private )
        echo $this->protegeEnfant; // Expected Output : Notice error
        echo PHP_EOL;
    }
}
$ClassParent = new ParentTest();
echo $ClassParent->publiqueParent;// Expected Output : Propriété public PARENT ( Public )
//echo $ClassParent->priveParent;// Expected Output : Fatal Error ( Private )
//echo $ClassParent->protegeParent;// Expected Output : Fatal Error  ( Protected )

echo '================================' . PHP_EOL;
echo 'CLASSE PARENT' . PHP_EOL;
echo '================================' . PHP_EOL;

$ClassParent->affichage(); // Expected Output : affiche tout les types de propriété appeler dans la méthode affichage() sauf les propriété de l'enfant




class EnfantTest extends ParentTest
{   
    public $publiqueEnfant = 'Propriété public ENFANT ' . PHP_EOL;
    private $priveEnfant = 'Propriété privé ENFANT ' . PHP_EOL;
    protected $protegeEnfant = 'Propriété protégé ENFANT ' . PHP_EOL;

    public function affichageEnfant()
    {   
        echo '=========Methode affichageEnfant========== ' . PHP_EOL;
        
        // Propriété appartenant au Parent
        echo '==Propriétés PARENT== ' . PHP_EOL;
        echo $this->publiqueParent; // Expected Output : Propriété public PARENT
        echo $this->priveParent; // Expected Output : Notice Error ( Ne fonctionne pas car seul le parent peut l'appeler ( scope private ) )
        echo $this->protegeParent; // Expected Output : Propriété protégé PARENT

        // Propriété appartenant à l'Enfant
        echo '==Propriétés ENFANT== ' . PHP_EOL;
        echo $this->publiqueEnfant; // Expected Output : "Propriété public ENFANT"
        echo $this->priveEnfant; // Expected Output : "Propriété privé ENFANT"
        echo $this->protegeEnfant; // Expected Output : "Propriété protégé ENFANT"
        echo PHP_EOL;
    }
}

$ClassEnfant = new EnfantTest();
//echo $ClassEnfant->publiqueParent; // OK ( Public )
//echo $ClassEnfant->priveParent; // Fatal Error ( Private )
//echo $ClassEnfant->protegeParent; // Fatal Error ( Protected )

echo '================================' . PHP_EOL;
echo 'CLASSE ENFANT' . PHP_EOL;
echo '================================' . PHP_EOL;

$ClassEnfant->affichage(); // affiche toutes les propriétés contenu dans le parent & l'enfant grâce à la méthode affichage();
$ClassEnfant->affichageEnfant();