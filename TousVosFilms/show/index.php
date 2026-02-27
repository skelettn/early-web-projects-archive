<?php
require('../core/functions.php');
fetchShowData($_GET['name']);
fetchUserData();
if(isset($_COOKIE['id'])) {
  checkIfUsername($userData['unique_id']);
  checkProfileSession();
}

if(!empty($_POST['saison'])) {
    $saison = strval($_POST['saison']);
    $reqEpisodes = $db->prepare("SELECT * FROM video WHERE showname = ? AND season = ?");
    $reqEpisodes->execute(array($_GET['name'], $saison));
    $episodes = $reqEpisodes->fetchAll();
}

if(isset($_COOKIE['id'])) {
  $profile = $_SESSION['profile'];
  $uid = htmlentities($userData['unique_id']);
  $name = $showData['name'];
  $title = $showData['title'];
  $type = 'show';
  $cover = $showData['cover'];
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
  <meta content="<?= $showData['title'] ?> sur TousVosFilms.com &raquo; Regardez Des Films &amp; Séries GRATUITEMENT En Ligne!" name="description">
	<meta content="<?= $showData['title'] ?> sur TousVosFilms.com &raquo; Regardez Des Films &amp; Séries GRATUITEMENT En Ligne!" name="description" name="og:description"/>
	<meta content="#ff2b2b" name="theme-color"/>
  <meta content="streaming" name="og:type"/>
  <meta content="shonned" name="author">
  <meta content="https://i.ibb.co/Dp1M7Pc/social2.png" name="image">
  <link rel="shortcut icon" href="../assets/images/icon.png" type="image/png">
  <link rel="apple-touch-icon" href="https://i.ibb.co/Dp1M7Pc/social2.png" />
  <title><?= $showData['title'] ?> sur TousVosFilms.com &raquo; Regardez Des Films &amp; Séries GRATUITEMENT En Ligne!</title>
  <link rel="stylesheet" href="../assets/css/main.css">
  <link rel="stylesheet" href="../assets/css/media_query.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,regular,500,600,700,800,900" rel="stylesheet" />
  <script type="text/javascript" data-cfasync="false" src="https://cdn.popmyads.com/pma.js"></script>
</head>

<body>

  <div class="bg-movie" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgb(26, 29, 41) 100%), url('../assets/images/bg/<?= $showData['background'] ?>');">
  <?php
  require('../core/nav-2.php'); 
  ?>

      <main>

        <section class="banner">
          <div class="banner-card iframe-video" style="display:block;"></div>
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
      <form action="" method="post">
        <select name="saison" id="season-select" onchange="this.form.submit()">
            <option value="">Choisir une saison</option>
            <?php
            for ($i =1; $i <=  $showData['seasons']; $i++) {
            ?>
            <option value="<?= $i ?>">Saison <?= $i  ?></option>
            <?php
            }
            ?>
        </select>
        <div class="episodes">
            <?php
            if(!empty($_POST['saison'])) {
            ?>
            <div class="show-grid">
            <?php
              foreach ($episodes as $ep) {
                ?>
                <a href="../video/<?= $ep['name'] ?>">
                        <div class="movie-card">
                            <div class="card-head">
                            <img src="../assets/images/cover/<?= $ep['cover'] ?>" alt="" class="card-img">
                            <div class="card-overlay">
                                <div class="bookmark">
                                <ion-icon name="bookmark-outline"></ion-icon>
                                </div>
                                <div class="rating">
                                <ion-icon name="star-outline"></ion-icon>
                                <span>8.5</span>
                                </div>
                                <div class="play">
                                <ion-icon name="play-circle-outline"></ion-icon>
                                </div>
                            </div>
                            </div>
                            <div class="card-body">
                            <h3 class="card-title"><?= $ep['title'] ?></h3>
                            <div class="card-info">
                                <span class="year"><?= $ep['date'] ?></span>
                            </div>
                            </div>
                        </div>
                    </a>
                <?php
              }
            ?>
            </div>
            <?php
            }
            ?>
        </div>

        <span class="movies-tag">
          <ion-icon name="information-circle-outline"></ion-icon> Informations
        </span>

        <div class="addList">
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

        <div class="movie-infos">
          <h2 class="movie-title"><?= $showData['title'] ?></h2>
          <div class="movie-desc">
          <?= $showData['description'] ?>
          </div>
          <div class="movie-director"><span>Director:</span> <?= $showData['director'] ?></div>
          <div class="movie-genre"><span>Genre:</span> <?= $showData['genre'] ?></div>
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