<?php

// on va définir ici notre propre autoloader ! (chargeur automatique de classes)

function monPremierAutoloader($className) 
{
    echo "Classe non trouvée : " . $className . "<br>";

    require_once __DIR__ . '/../models/' . $className . '.php';
}

function monDeuxiemeAutoloader($className)
{
    // parce que le premier, bah il fonctionne pas !
    echo 'Chargement automatique de la classe '.$className.' ...<br>';

    // on vient remplacer les \ par des /
    $classNameWithSlash = str_replace('\\', '/', $className);

    // On affiche le fichier qui va être inclus pour debugger
    echo 'Emplacement : ' . __DIR__ . '/../' . $classNameWithSlash . '.php<br>';

    // Puis on tente d'inclure le fichier
    require_once __DIR__ . '/../' . $classNameWithSlash . '.php';
}


// spl_autoload_register fonctionne comme addEventListener en JS :
// -> quand l'évènement "classe non trouvée" est déclenché, PHP va appeller
// la function dont on a mis le nom dans spl_autoload_register
//spl_autoload_register('monPremierAutoloader');
spl_autoload_register('monDeuxiemeAutoloader');
