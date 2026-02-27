<?php
require('core/functions.php');
if(!isset($_COOKIE['id'])) {
  header('location: auth');
  exit;
}
fetchUserData();
$uid = $userData['unique_id'];
if(isset($_POST['profileAdd'])) {
  if(!empty($_POST['profileName'])) {
    addProfile($_POST['profileName'], $uid);
  }
}
checkEditProfile($uid);
insertTVFPlus($uid);
checkTVFPlus($uid);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Tous 🍿 Vos Films &raquo; Regardez Des Films &amp; Séries GRATUITEMENT En Ligne!" name="description">
	<meta content="Tous 🍿 Vos Films &raquo; Regardez Des Films &amp; Séries GRATUITEMENT En Ligne!" name="og:description"/>
	<meta content="Tous 🍿 Vos Films" name="title">
	<meta content="Tous 🍿 Vos Films" name="og:title"/>
	<meta content="#ff2b2b" name="theme-color"/>
  <meta content="streaming" name="og:type"/>
	<meta content="tous vos films, tvf, streaming, site de streaming, gratuit, film, serie, site, disney, marvel" name="keywords"/>
  <meta content="shonned" name="author">
  <meta content="https://i.ibb.co/BKgnpPD/icon.png" name="image">
  <link rel="shortcut icon" href="./assets/images/icon.png" type="image/png">
  <title>Tous 🍿 Vos Films &raquo; Regardez Des Films &amp; Séries GRATUITEMENT En Ligne!</title>
  <link rel="stylesheet" href="./assets/css/main.css">
  <link rel="stylesheet" href="./assets/css/media_query.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,regular,500,600,700,800,900" rel="stylesheet" />
</head>

<body>

  <div class="container">
  
    <?php
    require('core/nav.php'); 
    ?>

    <main class="account">
      <div class="title">Compte</div>
      <div class="acc-tab">
        <div class="acc-tab-header">Détails de votre compte</div>
        <div class="acc-info">Adresse e-mail : <?= $userData['email'] ?></div>
        <div class="acc-info">Nom d'utilisateur : <?= $userData['username'] ?></div>
        <div class="acc-logout"><a href="logout">Se déconnecter</a></div>
      </div>
      <div class="acc-tab">
        <div class="acc-tab-header acc-tab-coin">
          Mes crédits 
          <div class="navCoinsImg navCoinsImgAcc">
            <img src="assets/images/icons/coin.png">
          </div>
          <span><?= $userData['tvf_coin'] ?></span>
        </div>
        <?php
        if($userData['tvf_plus'] == "1") {
        ?>
        <div class="acc-action">
          <div class="acc-info" style="border:0">Abonnement valable jusqu'au: <?= $subscriptionEnd ?></div>
        </div>
        <?php
        } else {
        ?>
        <form method="post" action="">
          <div class="acc-action">
            <div class="acc-info" style="border:0">Activer le Pass+ (Coût: 200)</div>
            <input type="submit" value="Activer" name="activatePlus">
          </div>
        </form>
        <?php
        }
        ?>
        <div class="acc-action">
          <div class="acc-info" style="border:0">Recharger mon compte</div>
          <a href="https://discord.gg/ynj2hdSguJ" target="_blank">Je recharge</a>
        </div>
      </div>
      <div class="acc-tab">
        <div class="acc-tab-header">Mes profils</div>
        <div class="profiles">
          <a href="core/SwitchProfile?uid=<?= $userData['unique_id'] ?>&name=<?= $userData['username']; ?>">
          <div class="profile">
            <?php
            if($userData['avatar'] == '') {
              echo '<div class="avatar"><img src="assets/images/avatar/1.png"></div>';
            } else {
              echo '<div class="avatar"><img src="assets/images/avatar/'.$userData['avatar'].'.png"></div>';
            }
            ?>
            <div class="name"><?= $userData['username']; ?></div>
          </div>
        <?php
        reqProfile($userData['unique_id']);
        ?>
          <div class="profile">
            <a href="#addProfiles">
              <div class="avatar-icon"><ion-icon name="add"></ion-icon></div>
            </a>
            <div class="name">Ajouter</div>
          </div>
          <div class="profile">
            <a href="#manageProfiles">
              <div class="avatar-icon"><ion-icon name="list"></ion-icon></div>
            </a>
            <div class="name">Modifier</div>
          </div>
        </div>
      </div>
      <div class="acc-tab">
        <div class="acc-tab-header">Paramètres</div>
        <div class="acc-info" style="border:0">Prochainement</div>
      </div>
    </main>

    <footer>
      <div class="footer-copyright">
        <span>Made by Retr0</span>
        <a href="https://trello.com/b/vDP8TbfM/tous-vos-films" target="_blank"><p>&nbsp;- v<?= $config['version'] ?></p></a>
      </div>
    </footer>

  </div>
  
  <?php
  require_once('core/modal/addProfiles.php');
  require_once('core/modal/manageProfiles.php');
  ?>

  <script src="./assets/js/main.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>