<?php

//==================================
// DISCLAIMER
// Les tests ci-dessous on été réalisé avec la version 7.3.11 de PHP
//==================================




//! EXEMPLE STATIC

echo '<br>==============TEST StaticTest ================<br>';
class StaticTest {
    public static $propertyStatic = self::class . '<br>';

    public static function methodStatic() {
        return 'methodStatic';
    }

    public $propertyNonstatic = self::class . '<br>';

    public function methodNonStatic() {
        return 'methodNonStatic';
    }
}

echo '<br>==============TEST APPEL STATIC================<br>';

//! APPEL STATIC SUR DES PROPRIETE ET METHODE DEFINI EN STATIC
echo StaticTest::$propertyStatic; // Marche 
echo StaticTest::methodStatic(); // Marche

//! APPEL STATIC SUR DES PROPRIETE ET METHODE NON DEFINI EN STATIC
//echo StaticTest::$propertyNonstatic; // Fatal Error ( Nécessaire que la propriété soit en STATIC Sinon Fatal Error ) ( Uncaught Error: Access to undeclared static property: StaticTest::$propertyNonstatic )
echo StaticTest::methodNonStatic(); // Marche ( AVEC Deprecated ) (Erreur Deprecated arrete pas le script ???) (Magie Php ?) //! <= /!\

echo '<br>==============TEST APPEL CLASSIQUE================<br>';

//! APPEL CLASSIQUE SUR DES PROPRIETE ET METHODE DEFINI EN STATIC
$appelStatic = new StaticTest();
//echo $appelStatic->propertyStatic; // Notice (Accessing static property) & Notice (Undefined property: StaticTest::$propertyStatic)
echo $appelStatic->methodStatic(); // Marche (Magie Php ?) //! <= /!\

//! APPEL CLASSIQUE SUR DES PROPRIETE ET METHODE NON DEFINI EN STATIC
$appelNonStatic = new StaticTest();
echo $appelNonStatic->propertyNonstatic; // Marche ( classique )
echo $appelNonStatic->methodNonStatic(); // Marche ( classique )



//! CE QUE JE PEUX EN DEDUIRE ?
//Les méthode non défini en static peuvent être appeler en static ( avec une erreur Deprecated ( Magie php ?) )
//Les méthodes défini en static peuvent être appeler en non static ( sans erreur ( Magie php ?) )
//Les propriétés en static sont appelable seulement en static
//Les propriété en non static sont appelable seulement à leur manière (private, protected, public)



echo '<br>==============TEST StaticTestAdvanced ================<br>';
class StaticTestAdvanced {
    public static $random = 15;
    public $random1 = 50;

    public static function methodSelf() {
        return self::$random . '<br>';
    }

    public function methodThis() {
        return $this->random1 . '<br>';
    }
}

echo '<br>==============TEST APPEL STATIC================<br>';

//! APPEL STATIC
echo StaticTestAdvanced::methodSelf(); // Marche
//echo StaticTestAdvanced::methodThis(); // Fatal Error (Uncaught Error: Using $this when not in object context) (Deprecated : Non-static method StaticTestAdvanced::methodThis() should not be called statically )

echo '<br>==============TEST APPEL CLASSIQUE================<br>';

//! APPEL NON STATIC
$appelStaticAdvanced = new StaticTestAdvanced();
echo $appelStaticAdvanced->methodSelf(); // Marche
echo $appelStaticAdvanced->methodThis(); // Marche

//! CE QUE JE PEUX EN DEDUIRE ?
// Le self marche en appel static ou non
// Le this marche que dans le cadre d'un objet instancié


//! EXEMPLE SINGLETON
// Mais https://www.google.com/search?client=firefox-b-d&q=singleton+is+evil
// Mais... https://dzone.com/articles/whats-so-evil-about-singletons
// Voir Builder Pattern https://fr.wikipedia.org/wiki/Monteur_(patron_de_conception) ou Factory Pattern https://fr.wikipedia.org/wiki/Fabrique_(patron_de_conception)

class Singleton {

    private $object;
    
    private static $instanceUnique;

    public static $count = 0;

    private function __construct() {

        $this->object = new Exception();

        self::$count++;
    }

    public static function creationInstanceUnique() {
        if ( empty(self::$instanceUnique) ) {
            self::$instanceUnique = new Singleton();
        }

        return self::$instanceUnique->object;
    }
}

$singleton = Singleton::creationInstanceUnique();
var_dump(Singleton::$count); // Expected Output : 1 // Output 1

