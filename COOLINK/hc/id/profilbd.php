<?php
require('bd/connexionDB.php');
if(isset($_SESSION['id']) AND $_SESSION['id'] > 0) {
    $getid = intval($_SESSION['id']);
    $requser = $bdd->prepare('SELECT * FROM firelink WHERE id = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
}
 ?>
