<?php
require('../core/functions.php');
fetchMovieData($_GET['name']);
fetchUserData();
if(isset($_COOKIE['id'])) {
  checkIfUsername($userData['unique_id']);
  checkProfileSession();
}

if(isset($_COOKIE['id'])) {
  $profile = $_SESSION['profile'];
  $uid = htmlentities($userData['unique_id']);
  $name = $movieData['name'];
  $title = $movieData['title'];
  $type = $movieData['type'];
  $cover = $movieData['cover'];
}

if(isset($_POST['addList'])) {
  addList($uid, $profile, $name, $title, $type, $cover);
}
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
  <meta content="<?= $movieData['title'] ?> sur TousVosFilms.com &raquo; Regardez Des Films &amp; Séries GRATUITEMENT En Ligne!" name="description">
	<meta content="<?= $movieData['title'] ?> sur TousVosFilms.com &raquo; Regardez Des Films &amp; Séries GRATUITEMENT En Ligne!" name="description" name="og:description"/>
	<meta content="#ff2b2b" name="theme-color"/>
  <meta content="streaming" name="og:type"/>
  <meta content="shonned" name="author">
  <meta content="https://i.ibb.co/Dp1M7Pc/social2.png" name="image">
  <link rel="shortcut icon" href="../assets/images/icon.png" type="image/png">
  <link rel="apple-touch-icon" href="https://i.ibb.co/Dp1M7Pc/social2.png" />
  <title><?= $movieData['title'] ?> sur TousVosFilms.com &raquo; Regardez Des Films &amp; Séries GRATUITEMENT En Ligne!</title>
  <link rel="stylesheet" href="../assets/css/main.css">
  <link rel="stylesheet" href="../assets/css/media_query.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,regular,500,600,700,800,900" rel="stylesheet" />
  <script type="text/javascript" data-cfasync="false">
    var pmauid = '66711';
    var pmawid = '70597';
    var fq = '0';
  </script>
  <script type="text/javascript" data-cfasync="false" src="https://cdn.popmyads.com/pma.js"></script>
</head>
<body>
  <div class="bg-movie" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgb(26, 29, 41) 100%), url('../assets/images/bg/<?= $movieData['background'] ?>');">

  <?php
  require('../core/nav-2.php'); 
  ?>
      <main>
        <section class="banner banner-movie">
        <div class="a_d_s-card">
            <div class="a_d_s">
              <div class="a_d_s-content">
                <span class="infos">Soutenez le site en désactivant votre bloqueur de pubs.</span>
                <button class="skip" onClick="SkipA_D_S()" disabled>Passer l'annonce</button>
              </div>
            </div>
          </div>
          <div class="banner-card iframe-video">
            <iframe sandbox = "allow-forms allow-pointer-lock allow-same-origin allow-scripts allow-top-navigation" src="<?= $movieData['link'] ?>" frameborder="0" allowfullscreen=""></iframe>
          </div>
          <!-- <div class="pass-card">
            <div class="pass">
              <div class="pass-content">
                <span class="infos">
                  <div class="icon">🎫</div>
                  <div class="text">Ce média nécessite le Pass+</div>
                  <a href="https://discord.gg/ynj2hdSguJ" target="_blank"><div class="link"><u>DISCORD</u></div></a>
                </span>
              </div>
            </div>
          </div> -->
        </section>
    </div>

    <div class="container">
      <section class="movie">

        <?php
        if($movieData['type'] != 'show') {
        ?>
        <div class="addList" style="margin: 20px 0;">
          <form method="post" action="" >
            <?php
            if(isset($_COOKIE['id'])) {
              checkList($uid, $profile, $name, $title, $type, $cover);
            } else {
            ?>
              <a href="../auth">Ajouter à ma liste</a>
            <?php
            }
            ?>
          </form>
        </div>
        <?php
        }
        ?>

        <span class="movies-tag" id="movieInfos">
          <ion-icon name="information-circle-outline"></ion-icon> Informations
        </span>

        <div class="movie-infos">
          <h2 class="movie-title"><?= $movieData['title'] ?></h2>
          <div class="movie-desc">
          <?= $movieData['description'] ?>
          </div>
          <div class="movie-director"><span>Director:</span> <?= $movieData['director'] ?></div>
          <div class="movie-genre"><span>Genre:</span> <?= $movieData['genre'] ?></div>
        </div>

        <span class="movies-tag">
          <ion-icon name="people-circle-outline"></ion-icon> Acteurs principaux
        </span>

        <div class="movie-cast">
          <?php
          for ($i = 0; $i < $castNumber; $i++) {
            $reqProfilPic = $db->prepare("SELECT * FROM actor WHERE name = ?");
            $reqProfilPic->execute(array($castList[$i]));
            $profilPic = $reqProfilPic->fetch();
          ?>
          <a href="../cast/<?= $castList[$i] ?>">
            <div class="actor" style="background-image: url(<?php echo $profilPic['pp'];  ?>)"></div>
          </a>
          <?php
          }
          ?>
        </div>

        </div>
      </section>
    </main>

    <footer>
      <div class="footer-copyright">
        <span>Made by Retr0</span>
        <a href="https://trello.com/b/vDP8TbfM/tous-vos-films" target="_blank"><p>&nbsp;- v<?= $config['version'] ?></p></a>
      </div>
    </footer>

  </div>

  <script src="../assets/js/main.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>