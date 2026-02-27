<?php
require('id/profilbd.php');
require('../plugins/FireCore.php');

if($userinfo['prenomfamille'] == "") {
  header("location: ../setup/step-1");
}

if($userinfo['pseudo'] == "") {
    header("location: ../setup/step-1");
}

if($userinfo['website_title'] == "" || $userinfo['website_description'] == "") {
    header("location: ../setup/step-2");
}


$p = $userinfo['prenomfamille'];


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>COOLINK</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="dash_files/dark_dash.css">
    <link rel="stylesheet" href="dash_files/dash.css">

    <link rel="icon" href="../content/img/newCoolink/coolink-social.png" type="image/png">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body>

    <div id="offer+" class="modal-offer modal-window">
        <div>
            <a href="#" title="Close" class="modal-close">Fermer</a>
            <p class="p-offer">Redirection vers la page de paiement...</p>
            <div class="lds-ripple">
                <div></div>
                <div></div>
            </div>
            <div class="mt-2"></div>
            <a href="" class="btn-grad">Continuer</a>
        </div>
    </div>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3><img src="../content/img/newCoolink/small/coolink_bsmall.png"></h3>
                <strong>C</strong>
            </div>

            <ul class="list-unstyled components">
                <li class="active">
                    <a href="../">
                        <i class="fas fa-home"></i><span>Accueil</span>
                    </a>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-user-edit"></i><span>Mon COOLINK</span>
                    </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="my-coolink">Modifier mon COOLINK</a>
                        </li>
                        <li>
                            <a href="../<?php echo $userinfo['pseudo']; ?>">Accéder à mon COOLINK</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="../plus">
                        <i class="fas fa-plus"></i><span>COOLINK +</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="fas fa-music"></i><span>COOLINK Music</span>
                    </a>
                </li>
                <li>
                    <a href="../account/">
                        <i class="fas fa-cog"></i><span>Paramètres</span>
                    </a>
                </li>
                <hr>
                <li>
                    <a href="">
                        <i class="fas fa-moon"></i><span>Mode sombre</span>
                        <!-- Color code 1: #121212
                        Color code 2: #1B1B1B -->
                    </a>
                </li>
                <li>
                    <a href="../hc/">
                        <i class="fas fa-life-ring"></i><span>Besoin d'aide ?</span>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-open-menu">
                        <i class="fas fa-align-left"></i>
                        <span>Femer/Ouvrir</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <div class="dropdown">
                                <button class="btn account-group" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php
                                    if(file_exists("public/website_picture/". $userinfo['id'] . "/" . $userinfo['website_picture']) && isset($userinfo['website_picture'])) {
                                    ?>
                                    <img src="<?= "public/website_picture/". $userinfo['id'] . "/" . $userinfo['website_picture']; ?>" class="navbar-avatar">
                                    <?php
                                    } else if (!empty($userinfo['website_picture'])) {
                                            echo '<div class="avatar--default">'.$p[0].'</div>';
                                    } else if (empty($userinfo['website_title'])) {
                                        echo '<div class="avatar--default">?</div>';
                                    } else {
                                        echo '<div class="mt-1 avatar--default">'.$p[0].'</div>';
                                    }
                                    ?>
                                    <a class="nav-link nav-name" href="#"><?=  $userinfo['prenomfamille'] ?></a>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <div class="dropdown-profil bb-s">

                                    <?php
                                    if(file_exists("public/website_picture/". $userinfo['id'] . "/" . $userinfo['website_picture']) && isset($userinfo['website_picture'])) {
                                    ?>
                                    <img src="<?= "public/website_picture/". $userinfo['id'] . "/" . $userinfo['website_picture']; ?>" class="navbar-avatar">&nbsp;
                                    <?php
                                    } else if (!empty($userinfo['website_picture'])) {
                                            echo '<div class="avatar--default">'.$p[0].'</div>&nbsp;&nbsp;';
                                    } else if (empty($userinfo['website_title'])) {
                                        echo '<div class="avatar--default">?</div>&nbsp;&nbsp;';
                                    } else {
                                        echo '<div class="avatar--default mt-2">'.$p[0].'</div>&nbsp;&nbsp;';
                                    }
                                    ?>
                                    <a href="#" class="nav-name nav-link"><?=  $userinfo['prenomfamille'] ?></a>
                                    </div>
                                    <a class="dropdown-item mt-1 bb-s mb-1" href="../account/">Paramètre de compte</a>
                                    <a class="dropdown-item" href="../<?php echo $userinfo['pseudo']; ?>">Ma page</a>
                                    <a class="dropdown-item" href="my-coolink">Modifier ma page</a>
                                    <a class="dropdown-item bt-s mt-1" href="#">Statistiques</a>
                                    <a class="dropdown-item bt-s mt-1" href="logout">Déconnexion</a>
                                </div>
                              </div>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container">
                <div class="row justify-content-around">
                  <div class="card col-sm status-card">
                    <div class="card-body">
                        <form method="post" action="">
                            <h5 class="card-title">Status de votre Coolink</h5>
                            <div class="pb-3"></div>
                            <ul class="list-unstyled team-members">
                                <li>
                                    <div class="row">
                                        <div class="col-md-2 col-2">
                                            <div class="avatar">
                                                <?php
                                                    if(file_exists("public/website_picture/". $userinfo['id'] . "/" . $userinfo['website_picture']) && isset($userinfo['website_picture'])) {
                                                ?>
                                                    <img src="<?= "public/website_picture/". $userinfo['id'] . "/" . $userinfo['website_picture']; ?>" class="navbar-avatar">
                                                <?php
                                                    } else if (!empty($userinfo['website_picture'])) {
                                                        echo '<div class="avatar--default">'.$p[0].'</div>';
                                                    } else if (empty($userinfo['website_title'])) {
                                                        echo '<div class="avatar--default">?</div>';
                                                    } else {
                                                    echo '<div class="avatar--default">'.$p[0].'</div>';
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            <p class="website_title"><?php echo $userinfo['website_title']; ?>&nbsp;&nbsp;&nbsp;</p>
                                            <div class="mt-2"></div>
                                            <?php
                                                if($userinfo['website_statut'] == "1") {
                                                echo '<button name="power-off" class="btn btn-danger btn-round btn-sm">Éteindre</button>';
                                                }
                                                if($userinfo['website_statut'] == "0") {
                                                    echo '<button name="power-on" class="btn btn-success btn-round btn-sm">Allumer</button>';
                                                }
                                            ?>
                                            <div class="mt-2"></div>
                                            <?php
                                                if($userinfo['website_statut'] == "1") {
                                                    echo '<span class="text-success"><small>Allumé</small></span>';
                                                }
                                                if($userinfo['website_statut'] == "0") {
                                                    echo '<span class="text-danger"><small>Éteint</small></span>';
                                                }
                                            ?>
                                        </div>
                                        <div class="col-md-3 col-3 text-right">
                                            <?php
                                                if($userinfo['website_statut'] == "1") {
                                                    echo '<btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fas fa-check"></i></btn>';
                                                }
                                                if($userinfo['website_statut'] == "0") {
                                                    echo '<btn class="btn btn-sm btn-outline-danger btn-round btn-icon"><i class="fas fa-times-circle"></i></btn>';
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </form>
                    </div>
                  </div>
                  <div class="mr-4"></div>
                  <div class="card col-sm info-card">
                    <div class="card-body">
                        <h5 class="card-title">Informations</h5>
                        <div class="pb-3"></div>
                        <p class="card-info"><small>TITRE:&nbsp;&nbsp;<span style="font-size:12px;"><?php echo $userinfo['website_title']; ?></span></small></p>
                        <p class="card-info"><small>DESCRIPTION:&nbsp;&nbsp;<span style="font-size:12px;"><?php echo $userinfo['website_description']; ?></span></small></p>
                        <a href="my-coolink" class="btn btn-more btn-round mt-4">Voir plus</a>
                    </div>
                  </div>
                  <div class="mr-4"></div>
                  <div class="card col-sm edit-card">
                    <div class="card-body">
                        <h5 class="card-title">Editer votre Coolink</h5>
                        <div class="pb-3"></div>
                        <p class="card-text">Modifiez le titre de votre page, la description ainsi que les liens.</p>
                        <a href="my-coolink" class="btn btn-more btn-round mt-2">Mon COOLINK</a>
                    </div>
                  </div>
                </div>
                <div class="row justify-content-around">
                    <div class="card col-sm url-card">
                      <div class="card-body">
                        <form method="post" action="">
                          <h5 class="card-title text-center">Réducteur d'URL<sup>béta</sup></h5>
                          <p class="card-info text-center"><small>UTILISEZ <b>COOLINK SHORTENER</b> POUR REDUIRE VOS LIENS</small></p>
                          <input name="input_url" placeholder="Votre URL longue" class="form-control form-control-underlined mt-3">
                          <input type="submit" name="url_sub" class="btn btn-round btn-block btn-more mt-3" value="Raccourcir">

                            <?php
                                if(isset($_POST['url_sub']) && !empty($_POST['input_url'])) {
                                    $conn= mysqli_connect("DB_HOST", "DB_USER", "DB_PASS", "DB_NAME");
                                    if(!$conn) {
                                            echo "Erreur DB";
                                            exit();
                                    }
                                    $orig_url = $_POST['input_url'];
                                    $rand = substr(md5(microtime()), rand(0,26),3);
                                    mysqli_query($conn, "INSERT INTO `firelinkurlshortner` (`orig_url`, `unique_exten`) values('$orig_url', '$rand')");
                                    echo '<a href="#link" class="btn btn-primary btn-round btn-block">Mon lien réduit</a>';

                                    
                                }
                            ?>
                            <div id="link" class="modal-window">
                                <div>
                                    <a href="#" title="Close" class="modal-close"><b>Fermer</b></a>
                                    <h1 class="modal__center pt-1">Réducteur d'URL<sup>béta</sup></h1>
                                    <p class="modal__center pt-1 white">👋 Votre lien réduit</p>
                                    <div class="modal__center white"><a href="../l?<?php echo $rand;?>"><?php $hote = $_SERVER['HTTP_HOST']; echo $hote; ?>/l?<?php echo $rand;?></a></div>
                                </div>
                            </div>
                        </form>
                      </div>
                    </div>
                    <div class="mr-4"></div>
                    <div class="card col-sm plus-card">
                      <div class="card-body">
                          <h5 class="card-title"><img class="img-center" src="../content/img/newCoolink/plus/coolink-plus.png"></h5>
                          <p class="card-info text-center mb-2"><small>DECOUVREZ LES AVANTAGES DE <b>PLUS+</b></small></p>
                          <a href="../plus" class="btn btn-round btn-block btn-more">Mes avantages</a>
                      </div>
                    </div>
                </div>
                <div class="row justify-content-around">
                    <div class="card col-sm card-account">
                      <div class="card-body">
                          <h5 class="card-title text-center"><img class="img-center" src="../content/img/newCoolink/small/coolink_wsmall.png"></h5>
                          <div class="pb-1"></div>
                          <p class="card-info text-center mb-3"><small>Vous pouvez à présent accéder à votre espace compte depuis le lien ci-dessous.</small></p>
                          <a href="../account/" class="btn btn-round btn-block btn-more">Accéder à mon compte</a>
                      </div>
                    </div>
                    <div class="mr-4"></div>
                    <div class="card col-sm card-soon">
                      <div class="card-body">
                        <div class="soon">
                            <i class="fas fa-clock fa-4x"></i>
                            <p><small>PROCHAINEMENT</small></p>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="settings-grey-logo-container">
                    <img src="../content/img/HYPERA/v2/small/small3.png">
                </div>
                <?php
                    require_once('../plugins/FireBasics.php');
                ?>
                </div>
            </div>
        </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>