<?php

use KIJU\Controllers\Elements\SideBarController;
use KIJU\App;

$sideBarController = new SideBarController();
?>
<div class="sidebar">
   <div class="logo">
      <img src="https://about.kiju.me/assets/img/Social.png" alt="Kiju Beta">
   </div>
   <div class="links">
      <a href="/home" class="link <?= $sideBarController->isParamActive('home') ?>">
         <?= $sideBarController->getSVG('home', $sideBarController->isParamActive('home')) ?>
         <span>Accueil</span>
      </a>
      <a href="/discover" class="link <?= $sideBarController->isParamActive('discover') ?>">
         <?= $sideBarController->getSVG('discover', $sideBarController->isParamActive('discover')) ?>
         <span>Découvrir <sup>nouveau</sup></span>
      </a>

      <?php if (App::isLogged()) : ?>
         <a href="/communities" class="link <?= $sideBarController->isParamActive('communities') ?>">
            <?= $sideBarController->getSVG('communities', $sideBarController->isParamActive('communities')) ?>
            <span>Communautés</span>
         </a>
         <a href="#" class="modalBtn link <?= $sideBarController->isParamActive('verified') ?>" data-modal="plusModal">
            <?= $sideBarController->getSVG('verified', $sideBarController->isParamActive('verified')) ?>
            <span>Kiju+ <sup>bientôt</sup></span>
         </a>
         <a href="/user/<?= $sideBarController->getUsername() ?>" class="link <?= $sideBarController->isParamActive('profile') ?>">
            <?= $sideBarController->getSVG('user', $sideBarController->isParamActive('profile')) ?>
            <span>Profil</span>
         </a>
         <a href="https://account.kiju.me/ac" class="link <?= $sideBarController->isParamActive('settings') ?>">
            <?= $sideBarController->getSVG('settings', $sideBarController->isParamActive('settings')) ?>
            <span>Espace compte</span>
         </a>
         <a href="#" class="modalBtn" data-modal="addModal">
            <div class="link login">
               <span>Nouveau</span>
            </div>
         </a>
      <?php else : ?>
         <a onclick="authPopup()" class="link login">
            <span>Connexion avec Kiju ID</span>
         </a>
      <?php endif; ?>
   </div>
   <div class="footer">
      <ul>
         <li><a href="https://about.kiju.me/" target="_blank"><span>About</span></a></li>
         <li><a href="" target="_blank"><span>Terms</span></a></li>
         <li><a href="" target="_blank"><span>Privacy</span></a></li>
         <li><span>Help</span></li>
         <li><span>Report Abuse</span></li>
         <li><span>&copy; Kiju.</span></li>
      </ul>
   </div>
</div>