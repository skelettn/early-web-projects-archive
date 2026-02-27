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

      <nav class="plus-navbar navbar navbar-expand-lg navbar-light">
         <div class="container">
            <a class="navbar-brand" href="Home"><img src="content/img/newCoolink/small/coolink_wsmall.png" alt="Coolink"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
               <ul class="navbar-nav">
                  <li class="nav-item">
                     <a class="plus-nav-link nav-link l1" href=""><i class="fas fa-globe"></i> FR</a>
                  </li>
                  <li class="nav-item">
                     <a class="plus-nav-link nav-link l1" href="discover">Découvrir</a>
                  </li>
                  <li class="nav-item">
                     <a class="plus-nav-link nav-link l1" href="music">Coolink Music</a>
                  </li>
                  <li class="nav-item">
                     <a class="plus-nav-link nav-link l1" href="plus">Tarifs</a>
                  </li>
                  <?php
                  if(!isset($_SESSION['id'])) {
                  ?>
                  <li class="nav-item">
                     <a class="plus-nav-link nav-link l1" href="login">Connexion</a>
                  </li>
                  <li class="nav-item">
                     <a class="plus-nav-link nav-link l1" href="join">Inscription</a>
                  </li>
                  <?php
                  } else {
                  ?>
                  <li class="nav-item">
                     <a class="plus-nav-link nav-link l1" href="dashboard/">Dashboard</a>
                  </li>
                  <?php
                  }
                  ?>
               </ul>
            </div>
         </div>
      </nav>

      <header class="plus-header primary-color">
         <div class="container py-11">
            <div class="text-center">
               <h2 class="plus-header-title">Avec PLUS de FONCTIONNALITÉS c'est MIEUX NON ?</h2>
               <h4 class="plus-header-sub">Choisissez le plan qui vous convient le mieux</h4>
            </div>
         </div>
      </header>

        <section class="price">
            <div class="container">
               <h1 class="price__h1">Derniers jours de promotion</h1>
               <p>Notre promotion sur l'abonnement+ se termine bientôt</p>
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
                              <a class="btn btn-info-gradiant border-0 font-14 text-white p-3 btn-block mt-3" href="music">Voir +</a>
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
                              <a class="btn btn-info-gradiant border-0 font-14 text-white p-3 btn-block mt-3" href="#">Choisir cette offre </a>
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

        <section class="faq bg-white" id="services">
            <div class="container">
               <div class="mt-5"></div>
               <h1 class="faq__h1">Des questions ? On a des réponses</h1>
               <div id="accordion">
                  <div align="center">
                     <div style="width: 70%;">
                        <div class="card">
                           <div class="card-header">
                              <a class="card-link" data-toggle="collapse" href="#free">
                                 Puis-je utiliser COOLINK gratitement ?
                              </a>
                           </div>
                           <div id="free" class="collapse" data-parent="#accordion">
                              <div class="card-body">
                                COOLINK propose une offre gratuite à vie. Vous pouvez vous inscire dès maintenant sans carte de crédit.
                              </div>
                           </div>
                        </div>
                        <div class="card">
                           <div class="card-header">
                              <a class="card-link" data-toggle="collapse" href="#collapseOne">
                                 Le prix de l'abonnement est-t-il fixe ?
                              </a>
                           </div>
                           <div id="collapseOne" class="collapse" data-parent="#accordion">
                              <div class="card-body">
                                 Exactement, le tarif de COOLINK reste fixe à vie !
                              </div>
                           </div>
                        </div>
                        <div class="card">
                           <div class="card-header">
                              <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                                 Comment puis-je annuler mon abonnement ?
                              </a>
                           </div>
                           <div id="collapseThree" class="collapse" data-parent="#accordion">
                              <div class="card-body">
                                 Dans la page ABONNEMENT de votre profil
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
        </section>

        <section class="start">
          <div class="container">
              <div class="row text-center align-items-center justify-content-center start-card">
                <h2 class="start-section-title"><span class="bold">COOLINK est gratuit</span> aussi longtemps que vous voulez</h2>
                <a href="join" class="btn btn-dark mg-btn start-btn">
                    Commencer
                </a>
                <span class="mt-4">Gratuit à vie, pas besoin de carte de crédit</span>
              </div>
          </div>
        </section>

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
         <script src="content/js/main.js"></script>
   </body>
</html>
