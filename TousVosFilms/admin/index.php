<?php
require('../core/functions.php');
require('3bMG1vWgr3UVQRU8TJSugDkMK2hPzyk.php');
require('modal/addMoviesModal.php');
require('modal/editMoviesModal.php');
require('modal/addActorModal.php');
require('modal/editActorModal.php');
require('modal/successModal.php');
require('modal/errorModal.php');
fetchUserData();
checkLevel();
if(isset($_POST['addMoviesSubmit'])) {
    $name = $_POST['name'];
    $cover = $_POST['cover'];
    $background = $_POST['background'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $stars = $_POST['stars'];
    $date = $_POST['date'];
    $type = $_POST['type'];
    $showname = $_POST['showname'];
    $nbseason = $_POST['nbseason'];
    $season = $_POST['season'];
    $director = $_POST['director'];
    $genre = $_POST['genre'];
    $category = $_POST['category'];
    $cast = $_POST['cast'];
    $link = $_POST['link'];
    insertMovie($name,$cover,$background,$title,$description,$stars,$date,$type,$showname,$nbseason,$season,$director,$genre,$category,$cast,$link);
}
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
  <meta content="https://i.ibb.co/Dp1M7Pc/social2.png" name="image">
  <link rel="shortcut icon" href="./assets/images/icon.png" type="image/png">
  <title>Tous 🍿 Vos Films &raquo; Regardez Des Films &amp; Séries GRATUITEMENT En Ligne!</title>
  <link rel="stylesheet" href="../assets/css/main.css">
  <link rel="stylesheet" href="../assets/css/admin.css">
  <link rel="stylesheet" href="../assets/css/media_query.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,regular,500,600,700,800,900" rel="stylesheet" />
</head>

<body>
    <div id="admin">
        <div class="adminNav">
            <a href="../logout" class="logout"><ion-icon name="exit"></ion-icon></a>
            <a href="../home"><img src="../assets/images/logo_loader.png" alt="Tous Vos Films" class="logo"></a>
            <span class="powered">by <img src="../assets/images/about_footer.png" alt="comett"></span>
        </div>
        <div id="adminMain">
            <div class="welcome">TOUS VOS FILMS V0.85 <span>| BIENVENUE, <?= $userData['username'] ?></span></div>
            <div id="adminSideBarMobile">
                <div class="adminSideBarLink current"><span>Vue d'ensemble</span></div>
                <a href="../"><div class="adminSideBarLink"><span>Retour au site</span> <ion-icon name="chevron-forward-outline"></ion-icon></div></a>
            </div>
            <div class="adminGrid">
                <div class="adminGrid1">
                    <div class="movies-shows">
                        <div class="title">Films/séries | <a href="#addMoviesModal" class="add"><ion-icon name="add-outline"></ion-icon></a> <a href="#editMoviesModal" class="add"><ion-icon name="create-outline"></ion-icon></a></div>
                        <div class="tab">
                            <table id="movies-shows">
                                <tr>
                                    <th>Nom</th>
                                    <th>Titre</th>
                                    <th>Lien</th>
                                </tr>
                                <?php
                                reqMovies();
                                ?>
                            </table>
                        </div>
                    </div>
                    <div class="data">
                        <div class="title">Données</div>
                        <div class="tab">
                            <table id="data">
                            <tr>
                                <th>Nom d'utilisateur</th>
                                <th>Email</th>
                                <th>TVF PLUS</th>
                                <th>PERMISSION</th>
                            </tr>
                            <?php
                                reqUsers();
                            ?>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="adminGrid2">
                    <div class="cast">
                        <div class="title">Acteurs | <a href="#addActorModal" class="add"><ion-icon name="add-outline"></ion-icon></a> <a href="#editActorModal" class="add"><ion-icon name="create-outline"></ion-icon></a></div>
                        <div class="tab ct">
                            <table id="movies-shows">
                                <tr>
                                    <th>Nom</th>
                                    <th>Titre</th>
                                    <th>PP</th>
                                </tr>
                                <?php
                                reqCast();
                                ?>
                            </table>
                        </div>
                    </div>
                    <div class="settings">
                        <div class="title">Paramètres</div>
                        <div class="tab st">
                            <div class="infos">
                                <h1>SITE WEB</h1>
                                <div class="info">
                                    <span class="status">En ligne</span>
                                    <?php
                                    if (getLevel() == '3') {
                                        echo "<a href='#' class='disabled' disabled title='Permission refusée.'>Modifier</a>";
                                    } else {
                                        echo "<a href=''>Modifier</a>";
                                    }
                                    ?>
                                </div>
                                <div class="info">
                                    <h1 style="margin-right:auto;">accès</h1>
                                    <?php
                                    if (getLevel() == '3') {
                                        echo "<a href='#' class='disabled' disabled title='Permission refusée.'>Modifier</a>";
                                    } else {
                                        echo "<a href=''>Modifier</a>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

  <script src="../assets/js/main.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
