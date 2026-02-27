<?php

use KIJU\Autoloader;
use KIJU\App;
use KIJU\Router;

// Initialisation de l'autoloader
require '../app/Autoloader.php';
Autoloader::register();

// Instance de l'application
$app = App::getInstance();
App::initProperties();
$db = App::getDatabase();
App::isMaintenance();

// Gestion du contenu affiché
ob_start();
session_start();
if (App::isLogged()) {
    $p = $_GET['p'] ?? 'ac';
    if ($p !== 'ac' && $p !== 'success' && $p !== 'logout') {
        $p = 'ac';
    }
} else if (!App::isLogged() && App::isTempLogged()) {
    $p = 'next';
} else if (!App::isLogged() && !App::isTempLogged()) {
    $p = 'auth';
}

Router::route($p);
$content = ob_get_clean();
require '../pages/templates/default.php';
