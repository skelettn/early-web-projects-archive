<?php
require('core/functions.php');
if(!isset($_COOKIE['id'])) {
    header('location: ../');
    exit;
}
fetchUserData();
checkIfUsername($userData['unique_id']);
fetchProfile();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="robots" content="index, follow" />
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

<body>

  <div class="sp">
    <div class="sp-header">
        <img src="assets/images/logo_loader.png" alt="Tous Vos Films">
        <div class="title">Qui regarde ?</div>
        <div class="profiles">
          <div class="profile">
            <a href="core/SwitchProfile?uid=<?= $userData['unique_id'] ?>&name=<?= $userData['username'] ?>">
            <?php
            if($userData['avatar'] == '') {
              echo '<div class="avatar"><img src="assets/images/avatar/1.png"></div>';
            } else {
              echo '<div class="avatar"><img src="assets/images/avatar/'.$userData['avatar'].'.png"></div>';
            }
            ?>
            </a>
            <div class="name"><?= $userData['username'] ?></div>
          </div>
          <?php
            foreach ($profileData as $pData) {
          ?>
          <div class="profile">
            <a href="core/SwitchProfile?uid=<?= $userData['unique_id'] ?>&name=<?= $pData['name'] ?>">
            <?php
            if($pData['avatar'] == '') {
              echo '<div class="avatar"><img src="assets/images/avatar/1.png"></div>';
            } else {
              echo '<div class="avatar"><img src="assets/images/avatar/'.$pData['avatar'].'.png"></div>';
            }
            ?>
            </a>
            <div class="name"><?= $pData['name'] ?></div>
          </div>
          <?php
            }
          ?>
          <?php
          if(isset($_SESSION['profile'])) {
          ?>
          <div class="profile">
            <a href="account#profileModal">
              <div class="avatar"><span>+</span></div>
            </a>
            <div class="name">Ajouter</div>
          </div>
          <?php
          } 
          ?>
        </div>
    </div>
  </div>

  <script src="./assets/js/main.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>