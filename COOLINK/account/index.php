<?php
require('id/profilbd.php');

if(!isset($_SESSION['id'])) {
    header('location: ../lg/signin?lang=fr_FR');
}

if($userinfo['prenomfamille'] == "") {
    header("location: ../setup/step-1");
}
  
if($userinfo['pseudo'] == "") {
    header("location: ../setup/step-1");
}

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HYPERA ID · Général</title>
        <link rel="stylesheet" href="../styles/css/bootstrap.min.css">
        <link rel="stylesheet" href="style/main.css">
        <link rel="stylesheet" href="../styles/fonts/inter/inter.css">

        <link rel="icon" href="../content/img/HYPERA ID/favicon.png" sizes="32x32" type="image/png">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/d749d58854.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top bg-grey">
            <div class="container">
                <a class="navbar-brand brand-centered bg-grey" href="#"><img src="../content/img/HYPERA ID/small/smallv2.png" alt="HYPERA ID"></a>
            </div>
        </nav>
        <nav class="beta-section pl-3 pr-3">
            <div class="container">
                <div class="welcome-title">
                    B E T A
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-5">
                    <div class="card col-sm modern-card text-center mt-5 ">
                        <div class="modern-card-header">
                            <div class="return-title text-left">
                                 Informations générales
                            </div>
                        </div>
                        <div class="modern-card-content">
                            <p class="text-left float-left mt-2 bold pr-4">Nom d'utilisateur:</p>
                            <p class="text-right float-left mt-2"><?php echo $userinfo['pseudo']; ?></p>
                            <a href="profile/general" class="float-right text-decoration-none">Modifier</a>
                            <br>
                            <div class="mt-4"><hr></div>
                            <p class="text-left float-left mt-2 bold pr-4">Date d'inscription:</p>
                            <p class="text-right float-left mt-2"><?php echo $userinfo['registerdate']; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card col-sm modern-card text-center  mt-5">
                        <div class="modern-card-header">
                            <div class="return-title text-left">
                                 Informations personelles
                            </div>
                        </div>
                        <div class="modern-card-content">
                            <p class="text-left float-left mt-2 bold pr-4">Adresse e-mail:</p>
                            <a href="profile/general" class="float-right mt-2 text-decoration-none link">Modifier</a>
                            <br>
                            <div class="mt-4"><hr></div>
                            <p class="text-left float-left mt-2 bold pr-4">Mon profil</p>
                            <a href="profile/<?php echo $userinfo['unique_id']; ?>" class="float-right text-decoration-none link">Voir</a> 
                            <a class="float-right text-decoration-none link">&nbsp;/&nbsp;</a>
                            <a href="profile/general" class="float-right text-decoration-none link">Modifier</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center align-items-center">
                <div class="col-md-5">
                    <div class="card col-sm modern-card-plus text-center mt-5">
                        <div class="modern-card-header">
                            <img src="style/firelink+.png">
                        </div>
                        <div class="modern-card-content mt-3 mb-3">
                            <a data-toggle="modal" data-target="#upgradeModal" class="btn-primary btn-plus btn-lg pl-5 pr-5" style="font-weight: 625;">A M E L I O R E R</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card col-sm modern-card text-center mt-5">
                        <div class="modern-card-header">
                            <div class="return-title text-left">
                                 Sécurité
                            </div>
                        </div>
                        <div class="modern-card-content">
                            <p class="text-left float-left bold pr-4">Mot de passe:</p>
                            <p class="text-right float-left">*******</p>
                            <a href="profile/settings" class="float-right text-decoration-none link">Modifier</a>
                            <br> 
                            <div class="mt-4"><hr></div>
                            <p class="text-left float-left mt-2 bold pr-4">Question de sécurité:</p>
                            <a href="profile/settings" class="float-right text-decoration-none link">Modifier</a>
                            <br>
                            <div class="mt-4"><hr></div>
                            <p class="text-center mt-2 bold"><a href="../help/" class="text-decoration-none link">Besoin d'aide ?</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center align-items-center">
                <div class="col-md-5">
                    <div class="card col-sm modern-card text-center mt-5">
                        <div class="modern-card-header">
                            <div class="return-title text-left">
                                 Redirection
                            </div>
                        </div>
                        <div class="modern-card-content">
                            <p class="text-center bold"><a href="../dashboard/" class="text-decoration-none link">Dashboard</a> / <a href="../" class="text-decoration-none link">Accueil</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card col-sm modern-card text-center mt-5">
                        <div class="modern-card-header">
                            <div class="return-title text-left">
                                 Modération
                            </div>
                        </div>
                        <div class="modern-card-content">
                            <p class="text-center bold"><a href="sanctions" class="text-decoration-none link">Voir mes banissements</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="upgradeModal" tabindex="-1" role="dialog" aria-labelledby="upgradeModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content upgrade--modal">
                <div class="modal-body">
                    <p style="text-align:center">Redirection vers la page de paiement...</p>
                    <div class="before-loader"></div>
                        <div class="lds-ripple">
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                    <button type="button" class="btn-grad">Continuer</button>
                </div>
            </div>
        </div>
        </div>

        <div class="settings-grey-logo-container">
            <img src="../content/img/HYPERA/v2/small/small3.png">
        </div>
        <p class="app-version">v0.7.1</p>
        <script src="../styles/js/bootstrap.min.js"></script>
    </body>
</html>

<!-- Make by Firelink and Bootstrap v5 -->