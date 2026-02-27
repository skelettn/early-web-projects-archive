<?php
ini_set('display_errors', 'On');
ini_set('error_reporting', E_ALL);

use KIJU\Autoloader;
use KIJU\App;
use KIJU\Router;

header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

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

$routes = ['home', 'profile', 'discover', 'community', 'communities', 'updates', 'view_post', 'search', 'access'];

if (isset($_SESSION['admin_Access'])) {
    if (!App::isLogged()) {
        $p = (in_array($_GET['p'], ['communities', 'search'])) ? 'home' : ($_GET['p'] ?? 'home');
    } else {
        $p = $_GET['p'] ?? 'home';
    }
} else {
    $p = 'access';
}

if (!in_array($p, $routes)) {
    $p = "404";
}


Router::route($p);
$content = App::minifyHtml(ob_get_clean());
require '../pages/templates/default.php';
