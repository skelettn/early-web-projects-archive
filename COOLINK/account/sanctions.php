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
        <title>HYPERA ID · Mes sanctions</title>
        <link rel="stylesheet" href="../styles/css/bootstrap.min.css">
        <link rel="stylesheet" href="style/main.css">
        <link rel="stylesheet" href="../styles/fonts/inter/inter.css">

        <link rel="icon" href="../content/img/HYPERA ID/favicon.png" sizes="32x32" type="image/png">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/d749d58854.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">
            <div class="container">
              <a class="navbar-brand brand-centered bg-grey" href="#"><img src="style/logo.png" alt="Firelink"></a>
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
            <div class="row">
                <div class="card col-sm modern-card text-center mt-4">
                    <div class="modern-card-header">
                        <div class="return-title text-left">
                            <a href="../account/" class="btn btn-outline-dark btn-sm mr-2">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                             Mes sanctions | [<b>0</b>]
                        </div>
                        <div class="reload-button text-right mb-5"><a href="" class="btn-grad">ACTUALISER</a></div>
                    </div>
                    <div class="modern-card-content text-center mb-5">
                        <table class="table mb-4">
                            <thead>
                              <tr>
                                <th scope="col">#id</th>
                                <th scope="col">Motif</th>
                                <th scope="col">Date</th>
                                <th scope="col">Annulation</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">1</th>
                                <td>Aucun</td>
                                <td>Aucune</td>
                                <td>Aucune</td>
                              </tr>
                            </tbody>
                          </table>
                        <div class="card-text-sm-bold">Bravo ! Vous n'avez commis aucune infraction</div>
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

<!-- Made by Firelink and Bootstrap v5 -->