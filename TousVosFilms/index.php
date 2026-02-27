<?php
require('core/functions.php');
fetchUserData();
if(!empty($_COOKIE['id'])) {
  checkProfileSession();
  checkIfUsername($userData['unique_id']);
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

  <div class="bg-movie bg-movie-home" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgb(26, 29, 41) 100%), url('assets/images/bg/thor-love-and-thunder.jpg');">

  <?php
  require('core/nav.php'); 
  ?>

    <main class="main-home">
      <section class="banner">
        <div class="banner-card">
          <div class="card-content">
            <h2 class="card-title"><img src="https://upload.wikimedia.org/wikipedia/fr/a/af/Logo_thor_love_and_thunder.png"></h2>
            <div class="card-btn">
              <a href="video/thor-love-and-thunder">Lecture <ion-icon name="open-outline"></ion-icon></a>
              <a href="video/thor-love-and-thunder#movieInfos">Plus d'infos</a>
            </div>
          </div>
        </div>
      </section>

  <div class="container">
      <section class="category" id="category">

        <span class="category-head">
          <ion-icon name="rocket-outline"></ion-icon> Les catégories disponibles
        </span>

        <div class="category-grid">

          <a href="category/action">
            <div class="category-card">
              <img src="./assets/images/categories/action.png" alt="" >
            </div>
          </a>

          <a href="category/aventure">
            <div class="category-card">
              <img src="./assets/images/categories/aventure.png" alt="">
            </div>
          </a>

          <a href="category/anime">
            <div class="category-card">
              <img src="./assets/images/categories/anime.png" alt="">
            </div>
          </a>

          <a href="category/animation">
            <div class="category-card">
              <img src="./assets/images/categories/animation.png" alt="">
            </div>
          </a>

          <a href="category/comedie">
            <div class="category-card">
              <img src="./assets/images/categories/comedie.png" alt="" >
            </div>
          </a>

          <a href="category/horreur">
            <div class="category-card">
              <img src="./assets/images/categories/horreur.png" alt="">
            </div>
          </a>

          <a href="#starwars">
            <div class="category-card logo-card">
              <img class="card-img logo logo-sw" src="assets/images/categories/starswarslogo.png">
              <video loop autoplay playsinline muted class="animated_video">
                <source src="assets/images/categories/1608229455-star-wars.mp4" type="video/mp4">
              </video>
            </div>
          </a>

          <a href="#marvel">
            <div class="category-card logo-card">
              <img class="card-img logo logo-marvel" src="assets/images/categories/marvel-logo.png">
              <video loop autoplay playsinline muted class="animated_video">
                <source src="assets/images/categories/1564676115-marvel.mp4" type="video/mp4">
              </video>
            </div>
          </a>
          
        </div>

      </section>

      <div class="movies passplus">
        <span class="movies-tag">
          <ion-icon name="ticket-outline"></ion-icon> Pass+
        </span>
        <div class="pass-plus">
            <div class="pass-plus-content">
              <ion-icon name="ticket-outline" class="icon-title"></ion-icon>
              <div class="title">Pass+</div>
              <div class="description">Plus de films/séries, du contenu en avant première, 0 pubs pour 2.99€.</div>
              <a href="https://discord.gg/ynj2hdSguJ" target="_blank">
                <button>
                  <span>ACHETER</span>
                </button>
              </a>
            </div>
        </div>
      </div>

      <section class="movies" id="my-list">
        <span class="movies-tag">
          <ion-icon name="bookmark-outline"></ion-icon> Ma liste
        </span>
        <?php
        if(isset($_COOKIE['id'])) {
          if(isset($_SESSION['profile'])) {
            $profile = $_SESSION['profile'];
            myList($profile);
          } else {
            $profile = $userData['username'];
            myList($profile);
          }
        } else {
          ?>
          <p class="listLogin">Connectez-vous pour ajouter un film/série à votre liste.</p>
          <?php
        }
        ?>
      </section>


      <section class="movies">

        <!--
          - az list
        -->
        <div class="az-list">
          <a href="all"><div class="letter">#</div></a>
          <a href="letter/a"><div class="letter">A</div></a>
          <a href="letter/b"><div class="letter">B</div></a>
          <a href="letter/c"><div class="letter">C</div></a>
          <a href="letter/d"><div class="letter">D</div></a>
          <a href="letter/e"><div class="letter">E</div></a>
          <a href="letter/f"><div class="letter">F</div></a>
          <a href="letter/g"><div class="letter">G</div></a>
          <a href="letter/h"><div class="letter">H</div></a>
          <a href="letter/i"><div class="letter">I</div></a>
          <a href="letter/j"><div class="letter">J</div></a>
          <a href="letter/k"><div class="letter">K</div></a>
          <a href="letter/l"><div class="letter">L</div></a>
          <a href="letter/m"><div class="letter">M</div></a>
          <a href="letter/n"><div class="letter">N</div></a>
          <a href="letter/o"><div class="letter">O</div></a>
          <a href="letter/p"><div class="letter">P</div></a>
          <a href="letter/q"><div class="letter">Q</div></a>
          <a href="letter/r"><div class="letter">R</div></a>
          <a href="letter/s"><div class="letter">S</div></a>
          <a href="letter/t"><div class="letter">T</div></a>
          <a href="letter/u"><div class="letter">U</div></a>
          <a href="letter/v"><div class="letter">V</div></a>
          <a href="letter/w"><div class="letter">W</div></a>
          <a href="letter/x"><div class="letter">X</div></a>
          <a href="letter/y"><div class="letter">Y</div></a>
          <a href="letter/z"><div class="letter">Z</div></a>
        </div>

        <span class="movies-tag">
          <ion-icon name="add-outline"></ion-icon> Les derniers ajouts
        </span>

        <div class="movies-grid">
          <?= reqLastMovies(); ?>
        </div>

        <span class="movies-tag">
          <ion-icon name="star-outline"></ion-icon> Les plus populaires
          <a href="all">Voir tout</a>
        </span>

        <div class="movies-grid">

        <a href="video/spider-man-no-way-home">
          <div class="movie-card">
            <div class="card-head">
              <img src="assets/images/cover/spider-man-no-way-home.jpg" alt="Spider-Man: No Way Home" class="card-img">
              <div class="card-overlay">
                <div class="rating">
                  <ion-icon name="star-outline"></ion-icon>
                  <span>8.3</span>
                </div>
                <div class="play">
                  <ion-icon name="play-circle-outline"></ion-icon>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h3 class="card-title">Spider-Man: No Way Home</h3>
              <div class="card-info">
                <span class="genre">Action</span>
                <span class="year">2021</span>
              </div>
            </div>
          </div>
        </a>

        <a href="video/uncharted">
          <div class="movie-card">
            <div class="card-head">
              <img src="assets/images/cover/uncharted.jpg" alt="Uncharted" class="card-img">
              <div class="card-overlay">
                <div class="rating">
                  <ion-icon name="star-outline"></ion-icon>
                  <span>8.7</span>
                </div>
                <div class="play">
                  <ion-icon name="play-circle-outline"></ion-icon>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h3 class="card-title">Uncharted</h3>
              <div class="card-info">
                <span class="genre">Action, Aventure</span>
                <span class="year">2022</span>
              </div>
            </div>
          </div>
        </a>

        <a href="video/the-batman">
          <div class="movie-card">
            <div class="card-head">
              <img src="assets/images/cover/thebatman.jpg" alt="The Batman" class="card-img">
              <div class="card-overlay">
                <div class="rating">
                  <ion-icon name="star-outline"></ion-icon>
                  <span>8.8</span>
                </div>
                <div class="play">
                  <ion-icon name="play-circle-outline"></ion-icon>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h3 class="card-title">The Batman</h3>
              <div class="card-info">
                <span class="year">2022</span>
              </div>
            </div>
          </div>
        </a>

        <a href="video/fast-and-furius-9">
          <div class="movie-card">
            <div class="card-head">
              <img src="assets/images/cover/f&f9.jpg" alt="Fast and Furious 9" class="card-img">
              <div class="card-overlay">
                <div class="rating">
                  <ion-icon name="star-outline"></ion-icon>
                  <span>8.2</span>
                </div>
                <div class="play">
                  <ion-icon name="play-circle-outline"></ion-icon>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h3 class="card-title">Fast and Furious 9</h3>
              <div class="card-info">
                <span class="year">2021</span>
              </div>
            </div>
          </div>
        </a>

        <a href="video/venom-2">
          <div class="movie-card">
            <div class="card-head">
              <img src="assets/images/cover/venom2.jpg" alt="Venom : Let There Be Carnage" class="card-img">
              <div class="card-overlay">
                <div class="rating">
                  <ion-icon name="star-outline"></ion-icon>
                  <span>8.1</span>
                </div>
                <div class="play">
                  <ion-icon name="play-circle-outline"></ion-icon>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h3 class="card-title">Venom : Let There Be Carnage</h3>
              <div class="card-info">
                <span class="year">2021</span>
              </div>
            </div>
          </div>
        </a>

        <a href="video/dune">
          <div class="movie-card">
            <div class="card-head">
              <img src="assets/images/cover/dune.jpg" alt="Dune" class="card-img">
              <div class="card-overlay">
                <div class="rating">
                  <ion-icon name="star-outline"></ion-icon>
                  <span>8.1</span>
                </div>
                <div class="play">
                  <ion-icon name="play-circle-outline"></ion-icon>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h3 class="card-title">Dune</h3>
              <div class="card-info">
                <span class="year">2021</span>
              </div>
            </div>
          </div>
        </a>
        
        <a href="video/les-eternels">
          <div class="movie-card">
            <div class="card-head">
              <img src="assets/images/cover/les-eternels.jpg" alt="Les Éternels" class="card-img">
              <div class="card-overlay">
                <div class="rating">
                  <ion-icon name="star-outline"></ion-icon>
                  <span>7.5</span>
                </div>
                <div class="play">
                  <ion-icon name="play-circle-outline"></ion-icon>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h3 class="card-title">Les Éternels</h3>
              <div class="card-info">
                <span class="year">2021</span>
              </div>
            </div>
          </div>
        </a>

        </div>

      </section>

      <section class="movies">
        <span class="movies-tag">
          <ion-icon name="barbell-outline"></ion-icon> Action
          <a href="category/action">Voir tout</a>
        </span>

        <div class="movies-grid">
          <?php reqCategMovies('action'); ?>
        </div>
      </section>

      <section class="movies">
        <span class="movies-tag">
          <ion-icon name="airplane-outline"></ion-icon> Aventure
          <a href="category/aventure">Voir tout</a>
        </span>

        <div class="movies-grid">
          <?php reqCategMovies('aventure'); ?>
        </div>
      </section>

      <section class="movies">
        <span class="movies-tag">
          <ion-icon name="balloon-outline"></ion-icon> Horreur
          <a href="category/horreur">Voir tout</a>
        </span>

        <div class="movies-grid">
          <?php reqCategMovies('horreur'); ?>
        </div>
      </section>

      <section class="movies" id="marvel">
        <span class="movies-tag">
          <ion-icon name="hardware-chip-outline"></ion-icon> Marvel
          <a href="category/marvel">Voir tout</a>
        </span>

        <div class="movies-grid">
          <?php reqCategMovies('marvel'); ?>
        </div>
      </section>

      <section class="movies" id="harrypotter">
        <span class="movies-tag">
          <ion-icon name="color-wand-outline"></ion-icon> Harry Potter
          <a href="category/harrypotter">Voir tout</a>
        </span>

        <div class="movies-grid">
          <?php reqCategMovies('harrypotter'); ?>
        </div>
      </section>

      <section class="movies">
        <span class="movies-tag">
          <ion-icon name="videocam-outline"></ion-icon> Séries
        </span>
        <div class="movies-grid">
        <a href="show/malcolm">
            <div class="movie-card">
              <div class="card-head">
                <img src="assets/images/cover/malcolm.jpg" alt="Malcolm" class="card-img">
                <div class="card-overlay">
                  <div class="rating">
                    <ion-icon name="star-outline"></ion-icon>
                    <span>8.3</span>
                  </div>
                  <div class="play">
                    <ion-icon name="play-circle-outline"></ion-icon>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <h3 class="card-title">Malcolm</h3>
                <div class="card-info">
                  <span class="genre">Comédie</span>
                  <span class="year">2000-2006</span>
                </div>
              </div>
            </div>
          </a>
        </div>
      </section>

      <section class="movies">
        <span class="movies-tag">
          <ion-icon name="ticket-outline"></ion-icon> Avant première Pass+
        </span>
      </section>

      <section class="movies" id="soon">
        <span class="movies-tag">
          <ion-icon name="hourglass-outline"></ion-icon> Bientôt disponible
        </span>
        <?php require('core/soon.php'); ?>
      </section>

      <section class="movies cast">
        <span class="movies-tag">
          <ion-icon name="people-circle-outline"></ion-icon> Acteurs populaires
        </span>
        <div class="movie-cast">
          <a href="cast/tom-holland">
            <div class="actor" style="background-image: url(https://media.gqmagazine.fr/photos/62136e9a7062f69af08326cf/1:1/w_900,h_900,c_limit/tom%20holland%20cover.jpg)"></div>
          </a>
          <a href="cast/zendaya">
            <div class="actor" style="background-image: url(https://static.wikia.nocookie.net/disney/images/6/6d/Zendaya_2021.png)"></div>
          </a>
          <a href="cast/bryan-cranston">
            <div class="actor" style="background-image: url(https://fr.web.img4.acsta.net/pictures/19/10/23/12/10/3830800.jpg)"></div>
          </a>
          <a href="cast/mark-wahlberg">
            <div class="actor" style="background-image: url(https://fr.web.img6.acsta.net/pictures/17/07/12/16/23/035660.jpg)"></div>
          </a>
          <a href="cast/robert-pattinson">
            <div class="actor" style="background-image: url(https://cdn-elle.ladmedia.fr/var/plain_site/storage/images/people/la-vie-des-people/news/robert-pattinson-sa-petite-amie-suki-waterhouse-a-pleure-devant-the-batman-3993015/96143073-1-fre-FR/Robert-Pattinson-sa-petite-amie-Suki-Waterhouse-a-pleure-devant-The-Batman.jpg)"></div>
          </a>
          <a href="cast/timothee-chalamet">
            <div class="actor" style="background-image: url(https://fr.web.img5.acsta.net/pictures/21/07/13/15/57/1740452.jpg)"></div>
          </a>
        </div>
      </section>

      <table class="comparaison">
        <tr>
          <th style="width:50%">Fonctionnalités intégrées</th>
          <th><img src="assets/images/comparaison/tvf.png" alt=""></th>
          <th><small><i>Autre site<i/></small></th>
        </tr>
        <tr>
          <td>Films et séries</td>
          <td><ion-icon name="checkmark-outline" class="checked"></ion-icon></td>
          <td><ion-icon name="checkmark-outline" class="checked"></ion-icon></td>
        </tr>
        <tr>
          <td>Recherche par catégories</td>
          <td><ion-icon name="checkmark-outline" class="checked"></ion-icon></td>
          <td><ion-icon name="checkmark-outline" class="checked"></ion-icon></td>
        </tr>
        <tr>
          <td>Recherche par lettres</td>
          <td><ion-icon name="checkmark-outline" class="checked"></ion-icon></td>
          <td><ion-icon name="remove-outline" class="limited"></ion-icon></td>
        </tr>
        <tr>
          <td>Pass+</td>
          <td><ion-icon name="checkmark-outline" class="checked"></ion-icon></td>
          <td><ion-icon name="close-outline" class="cross"></ion-icon></td>
        </tr>
        <tr>
          <td>Design pensé pour l'ergonomie</td>
          <td><ion-icon name="checkmark-outline" class="checked"></ion-icon></td>
          <td><ion-icon name="remove-outline" class="limited"></ion-icon></td>
        </tr>
        <tr>
          <td>Système de compte utilisateur</td>
          <td><ion-icon name="checkmark-outline" class="checked"></ion-icon></td>
          <td><ion-icon name="remove-outline" class="limited"></ion-icon></td>
        </tr>
        <tr>
          <td>Système de profils</td>
          <td><ion-icon name="checkmark-outline" class="checked"></ion-icon></td>
          <td><ion-icon name="close-outline" class="cross"></ion-icon></td>
        </tr>
        <tr>
          <td>Système de liste de favoris</td>
          <td><ion-icon name="checkmark-outline" class="checked"></ion-icon></td>
          <td><ion-icon name="remove-outline" class="limited"></ion-icon></td>
        </tr>
        <tr>
          <td>Casting pour chaque films/séries</td>
          <td><ion-icon name="checkmark-outline" class="checked"></ion-icon></td>
          <td><ion-icon name="remove-outline" class="limited"></ion-icon></td>
        </tr>
        <tr>
          <td>Recherche de films/séries par acteur</td>
          <td><ion-icon name="checkmark-outline" class="checked"></ion-icon></td>
          <td><ion-icon name="close-outline" class="cross"></ion-icon></td>
        </tr>
        <tr>
          <td>Système de bases de données pour une utilisation rapide</td>
          <td><ion-icon name="checkmark-outline" class="checked"></ion-icon></td>
          <td><ion-icon name="remove-outline" class="limited"></ion-icon></td>
        </tr>
      </table>
    </main>

    <footer style="padding-bottom: 7px">
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