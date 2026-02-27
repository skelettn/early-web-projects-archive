<?php
require('../dashboard/id/bd/connexionDB.php');

if(isset($_SESSION['id']) AND $_SESSION['id'] > 0) {

    $getid = intval($_SESSION['id']);
    $requser = $bdd->prepare('SELECT * FROM firelink WHERE id = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();

    $unique_id = $_GET['unique_id'];
    $action = $_GET['action'];
    $link_id = $_GET['link_id'];


    if($userinfo['unique_id'] != $unique_id) {
        echo 'COOLINK_Error';
        exit;
    }

    $del = $bdd->prepare('DELETE FROM my_links WHERE link_id = ? AND unique_id = ?');
    $del->execute(array($link_id, $userinfo['unique_id']));
        
    header('location: ../dashboard/my-coolink');
}

?>