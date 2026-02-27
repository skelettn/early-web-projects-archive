<?php
require('recup_id.php');

if(!isset($userinfo['pseudo'])) {
    exit;
}

$p = $userinfo['pseudo'];

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $userinfo['pseudo']; ?> · HYPERA ID</title>
    <link rel="stylesheet" href="../../styles/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/main.css">
    <link rel="stylesheet" href="../style/edit.css">
    <link rel="stylesheet" href="../style/profil_banner.css">
    <link rel="stylesheet" href="profile_page.css">

    <link rel="icon" href="../../content/img/HYPERA ID/favicon.png" sizes="32x32" type="image/png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d749d58854.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand brand-centered bg-grey" href="#"><img
                    src="../../content/img/HYPERA ID/small/smallv2.png" alt="HYPERA ID"></a>
        </div>
    </nav>
    <nav class="beta-section pl-3 pr-3">
        <div class="container">
            <div class="welcome-title">
                B E T A
            </div>
        </div>
    </nav>
    <div class='container-body'>
        <div class='sidebar'>
            <div class='sidebar__header mt-2'>
                <?php
                    if($userinfo['avatar'] == "") {
                        echo '
                        <div class="sidebar__avatar_default">
                            '.$p[0].'
                        </div>';
                    }
                    if($userinfo['avatar'] != "") {
                        echo '<img alt="" class="sidebar__avatar" src="../public/avatars/'.$userinfo['id'].'/'.$userinfo['avatar'].'">';
                    }
                ?>
            </div>
            <p class="sidebar-user--id text-center">
                <?php echo $userinfo['pseudo']; ?>#ID<?php echo $userinfo['id']; ?>
            </p>
            <p class="sidebar__desc">
                Etudiant, debutant back-end 💻
            </p>
            <a href="../../<?php echo $userinfo['pseudo']; ?>">
                <div class='sidebar__menu-item'>
                    <i class="fas fa-external-link-alt"></i>
                    Page COOLINK
                </div>
            </a>
            <a href="">
                <div class='sidebar__menu-item'>
                    <i class="fas fa-comments"></i>
                    Discuter
                </div>
            </a>
        </div>
        <div class='main'>
            <div class='main__content'>
                <div class='main__settings-form'>
                    <form action='' method='post'>
                        <div class="text-center private--section">
                            <i class="fas fa-lock fa-4x private--profil"></i>
                            <p class="private--text">CLASSIFIED</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="settings-grey-logo-container">
        <img src="../../content/img/HYPERA/v2/small/small3.png">
    </div>
    <p class="app-version">v0.7.1</p>
    <script src="../../styles/js/bootstrap.min.js"></script>
</body>

</html>

<!-- Made by COOLINK and Bootstrap v5 -->