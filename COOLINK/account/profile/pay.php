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
    <title>COOLINK · Pay</title>
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
                <div class='sidebar__menu-item'>
                    <i class="fas fa-share-alt"></i>
                    Comptes liés
                </div>
            </a>
            <a href="pay">
                <div class='sidebar__menu-item sidebar__menu-item--active'>
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
                <h2>Informations de paiement</h2>
            </div>
            <div class='main__content'>
                <div class='main__settings-form'>
                    <form action='' method='post'>
                        <div class="row mb-4">
                            <div class="col-sm-7">
                                <div class="card settings--card">
                                    <div class="card-body mt-2">
                                        <!-- <p class="payment--info">
                                            Abonnement en cours:&nbsp;
                                            <?php
                                            if($userinfo['premium'] == '1') {
                                                echo '<u>COOLINK PLUS</u>';
                                            } else {
                                                echo '<u>COOLINK FREE</u>';
                                            }
                                            ?>
                                        </p> -->
                                        <hr>
                                        <div id="mail--info">
                                            <label class='main__input-label'>Moyen de paiement</label>
                                            <p class="info--mail pl-1">
                                                Paypal <small>(yourmail@hypr.li)</small>
                                                <button class="card--button">PLUS D'INFOS</button>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-7">
                                <div class="card settings--card">
                                    <div class="card-body mt-2">
                                        <p class="info--title">INFORMATIONS</p>
                                        <hr>
                                        <p class="info--link pl-1">HYPERA ID ? <a href=""
                                                class="float-right pr-4 external--link"><i
                                                    class="fas fa-external-link-alt"></i></a></p>
                                        <hr>
                                        <p class="info--link pl-1">FAQ <a href=""
                                                class="float-right pr-4 external--link"><i
                                                    class="fas fa-external-link-alt"></i></a></p>
                                        <hr>
                                        <p class="info--link pl-1">Besoin d'aide ? <a href=""
                                                class="float-right pr-4 external--link"><i
                                                    class="fas fa-external-link-alt"></i></a></p>
                                    </div>
                                </div>
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