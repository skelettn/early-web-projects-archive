<?php

use KIJU\Controllers\HomeController;
use KIJU\App;

$homeController = new HomeController();
$posts = $homeController->getAllPosts();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
   $homeController->managePosts();
}

if (App::isLogged()) {
   if (!empty($homeController->getProfilePicture())) {
      $profile_picture = $homeController->getProfilePicture();
   }
} else {
   $profile_picture = 'https://assets.kiju.me/img/avatar-default-ptzr6kmg652a2w4lsbc7yrspm9r4z4y5wcvej6fgkg.png';
}
?>
<div class="feed">
   <?php if (!App::isLogged()) : ?>
      <div class="fixed-infos">
         <span>Connectez-vous pour accéder à Kiju.</span>
         <div class="actions">
            <button class="login" onclick="authPopup()">Connexion/Inscription</button>
         </div>
      </div>
   <?php else : ?>
      <div class="fixed-infos">
         <div class="new-post modalBtn" data-modal="postModal">
            <form action="">
               <div class="profile-picture" style="margin-right: 10px; background-image: url('<?= $profile_picture ?>');"></div>
               <input type="text" name="" id="" value="Quoi de neuf ?">
               <button type="button" disabled>Publier</button>
            </form>
         </div>
      </div>
   <?php endif; ?>
   <div class="tabs" id="kiju_homepage_show_categories" style="display: none" ;>
      <div class="tab active">
         <img src="https://assets.kiju.me/img/icons/explore.svg" alt="Discover">
         <span>Découvrir</span>
      </div>
      <div class="tab">
         <img src="https://assets.kiju.me/img/icons/write.svg" alt="Posts">
         <span>Publications</span>
      </div>
      <div class="tab">
         <img src="https://assets.kiju.me/img/icons/video.svg" alt="Videos">
         <span>Vidéos</span>
      </div>
      <div class="tab">
         <img src="https://assets.kiju.me/img/icons/picture.svg" alt="Pictures">
         <span>Images</span>
      </div>
   </div>

   <?php require('templates/components/post-skeleton.php'); ?>
   <div id="existing-posts">
      <?php foreach ($posts as $post) : ?>
         <?php require('templates/components/post.php'); ?>
      <?php endforeach; ?>
      <div id="new-posts"></div>
   </div>
</div>