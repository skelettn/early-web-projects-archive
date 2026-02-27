<?php

if(isset($_POST['add_link'])) {
    if(!empty(trim($_POST['link_title']))  AND !empty(trim($_POST['link_redirection'])) AND !empty(trim($_POST['link_theme']))) {
         $unique_id = $userinfo['unique_id'];
         $link_id = mt_rand(100000, 100000000);
         $link_title = htmlspecialchars($_POST['link_title']);
         $link_theme = htmlspecialchars($_POST['link_theme']);
         $link_redirection = htmlspecialchars($_POST['link_redirection']);
         echo $unique_id; echo '<br>';
         echo $link_id; echo '<br>';
         echo $link_title; echo '<br>';
         echo $link_redirection; echo '<br>';
         echo $link_theme; echo '<br>';
         $insert_link = $bdd->prepare("INSERT INTO `my_links`(
         `unique_id`,   
         `link_id`,  
         `link_title`, 
         `link_theme`,
         `link_redirection`) 
        VALUES(?, ?, ?, ?, ?)");

        $insert_link->execute(array($unique_id, $link_id, $link_title, $link_theme, $link_redirection));
        header('Location: ../dashboard/my-coolink');
    } else {
        $erreur = "Merci de remplir tous les champs";
    }
}

if(isset($_SESSION['id']) AND $_SESSION['id'] > 0) {
    $getid = intval($_SESSION['id']);
    $requser = $bdd->prepare('SELECT * FROM firelink WHERE id = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
  
    $unique_id = $userinfo['unique_id'];
  
    $reqLinkList = $bdd->prepare('SELECT * FROM my_links WHERE unique_id = ?');
    $reqLinkList->execute(array($unique_id));
    $LinkList = $reqLinkList->fetchAll();
    $LinkListNumber = $reqLinkList->rowCount();

  
}


?>