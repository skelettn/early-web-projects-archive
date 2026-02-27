<?php
require('../lg/id/profilbd.php');

if(!isset($_SESSION['id'])) {
  header('location: ../login');
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
            <h2 class="title-sign-up">Choisissez une offre.</h2>
            <div class="offer">
                <div class="offer-item">
                    <h4>COOLINK+</h4>
                    <a href="../dashboard/#offer+">Choisir</a>
                </div>
            </div>
            <div class="offer">
                <div class="offer-item">
                    <h4>COOLINK&nbsp;&nbsp;&nbsp;</h4>
                    <a href="">Choisir</a>
                </div>
            </div>
            <p></p>
            <small class="footer-login">Propulsé par Hypera</small>
        </div>
    </form>
    </body>

</html>

<!-- /*COPYRIGHT Hypera.*/ -->
