<?php
session_start();
try {
    $bdd = new PDO('mysql:host=localhost;dbname=link7_bd', 'root', '', array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));
} catch (PDOException $e) {
    echo "ERREUR CONNEXION BASE DE DONNEE";
    die();
}
?>