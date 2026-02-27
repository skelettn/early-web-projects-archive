<?php
require('core/functions.php');
@ $type = $_GET['type'];
fetchAllVideosData($type);
fetchUserData();
if(isset($_COOKIE['id'])) {
  checkProfileSession();
  checkIfUsername(htmlentities($userData['unique_id']));
  $uid = htmlentities($userData['unique_id']);
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
  <meta content="Films et séries sur TousVosFilms.com" name="description">
	<meta content="Films et séries sur TousVosFilms.com" name="description" name="og:description"/>
	<meta content="#ff2b2b" name="theme-color"/>
  <meta content="streaming" name="og:type"/>
  <meta content="shonned" name="author">
  <meta content="https://i.ibb.co/Dp1M7Pc/social2.png" name="image">
  <link rel="shortcut icon" href="./assets/images/icon.png" type="image/png">
  <link rel="apple-touch-icon" href="https://i.ibb.co/Dp1M7Pc/social2.png" />
  <title>Films et séries sur TousVosFilms.com</title>
  <link rel="stylesheet" href="./assets/css/main.css">
  <link rel="stylesheet" href="./assets/css/media_query.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,regular,500,600,700,800,900" rel="stylesheet" />
  <script type="text/javascript" data-cfasync="false" src="https://cdn.popmyads.com/pma.js"></script>
</head>

<body>

  <div class="container">
  
    <?php
    require('core/nav.php'); 
    ?>

    <main>
      <section class="movies movies-all">

        <span class="movies-tag">
          <ion-icon name="star-outline"></ion-icon> En fonction de votre recherche..
        </span>

        <div class="movies-grid">
        <?php
        if(!isset($type)) {
          foreach ($allVideos as $vid) {
          ?>
          <a href="video/<?= $vid['name'] ?>">
            <div class="movie-card">
              <div class="card-head">
                <img src="assets/images/cover/<?= $vid['cover'] ?>" alt="<?= $vid['title'] ?>" class="card-img">
                <div class="card-overlay">
                  <div class="rating">
                    <ion-icon name="star-outline"></ion-icon>
                    <span><?= $vid['stars'] ?></span>
                  </div>
                  <div class="play">
                    <ion-icon name="play-circle-outline"></ion-icon>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <h3 class="card-title"><?= $vid['title'] ?></h3>
                <div class="card-info">
                  <span class="year"><?= $vid['date'] ?></span>
                </div>
              </div>
            </div>
          </a>
          <?php
          }
          foreach ($allShows as $show) {
          ?>
          <a href="show/<?= $show['name'] ?>">
            <div class="movie-card">
              <div class="card-head">
                <img src="assets/images/cover/<?= $show['cover'] ?>" alt="<?= $show['title'] ?>" class="card-img">
                <div class="card-overlay">
                  <div class="rating">
                    <ion-icon name="star-outline"></ion-icon>
                    <span><?= $show['stars'] ?></span>
                  </div>
                  <div class="play">
                    <ion-icon name="play-circle-outline"></ion-icon>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <h3 class="card-title"><?= $show['title'] ?></h3>
                <div class="card-info">
                  <span class="year"><?= $show['date'] ?></span>
                </div>
              </div>
            </div>
          </a>
        <?php
          }
        } else if(isset($type) AND $type == "movie") {
          foreach ($allVideos as $vid) {
            ?>
            <a href="video/<?= $vid['name'] ?>">
              <div class="movie-card">
                <div class="card-head">
                  <img src="assets/images/cover/<?= $vid['cover'] ?>" alt="<?= $vid['title'] ?>" class="card-img">
                  <div class="card-overlay">
                    <div class="rating">
                      <ion-icon name="star-outline"></ion-icon>
                      <span><?= $vid['stars'] ?></span>
                    </div>
                    <div class="play">
                      <ion-icon name="play-circle-outline"></ion-icon>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <h3 class="card-title"><?= $vid['title'] ?></h3>
                  <div class="card-info">
                    <span class="year"><?= $vid['date'] ?></span>
                  </div>
                </div>
              </div>
            </a>
            <?php
            }
        ?>
        <?php
        } else if(isset($type) AND $type == "show") {
          foreach ($allVideos as $vid) {
            ?>
            <a href="show/<?= $vid['name'] ?>">
              <div class="movie-card">
                <div class="card-head">
                  <img src="assets/images/cover/<?= $vid['cover'] ?>" alt="<?= $vid['title'] ?>" class="card-img">
                  <div class="card-overlay">
                    <div class="rating">
                      <ion-icon name="star-outline"></ion-icon>
                      <span><?= $vid['stars'] ?></span>
                    </div>
                    <div class="play">
                      <ion-icon name="play-circle-outline"></ion-icon>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <h3 class="card-title"><?= $vid['title'] ?></h3>
                  <div class="card-info">
                    <span class="year"><?= $vid['date'] ?></span>
                  </div>
                </div>
              </div>
            </a>
          <?php
            }
        }
        ?>
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
  
  <script src="./assets/js/main.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>