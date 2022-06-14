<?php

use oFramework\Utils\Application;

// On veut charger toutes les dépendances fournies par Composer
// Pour cela, 1 seul et unique fichier à inclure
require __DIR__ . '/oFramework/vendor/autoload.php';

// Load session
session_start();

// On lance l'application
$app = new Application('\App\Controllers');

// le répertoire (après le nom de domaine) dans lequel on travaille est celui-ci
// Mais on pourrait travailler sans sous-répertoire
// Si il y a un sous-répertoire
if (array_key_exists('BASE_URI', $_SERVER)) {
    // Alors on définit le basePath d'AltoRouter
    $router->setBasePath($_SERVER['BASE_URI']);
    // ainsi, nos routes correspondront à l'URL, après la suite de sous-répertoire
}
// sinon
else {
    // On donne une valeur par défaut à $_SERVER['BASE_URI'] car c'est utilisé dans le CoreController
    $_SERVER['BASE_URI'] = '';
}

$app->run();
