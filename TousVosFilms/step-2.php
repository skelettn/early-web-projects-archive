<?php
require('core/functions.php');
if(!isset($_COOKIE['id'])) {
    header('location: index');
    exit;
} else {
    fetchUserData();
    $uid = $userData['unique_id'];
    $reqUsername = $db->prepare("SELECT username FROM users WHERE unique_id = ?");
    $reqUsername->execute(array($uid));
    $usernameExist = $reqUsername->fetch();
    if($usernameExist['username'] != '') {
        header('location: select-profile');
        exit;
    }
    insertUsername($uid);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Tous 🍿 Vos Films" name="title">
  <meta content="Tous 🍿 Vos Films" name="og:title"/>
  <meta content="Regardez Des Films &amp; Séries GRATUITEMENT En Ligne!" name="description">
  <meta content="Regardez Des Films &amp; Séries GRATUITEMENT En Ligne!" name="description" name="og:description"/>
  <meta content="#ff2b2b" name="theme-color"/>
  <meta content="streaming" name="og:type"/>
  <meta content="shonned" name="author">
  <meta content="https://i.ibb.co/Dp1M7Pc/social2.png" name="image">
  <link rel="shortcut icon" href="./assets/images/icon.png" type="image/png">
  <link rel="apple-touch-icon" href="https://i.ibb.co/Dp1M7Pc/social2.png" />
  <title>Tous 🍿 Vos Films &raquo; Regardez Des Films &amp; Séries GRATUITEMENT En Ligne!</title>
  <link rel="stylesheet" href="./assets/css/main.css">
  <link rel="stylesheet" href="./assets/css/media_query.css">
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
            <div class="v2LoginTitle">Nom d'utilisateur</div>
            <div class="v2LoginInputs">
                <form action="" method="post">
                    <label for="">Nous avons besoin d'un nom d'utilisateur</label>
                    <input type="text" placeholder="jaimelestreaming" id="uemail" name="username" onkeyup="lgNotEmpty()">
                    <button id="sendCode" type="submit" name="saveUsername" disabled>Je valide</button>
                </form>
            </div>
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