<?php
require('lg/id/profilbd.php');
?>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Service de gestion de liens | Coolink</title>
      <link rel="icon" href="content/Homepage-Images/favicon.png" sizes="32x32" type="image/png">
      <link rel="stylesheet" href="content/css/bootstrap.min.css">
      <link rel="stylesheet" href="content/css/5283295-Coolink-Homepage.css" />
      <link rel="stylesheet" href="content/fonts/FSKim/FSKim.css" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://kit.fontawesome.com/d749d58854.js" crossorigin="anonymous"></script>
   </head>
   <body>

      <nav class="navbar navbar-expand-lg nav-fixed navbar-light">
         <div class="container">
            <a class="navbar-brand" href=""><img src="content/img/newCoolink/small/coolink_bsmall.png" alt="Coolink"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
               <ul class="navbar-nav">
                  <li class="nav-item">
                     <a class="nav-link l1" href=""><i class="fas fa-globe"></i> FR</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link l1" href="discover">Découvrir</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link l1" href="music">Coolink Music</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link l1" href="plus">Tarifs</a>
                  </li>
                  <?php
                  if(!isset($_SESSION['id'])) {
                  ?>
                  <li class="nav-item">
                     <a class="nav-link l1" href="login">Connexion</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link l1" href="join">Inscription</a>
                  </li>
                  <?php
                  } else {
                  ?>
                  <li class="nav-item">
                     <a class="nav-link l1" href="dashboard/">Dashboard</a>
                  </li>
                  <?php
                  }
                  ?>
               </ul>
            </div>
         </div>
      </nav>

      <header class="page-header primary-color">
         <div class="container py-11">
            <div class="text-center">
               <h2 class="header-title">Votre lien, vos choix.</h2>
               <h4 class="header-sub">La meilleure solution pour gérer vos liens</h4>
               <p><span class="header-features"><i class="fas fa-check"></i>&nbsp;&nbsp; Gratuit à vie <small>*1</small></span></p>
               <p><span class="header-features"><i class="fas fa-check"></i>&nbsp;&nbsp; Personnalisable à 100% <small>*2</small></span></p>
               <p><span class="header-features"><i class="fas fa-check"></i>&nbsp;&nbsp; Réducteur d'URL inclus <small>*3</small></span></p>
               <a href="join" class="header-btn">
                  Profitez de 1 mois d'essai offert
               </a>
            </div>
         </div>
      </header>

      <section class="icons">
         <div class="container">
            <div class="row text-center mt-5">
               <h2 class="sec-titl">Fonctionnalités Coolink</h2>
               <p class="sec-desc">Voici une grande partie de nos fonctionnalités</p>
               <div class="col-md-4">
                  <div class="icon mb-4">
                     <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-brush" fill="#0093E9" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M15.825.12a.5.5 0 0 1 .132.584c-1.53 3.43-4.743 8.17-7.095 10.64a6.067 6.067 0 0 1-2.373 1.534c-.018.227-.06.538-.16.868-.201.659-.667 1.479-1.708 1.74a8.117 8.117 0 0 1-3.078.132 3.658 3.658 0 0 1-.563-.135 1.382 1.382 0 0 1-.465-.247.714.714 0 0 1-.204-.288.622.622 0 0 1 .004-.443c.095-.245.316-.38.461-.452.393-.197.625-.453.867-.826.094-.144.184-.297.287-.472l.117-.198c.151-.255.326-.54.546-.848.528-.739 1.2-.925 1.746-.896.126.007.243.025.348.048.062-.172.142-.38.238-.608.261-.619.658-1.419 1.187-2.069 2.175-2.67 6.18-6.206 9.117-8.104a.5.5 0 0 1 .596.04zM4.705 11.912a1.23 1.23 0 0 0-.419-.1c-.247-.013-.574.05-.88.479a11.01 11.01 0 0 0-.5.777l-.104.177c-.107.181-.213.362-.32.528-.206.317-.438.61-.76.861a7.127 7.127 0 0 0 2.657-.12c.559-.139.843-.569.993-1.06a3.121 3.121 0 0 0 .126-.75l-.793-.792zm1.44.026c.12-.04.277-.1.458-.183a5.068 5.068 0 0 0 1.535-1.1c1.9-1.996 4.412-5.57 6.052-8.631-2.591 1.927-5.566 4.66-7.302 6.792-.442.543-.796 1.243-1.042 1.826a11.507 11.507 0 0 0-.276.721l.575.575zm-4.973 3.04l.007-.005a.031.031 0 0 1-.007.004zm3.582-3.043l.002.001h-.002z"/>
                     </svg>
                  </div>
                  <h3 class="icon-title">Personnalisable à 100%</h3>
                  <p class="icon-description">Personnalisez l'ensemble de votre site, de la couleur du boutton à votre la police d'écriture et bien plus !</p>
               </div>
               <div class="col-md-4">
                  <div class="icon mb-4">
                     <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cloud-download" fill="#0093E9" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z"/>
                        <path fill-rule="evenodd" d="M7.646 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V5.5a.5.5 0 0 0-1 0v8.793l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z"/>
                     </svg>
                  </div>
                  <h3 class="icon-title">Toujours à jour</h3>
                  <p class="icon-description">Vous aurez toujours des nouveautés disponible GRATUITEMENT</p>
               </div>
               <div class="col-md-4">
                  <div class="icon mb-4">
                     <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-badge" fill="#0093E9" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M2 2.5A2.5 2.5 0 0 1 4.5 0h7A2.5 2.5 0 0 1 14 2.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2.5zM4.5 1A1.5 1.5 0 0 0 3 2.5v10.795a4.2 4.2 0 0 1 .776-.492C4.608 12.387 5.937 12 8 12s3.392.387 4.224.803a4.2 4.2 0 0 1 .776.492V2.5A1.5 1.5 0 0 0 11.5 1h-7z"/>
                        <path fill-rule="evenodd" d="M8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM6 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5z"/>
                     </svg>
                  </div>
                  <h3 class="icon-title">Page de profil</h3>
                  <p class="icon-description">Nous sommes entrain de créer une page de profil spectaculaire pour affichez toutes vos informations et plus encore !</p>
               </div>
            </div>
            <div class="row text-center mt-5">
               <div class="col-md-4">
                  <div class="icon mb-4">
                     <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-lock" fill="#0093E9" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M11.5 8h-7a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1zm-7-1a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-7zm0-3a3.5 3.5 0 1 1 7 0v3h-1V4a2.5 2.5 0 0 0-5 0v3h-1V4z"/>
                     </svg>
                  </div>
                  <h3 class="icon-title">Sécurité</h3>
                  <p class="icon-description">Notre but premier est faire de COOLINK une plate-forme sécurisée, c'est pourquoi nous avons mis au point un système de signalement et de confirmation pour chaque page présente sur notre site</p>
               </div>
               <div class="col-md-4">
                  <div class="icon mb-4">
                     <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="#0093E9" class="bi bi-life-preserver" viewBox="0 0 16 16">
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm6.43-5.228a7.025 7.025 0 0 1-3.658 3.658l-1.115-2.788a4.015 4.015 0 0 0 1.985-1.985l2.788 1.115zM5.228 14.43a7.025 7.025 0 0 1-3.658-3.658l2.788-1.115a4.015 4.015 0 0 0 1.985 1.985L5.228 14.43zm9.202-9.202-2.788 1.115a4.015 4.015 0 0 0-1.985-1.985l1.115-2.788a7.025 7.025 0 0 1 3.658 3.658zm-8.087-.87a4.015 4.015 0 0 0-1.985 1.985L1.57 5.228A7.025 7.025 0 0 1 5.228 1.57l1.115 2.788zM8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                     </svg>
                  </div>
                  <h3 class="icon-title">Support</h3>
                  <p class="icon-description">Nous avons crée un centre d'aide performant qui répond à vos questions et problèmes.</p>
               </div>
               <div class="col-md-4">
                  <div class="icon mb-4">
                     <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chat-square-text" fill="#0093E9" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h2.5a2 2 0 0 1 1.6.8L8 14.333 9.9 11.8a2 2 0 0 1 1.6-.8H14a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2.5a1 1 0 0 1 .8.4l1.9 2.533a1 1 0 0 0 1.6 0l1.9-2.533a1 1 0 0 1 .8-.4H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                        <path fill-rule="evenodd" d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                     </svg>
                  </div>
                  <h3 class="icon-title">Retours</h3>
                  <p class="icon-description">COOLINK est à ses débuts, vos retours sont donc très importants. Laissez un avis en bas de la page.</p>
               </div>
            </div>
            <div class="row text-center mt-5">
               <div class="col-md-4">
                  <div class="icon mb-4">
                     <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-credit-card" fill="#0093E9" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z"/>
                        <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z"/>
                     </svg>
                  </div>
                  <h3 class="icon-title">Des achats facilités</h3>
                  <p class="icon-description">COOLINK ne vous demanderas jamais directement votre carte de crédit, les paiements se passent via des services externe fiable.</p>
               </div>
               <div class="col-md-4">
                  <div class="icon mb-4">
                     <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-card-text" fill="#0093E9" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                        <path fill-rule="evenodd" d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                     </svg>
                  </div>
                  <h3 class="icon-title">Multilingue</h3>
                  <p class="icon-description">Multilingue
                     Il est important pour nous de créer un site internet mondiale, c'est pourquoi nous prenons en charge le français, l'anglais et toujours plus à l'avenir.
                  </p>
               </div>
               <div class="col-md-4">
                  <div class="icon mb-4">
                     <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-people" fill="#0093E9" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1h7.956a.274.274 0 0 0 .014-.002l.008-.002c-.002-.264-.167-1.03-.76-1.72C13.688 10.629 12.718 10 11 10c-1.717 0-2.687.63-3.24 1.276-.593.69-.759 1.457-.76 1.72a1.05 1.05 0 0 0 .022.004zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10c-1.668.02-2.615.64-3.16 1.276C1.163 11.97 1 12.739 1 13h3c0-1.045.323-2.086.92-3zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                     </svg>
                  </div>
                  <h3 class="icon-title">Communauté</h3>
                  <p class="icon-description">Notre but premier faire de COOLINK et Hypera une Communauté mondiale, rejoignez-la maintenant</p>
               </div>
            </div>
        </section>

        <section class="text-center" id="demos">
          <div class="container">
            <h2 class="sec-titl">Voici un p'tit aperçu de ce que vous pouvez faire</h2>
            <a href="demo" class="btn btn-outline-secondary mt-4">
              Accéder à la démo
            </a>
          </div>
        </section>

        <section class="services bg-white" id="services">
          <div class="container">
             <div class="mt-5"></div>
              <div class="row align-items-center justify-content-center">
                <div class="col-md-5 services-block">
                    <h1 class="services-title">Obtenez plus de trafic depuis les réseaux sociaux</h1>
                    <span>Grâce à notre service utilisez plus qu'un seul lien pour regrouper du monde sur vos réseaux.</span>
                    <span>Créez plus de 10 liens gratuitement et postez votre lien Coolink sur votre réseau social favoris</span>
                </div>
                <div class="col-md-5"><img src="style/img/Social_Media_Two_Color.svg" alt="Services" class="img-services"></div>
                <div class="col-md-5"><img src="style/img/Currency_Flatline.svg" alt="Services" class="img-services mb-5"></div>
                <div class="col-md-5 services-block">
                    <h1 class="services-title">Augmentez vos revenues</h1>
                    <span>Créez-vous du nouveau traffic grâce à Coolink et augmentez donc vos revenues grâce à tous vos liens !</span>
                </div>
                <div class="col-md-5 services-block">
                    <h1 class="services-title">Support professionnel</h1>
                    <span>Notre équipe de spécialistes résoudra les problèmes techniques pour que votre page soit opérationnel. A tout moment.</span>
                </div>
                <div class="col-md-5"><img src="style/img/Customer_Service_Two_Color.svg" alt="Services" class="img-services"></div>
                <div class="mt-5"></div>
              </div>
          </div>
        </section>

        <!-- <section class="price">
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
        </section> -->

        <section class="price">
            <div class="container">
               <h1 class="price__h1">Derniers jours de promotion</h1>
               <p class="pb-5">Notre promotion sur l'abonnement+ se termine bientôt</p>
               <div class="pricing pricing-palden">
            <div class="pricing-item features-item ja-animate" data-animation="move-from-bottom" data-delay="item-0" style="min-height: 497px;">
                <div class="pricing-deco">
                    <svg class="pricing-deco-img" enable-background="new 0 0 300 100" height="100px" id="Layer_1" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" x="0px" xml:space="preserve" y="0px">
                        <path class="deco-layer deco-layer--1" d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="#FFFFFF" opacity="0.6"></path>
                        <path class="deco-layer deco-layer--2" d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="#FFFFFF" opacity="0.6"></path>
                        <path class="deco-layer deco-layer--3" d="M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716H42.401L43.415,98.342z" fill="#FFFFFF" opacity="0.7"></path>
                        <path class="deco-layer deco-layer--4" d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="#FFFFFF"></path>
                    </svg>
                    <div class="pricing-price"><span class="pricing-currency">$</span>29
                        <span class="pricing-period">/ mo</span>
                    </div>
                    <h3 class="pricing-title">Freelance</h3>
                </div>
                <ul class="pricing-feature-list">
                    <li class="pricing-feature">1 GB of space</li>
                    <li class="pricing-feature">Support at $25/hour</li>
                    <li class="pricing-feature">Limited cloud access</li>
                </ul>
                <button class="pricing-action">Choose plan</button>
            </div>
            <div class="pricing-item features-item ja-animate pricing__item--featured" data-animation="move-from-bottom" data-delay="item-1" style="min-height: 497px;">
                <div class="pricing-deco" style="background: linear-gradient(135deg,#a93bfe,#584efd)">
                    <svg class="pricing-deco-img" enable-background="new 0 0 300 100" height="100px" id="Layer_1" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" x="0px" xml:space="preserve" y="0px">
                        <path class="deco-layer deco-layer--1" d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="#FFFFFF" opacity="0.6"></path>
                        <path class="deco-layer deco-layer--2" d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="#FFFFFF" opacity="0.6"></path>
                        <path class="deco-layer deco-layer--3" d="M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716H42.401L43.415,98.342z" fill="#FFFFFF" opacity="0.7"></path>
                        <path class="deco-layer deco-layer--4" d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="#FFFFFF"></path>
                    </svg>
                    <div class="pricing-price"><span class="pricing-currency">$</span>59
                        <span class="pricing-period">/ mo</span>
                    </div>
                    <h3 class="pricing-title">Business</h3>
                </div>
                <ul class="pricing-feature-list">
                    <li class="pricing-feature">5 GB of space</li>
                    <li class="pricing-feature">Support at $5/hour</li>
                    <li class="pricing-feature">Full cloud access</li>
                </ul>
                <button class="pricing-action">Choose plan</button>
            </div>
            <div class="pricing-item features-item ja-animate" data-animation="move-from-bottom" data-delay="item-2" style="min-height: 497px;">
                <div class="pricing-deco">
                    <svg class="pricing-deco-img" enable-background="new 0 0 300 100" height="100px" id="Layer_1" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" x="0px" xml:space="preserve" y="0px">
                        <path class="deco-layer deco-layer--1" d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="#FFFFFF" opacity="0.6"></path>
                        <path class="deco-layer deco-layer--2" d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="#FFFFFF" opacity="0.6"></path>
                        <path class="deco-layer deco-layer--3" d="M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716H42.401L43.415,98.342z" fill="#FFFFFF" opacity="0.7"></path>
                        <path class="deco-layer deco-layer--4" d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="#FFFFFF"></path>
                    </svg>
                    <div class="pricing-price"><span class="pricing-currency">$</span>99
                        <span class="pricing-period">/ mo</span>
                    </div>
                    <h3 class="pricing-title">Enterprise</h3>
                </div>
                <ul class="pricing-feature-list">
                    <li class="pricing-feature">10 GB of space</li>
                    <li class="pricing-feature">Support at $5/hour</li>
                    <li class="pricing-feature">Full cloud access</li>
                </ul>
                <button class="pricing-action">Choose plan</button>
            </div>
        </div>
               
               <a href="" class="promo-code mt-4">J'ai un code de promotion</a>
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
                              <a class="card-link" data-toggle="collapse" href="#collapseOne">
                                 Le prix de l'abonnement est-t-il fixe ?
                              </a>
                           </div>
                           <div id="collapseOne" class="collapse show" data-parent="#accordion">
                              <div class="card-body">
                                 Exactement, le tarif de COOLINK reste fixe à vie !
                              </div>
                           </div>
                        </div>
                        <div class="card">
                           <div class="card-header">
                              <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                                 Quelle(s) sont les avantages du premium ?
                              </a>
                           </div>
                           <div id="collapseTwo" class="collapse" data-parent="#accordion">
                              <div class="card-body">
                                 Les avantages sont <a href="plus" style="color:#001d2f;!important"><u>ici</u></a>
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
