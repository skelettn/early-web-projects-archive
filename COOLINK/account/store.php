<?php
require('id/profilbd.php');
if(!isset($_SESSION['id'])) {
    header('location: ../lg/signin?lang=fr_FR');
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Firelink · Général</title>
    <link rel="stylesheet" href="../styles/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="style/edit.css">
    <link rel="stylesheet" href="../styles/fonts/inter/inter.css">

    <link rel="icon" href="../content/img/HYPERA ID/favicon.png" sizes="32x32" type="image/png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d749d58854.js" crossorigin="anonymous"></script>
</head>

<body class="shop__body">
    <nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand brand-centered bg-grey shop__nav" href="#"><img
                    src="style/hypera__wstore.png" alt="HYPERA ID"></a>
        </div>
    </nav>
    <nav class="beta-section shop__bs pl-3 pr-3">
        <div class="container">
            <div class="welcome-title">
                B E T A
            </div>
        </div>
    </nav>
    <div class='container-body'>
        <div class='shop__main'>
            <div class='main__content'>
                <div class="float-right">
                    <ul class="shop__ul">
                        <li>Mon compte</li>
                        <li class="active">HYPERA SHOP</li>
                    </ul>
                </div>
                <div class="mt-5"></div>
                <div class='main__shop-form'>
                    <form action='' method='post'>
                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <div class="card shop__card mb-3">
                                    <img src="stores/thumbail/soon.png" style="width:100%;height:100%;margin: 0 auto; text-align:center;">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="card shop__card mb-3">
                                    <img src="stores/thumbail/soon.png" style="width:100%;height:100%;margin: 0 auto; text-align:center;">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="card shop__card mb-3">
                                    <img src="stores/thumbail/soon.png" style="width:100%;height:100%;margin: 0 auto; text-align:center;">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="card shop__card mb-3">
                                    <img src="stores/thumbail/soon.png" style="width:100%;height:100%;margin: 0 auto; text-align:center;">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="card shop__card mb-3">
                                    <img src="stores/thumbail/soon.png" style="width:100%;height:100%;margin: 0 auto; text-align:center;">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="card shop__card">
                                    <img src="stores/thumbail/soon.png" style="width:100%;height:100%;margin: 0 auto; text-align:center;">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-4">
                            <div class="col-sm-2">
                                <div class="card shop__card mb-3">
                                    <img src="stores/thumbail/legendary-coin.png" style="width:100%;height:100%;margin: 0 auto; text-align:center;">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="card shop__card mb-3">
                                    <img src="stores/thumbail/soon.png" style="width:100%;height:100%;margin: 0 auto; text-align:center;">
                                </div>
                            </div>
                        </div>
                    </form>
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