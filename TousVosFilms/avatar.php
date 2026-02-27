<?php
require('core/functions.php');
if(!isset($_COOKIE['id'])) {
  header('location: auth');
  exit;
}
if(!isset($_GET['profile'])) {
  header('location: account');
  exit;
}
fetchUserData();
checkProfileSession();
$uid = htmlentities($userData['unique_id']);
checkIfUsername($uid);
$reqProfile = $db->prepare("SELECT * FROM profile WHERE uid = ? AND name = ?");
$reqProfile->execute(array($uid, $_GET['profile']));
$profileData = $reqProfile->fetch();
if($profileData['uid'] != $uid) {
  header('location: account');
  exit;
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

<body>
  <div class="avatarTVFLogo">
    <img src="assets/images/logo_loader.png" alt="Tous Vos Films">
  </div>
  <div class="avatarContainer">
    <div class="profileName">
      <a href="select-profile">
        <ion-icon name="arrow-back-outline"></ion-icon>
      </a>
      Modifier le profil 
      <span><?= $_GET['profile'] ?></span>
    </div>
    <div class="profileAvatarsGroup">
      <?php
      if(empty($_GET['confirm'])) {
      ?>
        <div class="profileAvatarTitles">Rick et Morty</div>
        <div class="profileAvatars">
          <a href="avatar?profile=<?= $_GET['profile'] ?>&confirm=randm-1"><div class="profileAvatar"><img src="assets/images/avatar/randm-1.png"></div></a>
          <a href="avatar?profile=<?= $_GET['profile'] ?>&confirm=randm-2"><div class="profileAvatar"><img src="assets/images/avatar/randm-2.png"></div></a>
          <a href="avatar?profile=<?= $_GET['profile'] ?>&confirm=randm-3"><div class="profileAvatar"><img src="assets/images/avatar/randm-3.png"></div></a>
          <a href="avatar?profile=<?= $_GET['profile'] ?>&confirm=randm-4"><div class="profileAvatar"><img src="assets/images/avatar/randm-4.png"></div></a>
          <a href="avatar?profile=<?= $_GET['profile'] ?>&confirm=randm-5"><div class="profileAvatar"><img src="assets/images/avatar/randm-5.png"></div></a>
          <a href="avatar?profile=<?= $_GET['profile'] ?>&confirm=randm-6"><div class="profileAvatar"><img src="assets/images/avatar/randm-6.png"></div></a>
          <a href="avatar?profile=<?= $_GET['profile'] ?>&confirm=randm-7"><div class="profileAvatar"><img src="assets/images/avatar/randm-7.png"></div></a>
        </div>
        <div class="profileAvatarTitles">Breaking Bad</div>
        <div class="profileAvatars">
          <a href="avatar?profile=<?= $_GET['profile'] ?>&confirm=breaking-bad-1"><div class="profileAvatar"><img src="assets/images/avatar/breaking-bad-1.png"></div></a>
          <a href="avatar?profile=<?= $_GET['profile'] ?>&confirm=breaking-bad-2"><div class="profileAvatar"><img src="assets/images/avatar/breaking-bad-2.png"></div></a>
          <a href="avatar?profile=<?= $_GET['profile'] ?>&confirm=breaking-bad-3"><div class="profileAvatar"><img src="assets/images/avatar/breaking-bad-3.png"></div></a>
          <a href="avatar?profile=<?= $_GET['profile'] ?>&confirm=breaking-bad-4"><div class="profileAvatar"><img src="assets/images/avatar/breaking-bad-4.png"></div></a>
          <a href="avatar?profile=<?= $_GET['profile'] ?>&confirm=breaking-bad-5"><div class="profileAvatar"><img src="assets/images/avatar/breaking-bad-5.png"></div></a>
          <a href="avatar?profile=<?= $_GET['profile'] ?>&confirm=breaking-bad-6"><div class="profileAvatar"><img src="assets/images/avatar/breaking-bad-6.png"></div></a>
          <a href="avatar?profile=<?= $_GET['profile'] ?>&confirm=breaking-bad-7"><div class="profileAvatar"><img src="assets/images/avatar/breaking-bad-7.png"></div></a>
          <a href="avatar?profile=<?= $_GET['profile'] ?>&confirm=breaking-bad-8"><div class="profileAvatar"><img src="assets/images/avatar/breaking-bad-8.png"></div></a>
          <a href="avatar?profile=<?= $_GET['profile'] ?>&confirm=breaking-bad-9"><div class="profileAvatar"><img src="assets/images/avatar/breaking-bad-9.png"></div></a>
        </div>
        <div class="profileAvatarTitles">Harry Potter</div>
        <div class="profileAvatars">
          <a href="avatar?profile=<?= $_GET['profile'] ?>&confirm=hp-1"><div class="profileAvatar"><img src="assets/images/avatar/hp-1.png"></div></a>
          <a href="avatar?profile=<?= $_GET['profile'] ?>&confirm=hp-2"><div class="profileAvatar"><img src="assets/images/avatar/hp-2.png"></div></a>
          <a href="avatar?profile=<?= $_GET['profile'] ?>&confirm=hp-3"><div class="profileAvatar"><img src="assets/images/avatar/hp-3.png"></div></a>
          <a href="avatar?profile=<?= $_GET['profile'] ?>&confirm=hp-4"><div class="profileAvatar"><img src="assets/images/avatar/hp-4.png"></div></a>
          <a href="avatar?profile=<?= $_GET['profile'] ?>&confirm=hp-5"><div class="profileAvatar"><img src="assets/images/avatar/hp-5.png"></div></a>
          <a href="avatar?profile=<?= $_GET['profile'] ?>&confirm=hp-6"><div class="profileAvatar"><img src="assets/images/avatar/hp-6.png"></div></a>
          <a href="avatar?profile=<?= $_GET['profile'] ?>&confirm=hp-7"><div class="profileAvatar"><img src="assets/images/avatar/hp-7.png"></div></a>
          <a href="avatar?profile=<?= $_GET['profile'] ?>&confirm=hp-8"><div class="profileAvatar"><img src="assets/images/avatar/hp-8.png"></div></a>
          <a href="avatar?profile=<?= $_GET['profile'] ?>&confirm=hp-9"><div class="profileAvatar"><img src="assets/images/avatar/hp-9.png"></div></a>
          <a href="avatar?profile=<?= $_GET['profile'] ?>&confirm=hp-10"><div class="profileAvatar"><img src="assets/images/avatar/hp-10.png"></div></a>
          <a href="avatar?profile=<?= $_GET['profile'] ?>&confirm=hp-11"><div class="profileAvatar"><img src="assets/images/avatar/hp-11.png"></div></a>
          <a href="avatar?profile=<?= $_GET['profile'] ?>&confirm=hp-12"><div class="profileAvatar"><img src="assets/images/avatar/hp-12.png"></div></a>
        </div>
      <?php
      } else {
      ?>
      <style>
        @media screen and (max-width: 463px) {
        .profileAvatarsGroup, .profileName {
          width: auto;
        }
        .profileAvatarConfirmTitle {
          margin-top: 50px;
        }
        .profileName span {
          display:none;
        }
      }
      </style>
      <div class="profileAvatarConfirmTitle">Confirmation</div>
      <div class="pASepratator"></div>
      <div class="profileAvatarConfirm">
        <div class="pAConfirm">
          <?php
          if($profileData['avatar'] == '') {
            echo '<div class="pAConfirmCurrent"><img src="assets/images/avatar/1.png"></div>';
          } else {
            echo '<div class="pAConfirmCurrent"><img src="assets/images/avatar/'.$profileData['avatar'].'.png"></div>';
          }
          ?>
          <ion-icon name="chevron-forward-outline"></ion-icon>
          <div class="pAConfirmNew"><img src="assets/images/avatar/<?= $_GET['confirm'] ?>.png"></div>
        </div>
      </div>
      <div class="pASepratator"></div>
      <div class="pAConformBtns">
          <a href="avatar?profile=<?= $_GET['profile'] ?>">Je change d'avis</a>
          <a href="core/UpdateAvatar?profile=<?= $_GET['profile'] ?>&avatar=<?= $_GET['confirm'] ?>">Je valide</a>
        </div>
      <?php
      }
      ?>
    </div>
  </div>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>