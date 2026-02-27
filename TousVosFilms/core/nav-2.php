<header class="">
    <div class="navbar">

        <button class="navbar-menu-btn">
          <span class="one"></span>
          <span class="two"></span>
          <span class="three"></span>
        </button>

        <a href="../all?type=movie" class="navbar-mb-l navbar-mb-l1">Films</a>

        <a href="../" class="navbar-brand">
          <img src="../assets/images/logo_loader.png" alt="Tous Vos Films" class="navbar-logo">
        </a>

        <a href="../all?type=show" class="navbar-mb-l navbar-mb-l2">Séries</a>

        <nav class="">
          <ul class="navbar-nav">

            <li> <a href="../all?type=movie" class="navbar-link">Films</a> </li>
            <li> <a href="../all?type=show" class="navbar-link">Séries</a> </li>
            <li> <a href="https://discord.gg/ynj2hdSguJ" class="navbar-link" target="_blank">Pass+</a> </li>
            <li> <a href="https://discord.gg/ynj2hdSguJ" class="navbar-link" target="_blank">Discord</a> </li>

          </ul>
        </nav>

        <div class="navbar-actions">
          <?php
          if(!isset($_COOKIE['id'])) {
          ?>
          <a href="../auth" class="navbar-signin">
            <span>Connexion</span>
            <ion-icon name="log-in-outline"></ion-icon>
          </a>
          <?php 
          } else {
          ?>
          <a href="../account" class="navbar-signin">
            <div class="navCoinsImg"><img src="../assets/images/icons/coin.png"></div>
            <span class="navCoinsSpan"><?= $userData['tvf_coin'] ?></span>
          </a>
          <a href="../account" class="navbar-signin">
            <?php
            if(isset($_SESSION['profile'])) {
              if($_SESSION['profile'] != $userData['username']) {
                $reqAvatar = $db->prepare("SELECT * FROM profile WHERE name = ? AND uid = ?");
                $reqAvatar->execute(array($_SESSION['profile'], $userData['unique_id']));
                $pAvatar = $reqAvatar->fetch();
                if($pAvatar['avatar'] == '') {
                  echo '<div class="profilesModalProfileAvatar"><img src="../assets/images/avatar/1.png"></div>';
                } else {
                  echo '<div class="profilesModalProfileAvatar"><img src="../assets/images/avatar/'.$pAvatar['avatar'].'.png"></div>';
                }
              } else {
                echo '<div class="profilesModalProfileAvatar"><img src="../assets/images/avatar/1.png"></div>';
              }
            } else {
              echo '<div class="profilesModalProfileAvatar"><img src="../assets/images/avatar/1.png"></div>';
            }
            ?>
            <span><?= htmlentities($_SESSION['profile']) ?></span>
          </a>
          <?php
          }
          ?>

        </div>

    </div>
</header>
<div class="nav-mobile">
  <div class="icons">
    <a href="../"><ion-icon name="home-outline"></ion-icon><p>Accueil</p></a>
    <a href="../#soon"><ion-icon name="hourglass-outline"></ion-icon><p>Bientôt</p></a>
    <a href="../#my-list"><ion-icon name="bookmark-outline"></ion-icon><p>Ma liste</p></a>
    <?php
    if(isset($_SESSION['profile'])) {
      if($_SESSION['profile'] != $userData['username']) {
        $reqAvatar = $db->prepare("SELECT * FROM profile WHERE name = ? AND uid = ?");
        $reqAvatar->execute(array($_SESSION['profile'], $userData['unique_id']));
        $pAvatar = $reqAvatar->fetch();
        if($pAvatar['avatar'] == '') {
          echo '<a href="../account"><div class="profilesModalProfileAvatar profileAvatarMobile"><img src="../assets/images/avatar/1.png"></div></a>';
        } else {
          echo '<a href="../account"><div class="profilesModalProfileAvatar profileAvatarMobile"><img src="../assets/images/avatar/'.$pAvatar['avatar'].'.png"></div></a>';
        }
      } else {
        echo '<a href="../account"><div class="profilesModalProfileAvatar profileAvatarMobile"><img src="../assets/images/avatar/1.png"></div></a>';
      }
    } else {
      echo '<a href="../account"><div class="profilesModalProfileAvatar profileAvatarMobile"><img src="../assets/images/avatar/1.png"></div></a>';
    }
    ?>
  </div>
</div>