<?php
require('../id/profilbd.php');
if(!isset($_SESSION['id'])) {
    header('location: ../sign-in?lang=fr_FR');
}

$p = $userinfo['pseudo'];


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COOLINK · Connexions</title>
    <link rel="stylesheet" href="../../styles/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/main.css">
    <link rel="stylesheet" href="../style/edit.css">
    <link rel="stylesheet" href="../../styles/fonts/inter/inter.css">

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
            <div class="float-right">
                <a href="settings"><button class="settings-btn-side"><i class='fa fa-cog'></i></button></a>
            </div>
            <br>
            <div class='sidebar__header mt-2'>
            <?php
                if(file_exists("../public/avatars/". $userinfo['id'] . "/" . $userinfo['avatar']) && isset($userinfo['avatar'])){
            ?>
                <img src="<?= "../public/avatars/". $userinfo['id'] . "/" . $userinfo['avatar']; ?>" class="sidebar__avatar">
            <?php
                } else {
                    echo '<div class="sidebar__avatar_default">'.$p[0].'</div>';
                }
            ?>
            </div>
            <p class="sidebar-user--id text-center">
                <?php echo $userinfo['pseudo']; ?>#ID<?php echo $userinfo['id']; ?>
            </p>
            <a href="../">
                <div class='sidebar__menu-item'>
                    <i class="fas fa-house-user"></i>
                    Accueil
                </div>
            </a>
            <a href="general">
                <div class='sidebar__menu-item'>
                    <i class='fa fa-user'></i>
                    Général
                </div>
            </a>
            <a href="avatar">
                <div class='sidebar__menu-item'>
                    <i class='fa fa-portrait'></i>
                    Avatar
                </div>
            </a>
            <a href="linked">
                <div class='sidebar__menu-item sidebar__menu-item--active'>
                    <i class="fas fa-share-alt"></i>
                    Comptes liés
                </div>
            </a>
            <a href="pay">
                <div class='sidebar__menu-item'>
                    <i class='fa fa-wallet'></i>
                    Paiement
                </div>
            </a>
            <div class='sidebar__menu-item'>
                <i class='fa fa-info'></i>
                Aide
            </div>
        </div>
        <div class='main'>
            <div class='main__header'>
                <h2>Connexions</h2>
            </div>
            <div class='main__content'>
                <p>Utilisez les onglets ci-dessous pour gérer les autorisations d'accès aux applications et les comptes
                    liés. Consultez notre politique de confidentialité.</p>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="card mb-3">
                            <div class="card-body linked-card">
                                <h5 class="card-title"><img class="card-logo--twitter"
                                        src="https://i.ibb.co/RC2ycjY/Twitter-Bird-svg.png"></h5>
                                <p class="card-text pt-3">COOLINK</p>
                                <a href="#" class="btn-grad" style="opacity: 0.5;">SE DÉCONNECTER</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card mb-3">
                            <div class="card-body linked-card">
                                <h5 class="card-title"><img class="card-logo"
                                        src="https://i.ibb.co/tKWhvdK/Google-G-Logo-svg.png"></h5>
                                <p class="card-text pt-3">Google</p>
                                <a href="#" class="btn-grad">SE CONNECTER</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card mb-3">
                            <div class="card-body linked-card">
                                <h5 class="card-title"><img class="card-logo"
                                        src="https://i.ibb.co/LvFWwLS/unnamed.png"></h5>
                                <p class="card-text pt-3">Facebook</p>
                                <a href="#" class="btn-grad">SE CONNECTER</a>
                            </div>
                        </div>
                    </div>
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