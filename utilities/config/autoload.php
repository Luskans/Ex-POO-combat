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
//         require_once __DIR__ . '/../../models/repositories/' . $class . '.php';
//     } else {
//         require_once __DIR__ . '/../../models/entities/' . $class . '.php';
//     }
// }

// spl_autoload_register('loadClasses');

// function loadClasses($class)
// {
//     // Vérifiez si la classe est un repository (Repository)
//     if (substr($class, -strlen('Repository')) === 'Repository') {
//         require_once $_SERVER['DOCUMENT_ROOT'] . '//models/repositories/' . $class . '.php';
//     } else {
//         require_once $_SERVER['DOCUMENT_ROOT'] . '//models/entities/' . $class . '.php';
//     }
// }

// spl_autoload_register('loadClasses');

function loadClasses($class)
{
    // Vérifiez si la classe est un repository (Repository)
    if (substr($class, -strlen('Repository')) === 'Repository') {
        require_once __DIR__ . '/../../models/repositories/' . $class . '.php';
    } else {
        require_once __DIR__ . '/../../models/entities/' . $class . '.php';
    }
}

spl_autoload_register('loadClasses');
