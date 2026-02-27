<!-- /*COPYRIGHT Hypera.*/ -->
<?php
require('lg/id/profilbd.php');

$reqLink = $bdd->prepare("SELECT * FROM firelink WHERE website_statut = 1 LIMIT 30");
$reqLink->execute();
$LinkFetch = $reqLink->fetchAll();
?>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Découvrir | Coolink</title>
      <link rel="icon" href="content/Homepage-Images/favicon.png" sizes="32x32" type="image/png">
      <link rel="stylesheet" href="content/css/bootstrap.min.css">
      <link rel="stylesheet" href="content/css/8938584-Modern-Coolink.css" />
      <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script> 
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
      <link rel="stylesheet" href="content/css/minimal.css">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&display=swap" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://kit.fontawesome.com/d749d58854.js" crossorigin="anonymous"></script>
   </head>
   <body>
      <nav class="navbar navbar-expand-lg navbar-light">
         <div class="container">
            <a class="navbar-brand mx-auto" href="index"><img src="content/img/newCoolink/small/coolink_bsmall.png" alt="Coolink"></a>
         </div>
      </nav>
      <div class="container" id="discover">
         <h1 class="discover">Créé avec coolink.</h1>
         <div class="row pt-3">
            <?php
            foreach ($LinkFetch as $lf) {
            ?>
            <div class="col-sm-4 col-md-2 text-center mb-3">
               <a href="<?= $lf['pseudo'] ?>">
                  <div class="card discover-card discover-<?= $lf['website_theme'] ?>">
                     <div class="card-body">
                        <h5 class="discover-card-title"><?= $lf['website_title'] ?></h5>
                     </div>
                  </div>
               </a>
            </div>
            <?php
            }
            ?>
         </div>
      </div>
      <div class="container">
         <h1 class="discover">Découvrez du monde.</h1>
         <div class="row pt-3">
            <?php
            foreach ($LinkFetch as $lf) {
            ?>
            <div class="col-sm-4 col-md-2 text-center mb-3">
               <a href="account/profile/<?= $lf['unique_id'] ?>">
                  <div class="card discover-people-card">
                     <div class="card-body">
                        <?php
                        $p = $lf['pseudo'];
                        if(file_exists("dashboard/public/website_picture/". $lf['id'] . "/" . $lf['website_picture']) && isset($lf['website_picture'])) {
                        ?>
                        <img src="<?= "dashboard/public/website_picture/". $lf['id'] . "/" . $lf['website_picture']; ?>" class="avatar">
                        <?php
                        } else {
                        ?>
                        <div class="avatar--default"><?= $p[0] ?></div>
                        <?php
                        }
                        ?>
                        <h5 class="text-center"><?= $lf['pseudo'] ?></h5>
                     </div>
                  </div>
               </a>
            </div>
            <?php
            }
            ?>
         </div>
      </div>

      <div class="end-discover-section"></div>
      <section id="footer">
         <div class="container footer">
            <ul class="links">
               <li><a href="index">Accueil</a></li>
               <li><a href="join">Commencer</a></li>
               <li><a href="login">Connexion</a></li>
               <li><a href="about">A-propos</a></li>
               <li><a href="hc/">Besoin d'aide</a></li>
            </ul>
         </div>
      </section>
    <script src="content/js/bootstrap.min.js"></script>
   </body>
</html>