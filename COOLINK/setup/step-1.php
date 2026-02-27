<?php
require('../lg/id/profilbd.php');

if(!isset($_SESSION['id'])) {
  header('location: ../login');
}

if($userinfo['prenomfamille'] != "") {
    header("location: step-2");
}
  
if($userinfo['pseudo'] != "") {
    header("location: step-2");
}

if(isset($_SESSION['id'])) {
    $requser = $bdd->prepare("SELECT * FROM firelink WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();

    if(isset($_POST['prenomfamille']) AND !empty($_POST['prenomfamille']) AND isset($_POST['pseudo']) AND !empty($_POST['pseudo'])) {
        $prenomfamille = htmlspecialchars($_POST['prenomfamille']);

        $pseudo = htmlspecialchars($_POST['pseudo']);

        $check_pseudo_request = $bdd->prepare("SELECT * FROM `firelink` WHERE `pseudo` = ?");
        $check_pseudo_request->execute(array($pseudo));
        $check_pseudo = $check_pseudo_request->rowCount();

        if($check_pseudo == 0) {
            $insertinfo = $bdd->prepare("UPDATE firelink SET prenomfamille = ?, pseudo = ? WHERE id = ?");
            $insertinfo->execute(array($prenomfamille, $pseudo, $_SESSION['id']));
            header('Location: ../dashboard/');
        } else {
            $erreur = "Ce nom d'utilisateur est déja prit.";
        }
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
            <h2 class="title-sign-up">Nous préparons votre environnement</h2>
            <?php
                if(isset($erreur)) {
                    echo '<div class="alert alert--danger">'.$erreur.'</div>';
                }
            ?>
            <input name="prenomfamille" class="gUMdPB gcIDSt" type="text" placeholder="Nom et Prénom">
            <input name="pseudo" class="gUMdPB gcIDSt" type="text" placeholder="Nom d'utilisateur">
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
