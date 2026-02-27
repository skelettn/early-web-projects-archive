<?php
require('id/profilbd.php');
require('../plugins/FireCore.php');
require('../plugins/FireLink.php');

if($userinfo['prenomfamille'] == "") {
  header("location: ../setup/step-1");
}


if($userinfo['pseudo'] == "") {
  header("location: ../setup/step-1");
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

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3><img src="../content/img/newCoolink/small/coolink_bsmall.png"></h3>
                <strong>C</strong>
            </div>

            <ul class="list-unstyled components">
                <li class="active">
                    <a href="../dashboard/">
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
                                        echo '<div class="avatar--default">'.$p[0].'</div>';
                                    }
                                    ?>
                                    <a class="nav-link nav-name" href="#"><?=  $userinfo['prenomfamille'] ?></a>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <div class="dropdown-profil bb-s">
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

            <form method="post" action="" enctype="multipart/form-data">

            <div class="container">
                <div class="row justify-content-around">
                  <div class="card col-sm">
                    <div class="card-body">
                        <p class="card-title" style="font-weight:700;">Modifier mon COOLINK</p>
                        <p class="p-desc" style="font-size:10px;font-weight:600;">Sur cette page vous pourrez entirrement modifier votre COOLINK. <br> Modifiez tout de A à Z. <br>Rendez votre COOLINK unique.</p>
                                <div class="form-group">
                                    <p class="card-title" style="font-weight:700;">Titre</p>
                                    <input type="text" class="form-control" name="website_name"
                                    value="<?php echo $userinfo['website_title']; ?>">
                                </div>
                                <div class="form-group">
                                    <p  class="card-title"style="font-weight:700;">Description</p>
                                    <input type="text" class="form-control" name="website_description"
                                    value="<?php echo $userinfo['website_description']; ?>">
                                </div>
                                <div class="form-group">
                                    <p class="card-title" style="font-weight:700;">Mes liens (<?=$LinkListNumber?>)</p>
                                    <?php
                                    if($LinkListNumber < 20){
                                        require_once('../plugins/FireModal/FireAddLink.php'); 
                                    } else {
                                        echo 'Pour créer plus de 10 liens souscrivez à COOLINK+';
                                    }
                                    ?>
                                    <p></p>
                                    <?php
                                    if($LinkListNumber != 0) {
                                        foreach($LinkList as $row) {
                                    ?>
                                        <p style="font-size:13px;"><?= $row['link_title'] ?> | <a href="#modalLinkInfo<?= $row['link_id'] ?>">Informations</a></p>

                                        <div id="modalLinkInfo<?= $row['link_id'] ?>" class="modal-window">
                                            <div>
                                                <a href="#" title="Close" class="modal-close">Fermer</a>
                                                <h6>Nom du lien</h6>
                                                <p><?= $row['link_title'] ?></p>
                                                <h6>Adresse de redirection</h6>
                                                <p><?= $row['link_redirection'] ?></p>
                                                <h6>Theme du button</h6>
                                                <p><?= $row['link_theme'] ?></p>
                                                <h6>Identifiant Lien</h6>
                                                <p>CLK<?= $row['link_id'] ?></p>
                                                <a class="btn btn-light btn-round btn-sm" href="../plugins/FireLinkDelete?action=delete&unique_id=<?= $userinfo['unique_id'] ?>&link_id=<?= $row['link_id']?>">SUPPRIMER</a>&nbsp;&nbsp;
                                                <a href="#" class="btn btn-light btn-round btn-sm pull-right">FERMER</a>
                                            </div>
                                        </div>
                                    <?php
                                        }
                                    }	else {
                                    ?>
                                        <p style="text-align:center;">Vous n'avez pas de liens.</p>
                                    <?php
                                    }
                                    ?>
                                </div>
                            <div class="form-group fg-pt">
                                <a href="index" class="btn btn-more btn-round btn-sm mb-1 edit-primary">ACCUEIL</a>&nbsp;&nbsp;
                                <a href="../<?php echo $userinfo['pseudo']; ?>" class="btn btn-more btn-round btn-sm edit-primary">MON COOLINK</a>
                            </div>
                    </div>
                  </div>
                  <div class="mr-4"></div>
                  <div class="card col-sm">
                    <div class="card-body">
                        <div class="settings-font">
                            <p class="card-title" style="font-weight:700;">Police d'écriture</p>


                            <?php
                            if($userinfo['website_font'] == 'Montserrat') {
                                echo '<input type="radio" id="Montserrat" name="website_font" class="settings-radio" value="Montserrat" checked>';
                                echo '<label class="mr-3 font-1" for="Montserrat"><b>Aa</b> Montserrat</label>';
                            } else {
                                echo '<input type="radio" id="Montserrat" name="website_font" class="settings-radio" value="Montserrat">';
                                echo '<label class="mr-3 font-1" for="Montserrat"><b>Aa</b> Montserrat</label>';
                            }
                            ?>

                            <?php
                            if($userinfo['website_font'] == 'Roboto') {
                                echo '<input type="radio" id="Roboto" name="website_font" class="settings-radio" value="Roboto" checked>';
                                echo '<label class="font-2" for="Roboto"><b>Aa</b> Roboto</label>';
                            } else {
                                echo '<input type="radio" id="Roboto" name="website_font" class="settings-radio" value="Roboto">';
                                echo '<label class="font-2" for="Roboto"><b>Aa</b> Roboto</label>';
                            }
                            ?>

                            <div></div>

                            <?php
                            if($userinfo['website_font'] == 'Lato') {
                                echo '<input type="radio" id="Lato" name="website_font" class="settings-radio" value="Lato" checked>';
                                echo '<label class="mr-3 font-3" for="Lato"><b>Aa</b> Lato</label>';
                            } else {
                                echo '<input type="radio" id="Lato" name="website_font" class="settings-radio" value="Lato">';
                                echo '<label class="mr-3 font-3" for="Lato"><b>Aa</b> Lato</label>';
                            }
                            ?>

                            <?php
                            if($userinfo['website_font'] == 'Gotham') {
                                echo '<input type="radio" id="Gotham" name="website_font" class="settings-radio" value="Gotham" checked>';
                                echo '<label class="font-4" for="Gotham"><b>Aa</b> Gotham</label>';
                            } else {
                                echo '<input type="radio" id="Gotham" name="website_font" class="settings-radio" value="Gotham">';
                                echo '<label class="font-4" for="Gotham"><b>Aa</b> Gotham</label>';
                            }
                            ?>
                        </div>

                        <p class="pt-3 card-title" style=";font-weight:700;">Arrière plan</p>

                        <!-- <input type="text" class="form-control pb-2" style="width:125px" placeholder="#FFFFFF" value="#"> -->

                        <select class="form-control selectpicker" data-style="btn btn-link" name="themeselect">
                            <option name="<?= $userinfo['website_theme'] ?>" value="<?= $userinfo['website_theme'] ?>">Thème actuel</option>
                            <option name="theme1" value="theme1"> Theme de base (blanc) </option>
                            <option name="theme2" value="theme2">Theme bleu-rose (dégardé)</option>
                            <option name="theme3" value="theme3">Theme vert (dégradé-vert-blanc)</option>
                            <option name="theme4" value="theme4">Theme orange (dégradé-blue-rouge)</option>
                            <option name="theme5" value="theme5">Theme violet (dégradé-rose-violet)</option>
                            <option name="theme6" value="theme6">Theme (bleu-vert-jaune)</option>
                            <option name="theme7" value="theme7">Theme bleu (dégradé-bleu)</option>
                        </select>

                        <p class="pt-3 card-title" style="font-weight:700;">Couleur du texte <sup>(+)</sup></p>

                        <?php
                        if($userinfo['premium'] == '1') {
                        ?>
                        <input type="text" class="form-control" style="width:125px" name="website_color" placeholder="#000000" value="#000000">
                        <?php
                        } else {
                        ?>
                        <input type="text" class="form-control" style="width:125px" placeholder="#000000" value="#000000" disabled>
                        <?php
                        }
                        ?>

                        <div class="pt-2 profile_picture">
                            <p class="pt-2 card-title pb-1" style="font-weight:700;">Image de profil</p>
                            <img src="public/website_picture/26/eb6636bd480c0b1b71f741b484ce12a5.jpg" style="width:75px;height:75px;border-radius:50%;float:left;margin-left:1rem;margin-top:.2rem">
                            <button class="btn btn-more btn-sm pp_primary">Upload</button>
                            <button class="btn btn-more btn-sm pp_secondary">Remove</button>
                        </div>


                        <button type="submit" class="btn btn-more btn-round btn-sm mt-4 mb-1">SAUVEGARDER</button>
                        <a href="../<?php echo $userinfo['pseudo']; ?>" class="btn btn-more btn-round btn-sm edit-primary">MON COOLINK</a>

                                
                        </div>
                        

                    </div>
                </div>
                <div class="settings-grey-logo-container">
                    <img src="../content/img/HYPERA/v2/small/small3.png">
                    <?php
                        require_once('../plugins/FireBasics.php');
                    ?>
                </div>
            </div>

            </form>
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