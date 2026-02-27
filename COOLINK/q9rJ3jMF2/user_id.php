<?php
require('id/bd/connexionDB.php');

if(isset($_GET['pseudo'])) {
    $getid = $_GET['pseudo'];
    $requser = $bdd->prepare('SELECT * FROM firelink WHERE pseudo = ?');
    $requser->execute(array($getid));
    $websiteinfo = $requser->fetch();

    $reqLinkList = $bdd->prepare('SELECT * FROM my_links WHERE unique_id = ?');
    $reqLinkList->execute(array($websiteinfo['unique_id']));
    $LinkList = $reqLinkList->fetchAll();
    $LinkListNumber = $reqLinkList->rowCount();
}

?>
