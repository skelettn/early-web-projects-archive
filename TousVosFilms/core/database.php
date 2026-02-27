<?php
session_start();
try {
    $db = new PDO('mysql:host=DB_HOST;dbname=DB_NAME', 'DB_USER', 'DB_PASS', array(
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