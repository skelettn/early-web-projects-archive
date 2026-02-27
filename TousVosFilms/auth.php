<?php
require('core/functions.php');
require('core/comett/kijuCode.php');

if(isset($_COOKIE['id'])) {
    header('location: ../');
    exit;
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="robots" content="index, follow" />
  <meta content="Mon compte TousVosFilms.com" name="description">
  <meta content="Mon compte TousVosFilms.com" name="og:description"/>
  <meta content="Mon compte" name="title">
  <meta content="Mon compte" name="og:title"/>
  <meta content="#ff2b2b" name="theme-color"/>
  <meta content="streaming" name="og:type"/>
  <meta content="tous vos films, tvf, streaming, site de streaming, gratuit, film, serie, site, disney, marvel" name="keywords"/>
  <meta content="shonned" name="author">
  <meta content="https://i.ibb.co/Dp1M7Pc/social2.png" name="image">
  <link rel="shortcut icon" href="./assets/images/icon.png" type="image/png">
  <title>Mon compte</title>
  <link rel="stylesheet" href="./assets/css/comett.login.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,regular,500,600,700,800,900" rel="stylesheet" />
</head>

<body id="v2LoginBg">
    <a href="../">
        <div class="v2LoginBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
            <span>Retour</span>
        </div>
    </a>
    <div class="v2LoginContent">
        <div>
            <img class="v2LoginContentLogo" src="assets/images/logo_white.png" alt="TOUS VOS FILMS">
            <div class="v2LoginContentText">Regardez Des Films &amp; Séries GRATUITEMENT En Ligne!</div>
        </div>
        <div class="v2LoginForm">
            <?php
            if(!isset($_GET['email'])) {
            ?>
            <div class="v2LoginTitle">Mon compte</div>
            <div class="v2LoginInputs">
                <form action="" method="post">
                    <label for="">Quelle est votre adresse e-mail ?</label>
                    <input type="text" placeholder="ton@email.com" id="uemail" name="v2EU" onkeyup="lgNotEmpty()">
                    <button id="sendCode" type="submit" name="sendCode" disabled>Envoyer le code</button>
                </form>
                <div class="v2LoginInputsSeparator">
                    <span>OU</span>
                </div>
                <div class="v2LoginBtn v2LoginBtnGoogle" style="opacity: .6;">Continuer avec Google</div>
                <div class="v2LoginBtn v2LoginBtnDiscord" style="opacity: .6;">Continuer avec Discord</div>
            </div>
            <?php
            } else {
            ?>
            <div class="v2LoginTitle">Vérification</div>
            <?php
            if(isset($_GET['error']) && $_GET['error'] == 'code') {
            ?>
            <div class="v2LoginError">Le code est incorrect</div>
            <?php
            }
            ?>
            <div class="v2LoginLoading">
                <div class="v2LoginLoading">
                    <div class="loader">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="v2LoginInputs v2LoginInputsCode">
                <form action="" method="post">
                    <label for="">Code envoyé à : <?= $_GET['email'] ?></label>
                    <input type="text" placeholder="Coller ou écrivez votre code" id="uemail" name="v2Code" onkeyup="lgNotEmpty()">
                    <button id="sendCode" type="submit" name="emailCode" disabled>Continuer</button>
                </form>
            </div>
            <script>
                function echoCodeInput() {
                    v2LoginLoading = document.querySelector(".v2LoginLoading");
                    v2LoginLoading.style.display = "none";
                    v2LoginInputsCode = document.querySelector(".v2LoginInputsCode");
                    v2LoginInputsCode.style.display = "block";
                }
                setInterval(echoCodeInput, 3000);
            </script>
            <?php
            }
            ?>
            <div class="v2LoginInfos">
                Votre adresse IP est enregistrée, les doubles comptes sont interdits sur le site, toute infraction entrainera un ban IP définitif.
            </div>
            <div class="v2LoginCopy">
                <span>Made by Retr0</span>
            </div>
        </div>
    </div>
    <script>
      function lgNotEmpty() {
        if(document.getElementById("uemail").value==="") { 
              document.getElementById('sendCode').disabled = true; 
          } else { 
              document.getElementById('sendCode').disabled = false;
          }
      }
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>