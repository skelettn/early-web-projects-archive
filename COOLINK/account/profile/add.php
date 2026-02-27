<?php
require('../id/profilbd.php');
if(!isset($_SESSION['id'])) {
    header('location: ../sign-in?lang=fr_FR');
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COOLINK · Général</title>
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
            <a class="navbar-brand brand-centered bg-grey" href="#"><img src="../../content/img/HYPERA ID/small/smallv2.png" alt="HYPERA ID"></a>
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
                if(file_exists("../public/avatars/". $_SESSION['id'] . "/" . $_SESSION['avatar']) && isset($_SESSION['avatar'])){
            ?>
                <img src="<?= "../public/avatars/". $_SESSION['id'] . "/" . $_SESSION['avatar']; ?>" class="sidebar__avatar">
            <?php
                } else {
            ?>
                <img src="../public/avatars/defaults/default.png" class="sidebar__avatar">
            <?php
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
            <div class='main__content'>
                <div class="container-fluid mb-4">
                    <img src="../style/pay.png" class="pay-img">
                </div>
                <div class="text-center mb-5">
                    <span class="pay--title">
                        Ajouter un moyen de paiement | <img class="img-responsive pull-right"
                            src="http://i76.imgup.net/accepted_c22e0.png">
                    </span><br>
                    <span class="pay--desc">
                        Ajoutez un moyen de paiement pour payer plus rapidement
                    </span>
                </div>
                <div class="row">
                    <div class="col-lg-7 mx-auto">
                        <div class="bg-white rounded-lg shadow-sm p-5">
                            <ul role="tablist" class="nav bg-light nav-pills rounded-pill nav-fill mb-3">
                                <li class="nav-item">
                                    <a data-toggle="pill" href="#nav-tab-card" class="nav-link active rounded-pill">
                                        <i class="fa fa-credit-card"></i>
                                        Carte de crédit
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a data-toggle="pill" href="#nav-tab-paypal" class="nav-link rounded-pill">
                                        <i class="fa fa-paypal"></i>
                                        Paypal
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div id="nav-tab-card" class="tab-pane fade show active">
                                    <p class="alert alert-success">Some text success or error</p>
                                    <form role="form">
                                        <div class="form-group">
                                            <label for="username">Nom complet (sur la carte)</label>
                                            <input type="text" name="username" placeholder="Jason Doe" required
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="cardNumber">Numéro de carte</label>
                                            <div class="input-group">
                                                <input type="text" name="cardNumber" placeholder="Votre numéro de carte"
                                                    class="form-control" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text text-muted">
                                                        <i class="fa fa-cc-visa mx-1"></i>
                                                        <i class="fa fa-cc-amex mx-1"></i>
                                                        <i class="fa fa-cc-mastercard mx-1"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <label><span class="hidden-xs">Expiration</span></label>
                                                    <div class="input-group">
                                                        <input type="number" placeholder="MM" name=""
                                                            class="form-control" max="12" required>
                                                        <input type="number" placeholder="YY" name=""
                                                            class="form-control" max="30" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group mb-4">
                                                    <label data-toggle="tooltip"
                                                        title="Three-digits code on the back of your card">CVV
                                                        <i class="fa fa-question-circle"></i>
                                                    </label>
                                                    <input type="text" required class="form-control" max="999" maxlength="3">
                                                </div>
                                            </div>

                                        </div>
                                        <button type="button"
                                            class="subscribe btn btn-primary btn-block rounded-pill shadow-sm"> Valider
                                        </button>
                                        <a href="pay"
                                            class="subscribe btn btn-secondary btn-block rounded-pill shadow-sm"> Retour
                                        </a>
                                    </form>
                                </div>

                                <div id="nav-tab-paypal" class="tab-pane fade">
                                    <p>Paypal is easiest way to pay online</p>
                                    <p>
                                        <button type="button" class="btn btn-primary rounded-pill"><i
                                                class="fa fa-paypal mr-2"></i> Log into my Paypal</button>
                                    </p>
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                                        do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    </p>
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