<?php
require('../id/bd/connexionDB.php');

if(isset($_GET['unique_id'])) {
    $getid = $_GET['unique_id'];
    $requser = $bdd->prepare('SELECT * FROM firelink WHERE unique_id = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
}
?>
