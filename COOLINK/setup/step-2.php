<?php
require('../lg/id/profilbd.php');

if(!isset($_SESSION['id'])) {
  header('location: ../login');
}

if($userinfo['pseudo'] == "") {
    header("location: step-1");
} 
  
if($userinfo['prenomfamille'] == "") {
    header("location: step-1");
}

if($userinfo['website_title'] != "") {
    header("location: ../dashboard/");
} 
  
if($userinfo['website_description'] != "") {
    header("location: ../dashboard/");
}

if(isset($_SESSION['id'])) {
    $requser = $bdd->prepare("SELECT * FROM firelink WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();

    if(isset($_POST['website_title']) AND !empty($_POST['website_title']) AND isset($_POST['website_description']) AND !empty($_POST['website_description'])) {
        $website_title = htmlspecialchars($_POST['website_title']);
        $website_description = htmlspecialchars($_POST['website_description']);
        $insertwebsite_title = $bdd->prepare("UPDATE firelink SET website_title = ?, website_description = ? WHERE id = ?");
        $insertwebsite_title->execute(array($website_title, $website_description, $_SESSION['id']));
        header('Location: ../dashboard/');
    } else {
        $erreur = "Il nous manque des informations.";
    }
} 



?>
<!-- /*COPYRIGHT Hypera.*/ -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Un seul lien pour tout votre contenu | hypera</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="content/img/favicon.png">
    <link rel="stylesheet" href="../lg/css/lg.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>

    <link href="user_page/modal_leave.css" rel="stylesheet" />
</head>
<div class="login-form">
    <form method="post" action="">
        <div align="center">
            <div style="text-align: center"><a href=""><img src="../content/img/newCoolink/small/coolink_small.png"></a></div>
            <h2 class="title-sign-up">C'est presque fini.</h2>
            <?php
                if(isset($erreur)) {
                    echo '<div class="alert alert--danger">'.$erreur.'</div>';
                }
            ?>
            <input name="website_title" class="gUMdPB gcIDSt" type="text" placeholder="Titre de votre page">
            <input name="website_description" class="gUMdPB gcIDSt" type="text" placeholder="Description de votre page">
            <input type="submit" name="hypera_login"class="continue-button" value="Sauvegarder">
			<p></p>
            <a href="../help/" class="sign-up">Un problème ?</a>
            <p></p>
            <small class="footer-login">Propulsé par Hypera</small>
        </div>
    </form>
    </body>

</html>

<!-- /*COPYRIGHT Hypera.*/ -->
