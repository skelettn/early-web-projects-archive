<?php
session_start();
 
// Suppression des variables de session et de la session
$_SESSION = array();
session_destroy();
 
// Suppression des cookies de connexion automatique
setcookie('id');
setcookie('profile');
setcookie('username');
setcookie('mail');
unset($_COOKIE['id']);
unset($_COOKIE['profile']);
unset($_COOKIE['username']);
unset($_COOKIE['mail']);
 
 
header('Location: index');
exit;
 
 
?>