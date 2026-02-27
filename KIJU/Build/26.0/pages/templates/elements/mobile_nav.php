<?php

use KIJU\App;
use KIJU\Controllers\Elements\MobileNavController;

$mobileNavController = new MobileNavController();
?>
<div class="mobile-nav">
   <ul>
      <li class="icon"><a href="/home" aria-label="Accueil"><?= $mobileNavController->getSVG('home', $mobileNavController->isParamActive('home')) ?></a></li>
      <li class="icon"><a href="/discover" aria-label="Découvrir"><?= $mobileNavController->getSVG('discover', $mobileNavController->isParamActive('discover')) ?></a></li>

      <?php if (App::isLogged()) : ?>
         <li class="mobileNew modalBtn" data-modal="addModal">
            <div class="icon"><img src="https://assets.kiju.me/img/icons/plus.svg" alt="New"></div>
         </li>
      <?php endif; ?>

      <li class="icon"><a href="/communities" aria-label="Communautés"><?= $mobileNavController->getSVG('communities', $mobileNavController->isParamActive('communities')) ?></a></li>

      <?php if (App::isLogged()) : ?>
         <li class="user">
            <a href="/user/<?= $mobileNavController->getUsername() ?>" aria-label="Mon profil">
               <?php if (!empty($mobileNavController->getProfilePicture())) : ?>
                  <img src="<?= $mobileNavController->getProfilePicture() ?>" alt="<?= $mobileNavController->getUsername() ?>">
               <?php endif; ?>
            </a>
         </li>
      <?php else : ?>
         <li class="user">
            <a onclick="authPopup()" aria-label="Connexion">
               <img src="https://assets.kiju.me/img/avatar-default-ptzr6kmg652a2w4lsbc7yrspm9r4z4y5wcvej6fgkg.png" alt="ProfilePicture">
            </a>
         </li>
      <?php endif; ?>
   </ul>
</div>