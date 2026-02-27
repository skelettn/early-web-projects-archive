<?php
require('../id/profilbd.php');

if(isset($_GET['id']) AND !empty($_GET['id']) AND isset($_GET['confirm_key']) AND !empty($_GET['confirm_key'])) {
    $getid = $_GET['id'];
    $getkey = $_GET['confirm_key'];
    $recupUser = $bdd->prepare('SELECT * FROM firelink WHERE id = ? AND confirm_key = ?');
    $recupUser->execute(array($getid, $getkey));
    if($recupUser->rowCount() > 0) {
        $userInfos = $recupUser->fetch();
        if($userInfos['confirme'] != 1) {
            $updateConfirm = $bdd->prepare('UPDATE firelink SET confirme = ? WHERE id = ?');
            $updateConfirm->execute(array(1, $getid));

            header('Location: ../../dashboard/');
        } else {
            $_SESSION['confirm_key'] = $getkey;
            header('Location: ../../dashboard/');
        }
    } else {
        echo 'Le code de validation n\'est pas bon';
    }
} else {
    echo 'Cet utilisateur n\'existe pas';
}
?>