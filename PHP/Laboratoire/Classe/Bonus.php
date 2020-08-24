<?php

//==================================
// DISCLAIMER
// Les tests ci-dessous on été réalisé avec la version 7.3.11 de PHP
// Si vous voulez tester ce script placer vous dans le dossier contenant ce script avec votre console et taper "php nom-du-script.php"
//==================================


// Bonus trait plus poussé made by Julien
// https://github.com/JulienDelsescaux
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


class Queen {
    use Introspectable;
}

class King extends Queen {
}

$king = new King();

var_dump($king->getDefinitionFile()); // Sortie : Chemin absolu vers ce fichier
echo PHP_EOL;
var_dump($king->getTraits()); // Sortie : Un tableau contenant tout les trait utilisé
echo PHP_EOL;
var_dump($king->getParentClasses()); // Sortie : Un tableau contenant tout les parent ( héritage )