<?php
require('functions.php');
fetchUserData();
$req = $db->prepare('SELECT * FROM profile WHERE uid = ? AND name = ?');
$req->execute(array($_GET['uid'], $_GET['name']));
$exist = $req->rowCount();
if($exist >= 1) {
    $_SESSION['profile'] = $_GET['name'];
    header('location: ../');
    exit;
} else {
    $_SESSION['profile'] = $userData['username'];
    header('location: ../');
    exit;
}
?>