$singleton = Singleton::creationInstanceUnique();
var_dump(Singleton::$count); // Expected Output : 1 // Output 1

echo '<br>==============TEST ClassAbstraite ================<br>';

//! EXEMPLE CLASSE ABSTRAIT
// https://www.php.net/manual/fr/language.oop5.abstract.php

abstract class ClassAbstraite
{

    // Force les classe filles à définir ces méthode
    abstract protected function getNumber($id);
    abstract protected function getHello();

    //! Une classe abstraite ne peut pas contenir de corps ( algorithme défini à l'intérieur )
    //! Génère une fatal error : Abstract function ClassAbstraite::getNumber() cannot contain body
    // abstract protected function getNumber($id) {
    //     echo $id;
    // }
    // abstract protected function getHello(){
    //     echo 'hello';
    // }


}

class EnfantAbstrait extends ClassAbstraite

{
    // ces méthode doivent obligatoirement existé dans l'enfant d'un classe abstraite
    public function getNumber($id) {
        return $id  . '<br>';
    }
    public function getHello() {
        return 'hello <br>';
    }


}

$enfantAbstrait = new EnfantAbstrait();
echo $enfantAbstrait->getNumber(1); // expected output 1
echo $enfantAbstrait->getHello(); // expected output 'hello'

echo '<br>==============TEST ClassInterface Classique ================<br>';


//! EXEMPLE CLASSE INTERFACE
//https://www.php.net/manual/fr/language.oop5.interfaces.php
// Les interfaces objet vous permettent de créer du code qui spécifie quelles méthodes une classe doit implémenter, sans avoir à définir comment ces méthodes fonctionneront.

// Declaration de l'interface 'interfaceTest'
interface interfaceTest
{
    //! Une interface ne peut pas contenir de corps ( algorithme défini à l'intérieur )
    //! Génère une Fatal error: Interface function interfaceTest::getHello() cannot contain body
    public function getHello(); 
    /*{
        dadadz;
    }*/
    public function getAddition($num1, $num2);
}

// Déclaration d'une classe qui implémente notre interfaceTest
class bonTemplate implements interfaceTest
{

    public function getHello(){
        return 'hello <br>';
    }

    // Comme pour les classe abstract il faut déclarer les méthode qui sont dans notre interfaceTest
    // Sinon une erreur fatal Error
    // Fatal error: Class bonTemplate contains 1 abstract methods
    // and must therefore be declared abstract (interfaceTest::getAddition)
    // Commenter pour voir l'erreur
    public function getAddition($num1, $num2){
        return $num1 + $num2;
    }
}

$bonTemplate = new bonTemplate();
echo $bonTemplate->getHello();
echo $bonTemplate->getAddition(1 , 2);


// Plus d'exemple sont disponibles dans la doc de php afin de comprendre les spécifités des interface



echo '<br>==============TEST Trait ================<br>';

//! EXEMPLE CLASSE TRAIT
//https://www.php.net/manual/fr/language.oop5.traits.php

// Les traits d'avoir des méthode générique qu'on pourrait utiliser dans n'importe quelle classe
Trait Woot
{
    public function woot()
    {
        return 'woot';
    }
    public function wootWoot()
    {
        return 'fête du slip';
    }
}

// Singleton afin de créer une instance unique d'une classe
Trait SingletonTrait
{
    protected static $instance = null;

    private function __construct(){

    }

    public static function getInstance()
    {
        if(!static::$instance) {
            static::$instance = new static();
        }
        return static::$instance;
   }
}

// Contrairement au use classique qui fait appel à une classe
// les trait ont des use directement utilisable dans la classe
class BDDAccess
{
    use SingletonTrait;
}

class Toto
{
    use SingletonTrait;
    use Introspectable;
}


class King extends Toto
{
    
}

// Les Classe BDDAccess, Toto
// Mais grâce au trait elle peuvent utiliser le code présent dans les différent Trait
$testSingletonTrait = BDDAccess::getInstance();
var_dump($testSingletonTrait);


// La Classe King est complètement vide mais avec l'heritage
// elle hérite de son parent, donc par extension elle à accés au Trait
$test2 = King::getInstance();
var_dump($test2);
echo PHP_EOL;
var_dump($test2->getDefinitionFile());
echo PHP_EOL;
var_dump($test2->getTraits());
echo PHP_EOL;
var_dump($test2->getParentClasses());


echo '<br>==============TEST Static , Self================<br>';

