<?php
require('id/profilbd.php');

if(!isset($_SESSION['id'])) {
  header('location: ../lg/signin?lang=fr_FR');
}

  if(isset($_SESSION['id'])) {
    $requser = $bdd->prepare("SELECT * FROM users WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
        if(isset($_POST['pseudo']) AND !empty($_POST['pseudo']) AND $_POST['pseudo'] != $user['pseudo']) {
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $insertpseudo = $bdd->prepare("UPDATE users SET pseudo = ? WHERE id = ?");
            $insertpseudo->execute(array($pseudo, $_SESSION['id']));
            header('Location: ../account/');
        }
    }

?>
<!-- /*COPYRIGHT Hypera.*/ -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Un seul lien pour tout votre contenu | Firelink</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../content/img/favicon.png">
    <link rel="stylesheet" href="../content/css/login/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>

    <link href="user_page/modal_leave.css" rel="stylesheet" />
</head>
<div class="login-form">
    <form method="post" action="">
        <div align="center">
            <div style="text-align: center"><a href=""><img src="../content/img/logo1020/firelink1020s_b_grabient.png"></a></div>
            <h2 class="title-sign-up">Quelques informations</h2>
            <input name="pseudo" class="gUMdPB gcIDSt" type="text" placeholder="Nom d'utilisateur">
            <input type="submit" name="firelink_login"class="continue-button" value="Sauvegarder">
			<p></p>
            <a href="help/" class="sign-up">Un problème ?</a>
            <p></p>
            <small class="footer-login">Propulsé par Hypera</small>
        </div>
    </form>
    </body>

</html>

<!-- /*COPYRIGHT Hypera.*/ -->
