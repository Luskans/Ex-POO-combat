<?php

// // Autoload logic
// function chargerClasse($classname)
// {
//     require __DIR__ . '/../classes/' . $classname . '.php';
// }

// spl_autoload_register('chargerClasse');



// function loadClasses($class)
// {
//     // Vérifiez si la classe est un repository (Repository)
//     if (substr($class, -strlen('Repository')) === 'Repository') {
//         require_once __DIR__ . '/../repositories/' . $class . '.php';
//     } else {
//         require_once __DIR__ . '/../entities/' . $class . '.php';
//     }
// }

// spl_autoload_register('loadClasses');



spl_autoload_register(function($className) {
    // Transforme l'espace de noms en chemin de fichier
    $filePath = str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
    
    // Liste des dossiers où chercher les classes
    $directories = [
        __DIR__ . '/../repositories',
        __DIR__ . '/../entities'
        // Ajoutez d'autres dossiers si nécessaire
    ];
    
    // Parcourt les dossiers pour trouver le fichier de classe
    foreach ($directories as $directory) {
        $fullPath = $directory . DIRECTORY_SEPARATOR . $filePath;
        if (file_exists($fullPath)) {
            require_once $fullPath;
            return;
        }
    }
});