//! EXEMPLE STATIC SELF
// https://www.php.net/manual/en/language.oop5.late-static-bindings.php
// Self => L'affichage sera fait par rapport au parent ( Plus restrictif )
// Static => L'affichage sera fait de manière dynamique selon la classe qui à appeler la méthode ( Plus contextuelle )


class ParentClass
{

    public static function static()
    {
        return static::class . '<br>';
    }

    public static function self()
    {
        return self::class . '<br>';
    }
}



class Child1 extends ParentClass
{


}


$parent = new ParentClass();
$child = new Child1();

echo $parent->static(); // ExpectedOutput 'ParentClass'
echo $parent->self(); // ExpectedOutput 'ParentClass'

echo $child->static(); // ExpectedOutput 'Child1'
echo $child->self(); // ExpectedOutput 'ParentClass'

// Il y a une petite subtilité entre les 2
// Le static affichera le nom de la classe qui l'appeler
// Le self contrairement au static retournera toujours le nom de la classe dans laquelle il à été initiliser


echo '<br>==============TEST Mot clé Final================<br>';

//! EXEMPLE MOT CLE FINAL
//https://www.php.net/manual/fr/language.oop5.final.php


class FinalClass
{

    // Quand une méthode contient le mot clé final
    // Elle ne peut pas être écrasé par les enfant
    // elle conserve donc sa forme
    final public static function salut()
    {
        return 'salut <br>';
    }

    public static function crusoe()
    {
        return 'crusoe <br>';
    }
}



class FinalChild extends FinalClass
{
    // Cette methode gènèrera une Fatal error: Cannot override final method FinalClass::salut()
    // elle ne peut donc pas écrasé la méthode de son parent
    // public static function salut()
    // {
    //     return 'salut Toi <br>';
    // }

}

$finalClass = new FinalClass();
$finalChild = new FinalChild();

echo $finalClass::salut(); // salut
echo $finalClass::crusoe(); // crusoe

//echo $finalChild::salut(); //Fatal error: Cannot override final method FinalClass::salut()
echo $finalClass::crusoe(); // crusoe


echo '<br>==============TEST Objet par référence================<br>';

//! Exemple Objet Par références !
https://www.php.net/manual/fr/language.oop5.references.php

class a {
    public $propriete = 1;
}

$a = new a();
$b = $a;

var_dump($a, $a->propriete); // identifiant 17 // 1
var_dump($b, $b->propriete); // identifiant 17 // 1

// Par référence l'objet $a et $b sont les même
// Donc quand on change la propriété dans l'objet $b
// $a l'objet à est affecté
$b->propriete = 15;

var_dump($a, $a->propriete); // identifiant 17 // 15
var_dump($b, $b->propriete); // identifiant 17 // 15


// On pourrait cloner afin d'avoir 2 objet distinct
// https://www.php.net/manual/fr/language.oop5.cloning.php
// Désormais avec le clone l'objet $b et $a sont 2 objet différents
$b = (clone $a);

var_dump($a); // identifiant 17
var_dump($b); // identifiant 18





//! Bonus trait plus poussé made by Julien
// Ce trait permet de récuperer plein d'info utile sur une classe
Trait Introspectable
{


    private $introspectionReflector=null;
    private $parentClasses = null;

    /**
     * @var File
     */
    private $definitionFile;


    protected function initializeReflector() {
        if(!$this->introspectionReflector) {
            $this->introspectionReflector=new \ReflectionClass($this);
        }
        return $this;
    }


    public function getNamespaceName()
    {
        return $this->introspectionReflector->getNamespaceName();
    }


    public function getClassBaseName($className = null) {
        if($className === null) {
            $className = get_class($this);
        }
        return basename(str_replace('\\', '/', $className));
    }

    public function getDefinitionFile() {
        if(!$this->definitionFile) {
            $this->initializeReflector();
            $this->definitionFile = $this->introspectionReflector->getFileName();
        }

        return $this->definitionFile;

    }

    public function getDefinitionFolder() {
        return $this->getDefinitionFile()->getDirectory();
    }

    public function getParentClasses()
    {
        if(!$this->parentClasses) {
            $this->parentClasses = [];
            $instance = $this;

            while($parent = get_parent_class($instance)) {
                $this->parentClasses[] = $parent;
                $instance = $parent;
            }
        }
        return $this->parentClasses;
    }


    public function hasTrait($traitName)
    {
        $traits = $this->getTraits($this);
        foreach ($traits as $trait) {
            if($traitName == $trait) {
                return true;
            }
        }
        return false;
    }

    public function getTraits()
    {
        $traits = class_uses($this);

        $parentClasses = $this->getParentClasses();

        foreach ($parentClasses as $parentClass) {
            $traits = array_merge(
                $traits,
                class_uses($parentClass)
            );
        }

        $traits = array_unique($traits);

        return  $traits;
    }
}

