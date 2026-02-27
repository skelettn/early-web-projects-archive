<?php
require('lg/id/profilbd.php');
?>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Service de gestion de liens | Coolink</title>
      <link rel="icon" href="style/img/favicon.png" sizes="32x32" type="image/png">
      <link rel="stylesheet" href="content/css/bootstrap.min.css">
      <link rel="stylesheet" href="content/css/5283295-Coolink-Homepage.css" />
      <link rel="stylesheet" href="style/FSKim/FSKim.css" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://kit.fontawesome.com/d749d58854.js" crossorigin="anonymous"></script>
   </head>
   <body>

      <nav class="music-navbar navbar navbar-expand-lg navbar-light">
         <div class="container">
            <a class="navbar-brand" href="Home"><img src="content/img/newCoolink/small/coolink_wsmall.png" alt="Coolink"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
               <ul class="navbar-nav">
                  <li class="nav-item">
                     <a class="music-nav-link nav-link l1" href=""><i class="fas fa-globe"></i> FR</a>
                  </li>
                  <li class="nav-item">
                     <a class="music-nav-link nav-link l1" href="discover">Découvrir</a>
                  </li>
                  <li class="nav-item">
                     <a class="music-nav-link nav-link l1" href="">Coolink Music</a>
                  </li>
                  <li class="nav-item">
                     <a class="music-nav-link nav-link l1" href="plus">Tarifs</a>
                  </li>
                  <?php
                  if(!isset($_SESSION['id'])) {
                  ?>
                  <li class="nav-item">
                     <a class="music-nav-link nav-link l1" href="login">Connexion</a>
                  </li>
                  <li class="nav-item">
                     <a class="music-nav-link nav-link l1" href="join">Inscription</a>
                  </li>
                  <?php
                  } else {
                  ?>
                  <li class="nav-item">
                     <a class="music-nav-link nav-link l1" href="dashboard/">Dashboard</a>
                  </li>
                  <?php
                  }
                  ?>
               </ul>
            </div>
         </div>
      </nav>

      <header class="music-header primary-color">
         <div class="container py-11">
            <div class="text-center">
               <h2 class="music-header-title">Vous faites de la musique ?</h2>
               <h4 class="music-header-sub">Voici qui devrait vous redonner le sourire</h4>
            </div>
         </div>
      </header>

      <section class="music-features">
         <div class="container py-11">
            <h1 class="music__h1">Coolink existe aussi pour vous</h1>   
            <div class="music-row">
               <div class="music-card mc-music">
                  <div class="music-icon music-music">
                     <i class="fas fa-music fa-4x"></i>
                  </div>
                  <div class="music-card-title">
                     Crée pour la musique
                  </div>
                  <div class="music-card-desc">
                     Une offre conçu pour les personnes de la musique
                  </div>
               </div>
               <div class="music-card mc-edit">
                  <div class="music-icon music-edit">
                     <i class="fas fa-edit fa-4x"></i>
                  </div>
                  <div class="music-card-title">
                     100% personnalisable
                  </div>
                  <div class="music-card-desc">
                     Nous sommes axés sur la personnalisation tout comme l'est Coolink
                  </div>
               </div>
               <div class="music-card mc-dollar">
                  <div class="music-icon music-dollar">
                     <i class="fas fa-dollar-sign fa-4x"></i>
                  </div>
                  <div class="music-card-title">
                     Tarif faible
                  </div>
                  <div class="music-card-desc">
                     Le prix de Coolink Music est le même que Coolink Plus avec autant de fonctionnalités
                  </div>
               </div>
            </div>
         </div>
      </section>

      <section class="price">
            <div class="container">
               <h1 class="price__h1">COOLINK Music = COOLINK Plus</h1>
               <p>Notre tarifs Coolink Music et Coolink Plus sont les mêmes</p>
               <div class="row mt-4">
                  <div class="col-md-6">
                  <div class="card card-shadow border-0 mb-4">
                     <div class="card-body p-4">
                        <div class="d-flex align-items-center">
                        <h5 class="font-weight-medium mb-0">COOLINK Music</h5>
                        <div class="ml-auto"><span class="badge badge-exclu p-2 ">CONÇU POUR LA MUSIQUE</span></div>
                        </div>
                        <div class="row">
                        <div class="col-lg-5 text-center">
                           <div class="price-box my-3">
                           <sup>€</sup><span class="text-dark display-5">3.99</span>
                              <h6 class="font-weight-light pb-2">/ mois</h6>
                              <a class="btn btn-info-gradiant border-0 font-14 text-white p-3 btn-block mt-3" href="#">Choisir cette offre </a>
                           </div>
                        </div>
                        <div class="col-lg-7 align-self-center">
                           <ul class="list-inline pl-3 font-14 font-weight-medium text-dark">
                              <li class="py-2"><i class="fas fa-check text-info mr-2 pt-2"></i> <span> Pages à l'infini !</span></li>
                              <li class="py-2"><i class="fas fa-check text-info mr-2"></i> <span>Design conçu pour la musique</span></li>
                              <li class="py-2"><i class="fas fa-check text-info mr-2"></i> <span>Preview de son ou d'album</span></li>
                              <li class="py-2"><i class="fas fa-check text-info mr-2"></i> <span>Support prioritaire 24/7</span></li>
                           </ul>
                        </div>
                        </div>
                     </div>
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="card card-shadow border-0 mb-4">
                     <div class="card-body p-4">
                        <div class="d-flex align-items-center">
                        <h5 class="font-medium m-b-0">COOLINK+</h5>
                        <div class="ml-auto"><span class="badge badge-exclu p-2 ">CONÇU POUR TOUS</span></div>
                        </div>
                        <div class="row">
                        <div class="col-lg-5 text-center">
                           <div class="price-box my-3">
                              <sup>€</sup><span class="text-dark display-5">3.99</span>
                              <h6 class="font-weight-light pb-2">/ mois</h6>
                              <a class="btn btn-info-gradiant border-0 font-14 text-white p-3 btn-block mt-3" href="plus">Voir +</a>
                           </div>
                        </div>
                        <div class="col-lg-7 align-self-center">
                           <ul class="list-inline pl-3 font-14 font-weight-medium text-dark">
                              <li class="py-2"><i class="fas fa-check text-info mr-2 pt-2"></i> <span>Liens à l'infini !</span></li>
                              <li class="py-2"><i class="fas fa-check text-info mr-2"></i> <span>+ de 10 thèmes, 10 polices d'écriture et +</span></li>
                              <li class="py-2"><i class="fas fa-check text-info mr-2"></i> <span>Accès en avance aux nouvelles features</span></li>
                              <li class="py-2"><i class="fas fa-check text-info mr-2"></i> <span>Support prioritaire 24/7 </span></li>
                           </ul>
                        </div>
                        </div>
                     </div>
                  </div>
               </div>
               <a href="" class="promo-code">J'ai un code de promotion</a>
            </div>
        </section>

        <footer class="page-footer font-small indigo footer-link">
          <div class="text-center justify-content-center mt-4">
              <img class="modal-offer-logo" src="https://i.ibb.co/hR7gPdD/hypera-small.png">
          </div>
          <div class="container">
              <div class="row text-center d-flex justify-content-center pt-5 mb-3">
                <div class="col-md-2 mb-3">
                    <h6 class="text-uppercase font-weight-bold"><a href="about">À propos</a></h6>
                </div>
                <div class="col-md-2 mb-3">
                    <h6 class="text-uppercase font-weight-bold"><a href="premium/">COOLINK Plus</a></h6>
                </div>
                <div class="col-md-2 mb-3">
                    <h6 class="text-uppercase font-weight-bold"><a href="about">Légal</a></h6>
                </div>
                <div class="col-md-2 mb-3">
                    <h6 class="text-uppercase font-weight-bold"><a href="hc/">Aide</a></h6>
                </div>
                <div class="col-md-2 mb-3">
                    <h6 class="text-uppercase font-weight-bold"><a href="mailto:kilianpeyn@gmail.com">Contact</a></h6>
                </div>
              </div>
              <hr class="rgba-white-light" style="margin: 0 15%;">
              <hr class="clearfix d-md-none rgba-white-light" style="margin: 10% 15% 5%;">
          </div>
          <div class="footer-copyright text-center py-3">
              <span class="white" style="font-size: 10px;">© 2021 published by Hypera Entertainment. All rights reserved. All trademarks are property of their respective owners.</span>
          </div>
        </footer>

        <script src="content/js/bootstrap.min.js"></script>
        <script src="content/js/main.js"></script>
   </body>
</html>
