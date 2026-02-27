<?php
require('id/profilbd.php');

if(!isset($_SESSION['id'])) {
  header('location: ../login?lang=fr_FR');
}

if($userinfo['confirme'] != 0) {
    header('Location: ../dashboard/');
}

?>
<!-- /*COPYRIGHT Hypera.*/ -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>COOLINK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../content/img/favicon.png">
    <link rel="stylesheet" href="css/activate.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
</head>
<div class="login-form">
    <form method="post" action="">
        <div align="center">
            <div class="showbox">
                <div class="loader"> 
                    <svg class="circular" viewBox="25 25 50 50">
                        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
                    </svg>
                </div>
            </div>
            <p class="comfirmation_text">Nous avons envoyé un e-mail de vérification à <b><?php echo $userinfo['mail']; ?></b>. Cliquez sur le lien contenu dans le message pour démarrer !</p>
            <!-- <p class="skip_text">Passer pour le moment.</p> -->
            <hr>
            <!-- <p class="resend_text">Vous n'avez pas reçu le mail ?</p> -->
            <a class="comfirm_text" href="">J'ai validé mon compte</a>
            <hr>
            <small class="footer-login">Propulsé par Hypera</small>
        </div>
    </form>
    </body>

</html>

<!-- /*COPYRIGHT Hypera.*/ -->