echo '<br>==============TEST TypeHinting================<br>';

//! Exemple TypeHinting
// https://www.php.net/manual/fr/functions.arguments.php#functions.arguments.type-declaration
/*
Les différent TypeHinting possible sont
entiers => integer
décimaux => float
booléen => bool
valeur null => null
chaine de caractère => string
un tableau ou instance de la classe Traversable => array / instanceof Traversable
un objet => object
Nom de la classe ou interface => Le paramètre doit être une instanceof de la classe ou interface donnée.
self => Le paramètre doit être une instanceof de la même classe qui a défini la méthode. Ceci ne peut être utilisé que sur les méthodes des classes et des instances.
*/


class TypeHinting 
{
    public function checkInt (int $int)
    {
        return $int . '<br>';
    }
    
    public function checkFloat (float $float)
    {
        return $float . '<br>';
    }

    public function checkBool (bool $bool)
    {
        return $bool . ' OK<br>';
    }
}

$typeHinting = new TypeHinting();

// Int
////echo $typeHinting->checkInt(1); // 1
////echo $typeHinting->checkInt('2'); // 2 // php est capable de parser un string qui est un chiffre en int
// génère une erreur notice mais affiche quand le chiffre 3 contenu dans le string
////echo $typeHinting->checkInt('3ZNZZZZZ'); // Notice: A non well formed numeric value encountered 
// afficher seulement le 4
////echo $typeHinting->checkInt('4ZNZZZZZ522222');
//echo $typeHinting->checkInt('ZZ'); // Fatal Error Uncaught TypeError: Argument 1 passed to TypeHinting::checkInt() must be of the type int, string given


// Float
////echo $typeHinting->checkFloat(1.5); // 1.5
//! Pour tout les test ci-dessous php génère une notice error mais la valeur est quand même affiché
////echo $typeHinting->checkFloat('2.5'); // 2.5 // php est capable de parser un string qui est un chiffre en float
// affiche seulement le 2 ( la virgule ne permet a chiffre d'être un float)
////echo $typeHinting->checkFloat('2,5'); // 2 
////echo $typeHinting->checkFloat('3.5ZNZZZZZ'); // Notice: A non well formed numeric value encountered
// affiche seulement le 3 ( la virgule ne permet a chiffre d'être un float)
////echo $typeHinting->checkFloat('3,5ZNZZZZZ');
// afficher seulement le 4.5
////echo $typeHinting->checkFloat('4.5ZNZZZZZ522222');
// affiche seulement le 4 ( la virgule ne permet a chiffre d'être un float)
////echo $typeHinting->checkFloat('4,5ZNZZZZZ522222');
//! Erreur Fatale
//echo $typeHinting->checkFloat('ZZ'); // Fatal Error Uncaught TypeError: Argument 1 passed to TypeHinting::checkFloat() must be of the type int, string given


// Bool // https://www.php.net/manual/fr/language.types.boolean.php
///echo $typeHinting->checkBool(true); // 1 OK
///echo $typeHinting->checkBool(false); // OK // le false n'affiche rien à l'écran
// php est capable de parser en suivant la régle
// true => 1, 'string'
// false => 0, ''
///echo '<br> Cas true <br>';
///echo $typeHinting->checkBool('string'); // 1 OK
///echo $typeHinting->checkBool(1); // 1 OK 
///echo $typeHinting->checkBool(1.1); // 1 OK 
//echo $typeHinting->checkBool(['tableau']); // Erreur Fatale Uncaught TypeError: Argument 1 passed to TypeHinting::checkBool() must be of the type bool, array given 
///echo '<br> Cas true <br>';
///echo $typeHinting->checkBool(''); // 1 OK 
///echo $typeHinting->checkBool(0); // OK
///echo $typeHinting->checkBool(0.0); // OK 
//echo $typeHinting->checkBool(null); // Erreur Fatale Uncaught TypeError: Argument 1 passed to TypeHinting::checkBool() must be of the type bool, null given


// Null
//! Faire le reste...
//! Note Séparer les différents exempl
//! Faire une avec des liens pour voir les différents