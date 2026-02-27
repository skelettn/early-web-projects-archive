<?php
session_start();
try {
    $db = new PDO('mysql:host=localhost:3306;dbname=tousvosfilms', 'shonned_admin', '#Kiliqn01160TVF', array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));
} catch (PDOException $e) {
    echo "TVF_DATABASE_ERROR";
    die();
}
$reqConfig = $db->prepare("SELECT * FROM config");
$reqConfig->execute();
$config = $reqConfig->fetch();
?>