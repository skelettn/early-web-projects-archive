<?php
require('../id/profilbd.php');

if(!isset($_SESSION['id'])) {
    header('location: ../sign-in?lang=fr_FR');
}

$p = $userinfo['pseudo'];
ini_set('display_errors', 'off');

if(isset($_SESSION['id'])) {
    $requser = $bdd->prepare("SELECT * FROM firelink WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
    
    if(isset($_POST['mail']) AND !empty($_POST['mail']) AND $_POST['mail'] != $user['mail']) {
        $mail = htmlspecialchars($_POST['mail']);

        if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {

            $check_email_request = $bdd->prepare("SELECT * FROM `firelink` WHERE `mail` = ?");
            $check_email_request->execute(array($mail));
            $check_email = $check_email_request->rowCount();

            if($check_pseudo == 0 & $check_email == 0) {
                $insertmail = $bdd->prepare("UPDATE firelink SET mail = ? WHERE id = ?");
                $insertmail->execute(array($mail, $_SESSION['id']));
                header('Location: ../edit/');

            } else {
                $erreur = "Adresse email ou Nom d'utilisateur similaire existe déja";
            }

        } else {
            $erreur = "Votre adresse email n'est pas dans un format valide";
        }
    }
}

if(isset($_SESSION['id'])) {
    $requser = $bdd->prepare("SELECT * FROM firelink WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
    if(isset($_POST['pseudo']) AND !empty($_POST['pseudo']) AND $_POST['pseudo'] != $user['pseudo']) {
        $pseudo = htmlspecialchars($_POST['pseudo']);

        $check_pseudo_request = $bdd->prepare("SELECT * FROM `firelink` WHERE `pseudo` = ?");
        $check_pseudo_request->execute(array($pseudo));
        $check_pseudo = $check_pseudo_request->rowCount();
    
        if($check_pseudo == 0) {
            $insertpseudo = $bdd->prepare("UPDATE firelink SET pseudo = ? WHERE id = ?");
            $insertpseudo->execute(array($pseudo, $_SESSION['id']));
            header('Location: ../edit/');
        } else {
            $erreur = "Nom d'utilisateur similaire existe déja";
        }
    }
}

if(isset($_SESSION['id'])) {
    $requser = $bdd->prepare("SELECT * FROM firelink WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
    
    if(isset($_POST['prenomfamille']) AND !empty($_POST['prenomfamille']) AND $_POST['prenomfamille'] != $prenomfamille['prenomfamille']) {
        $prenomfamille = htmlspecialchars($_POST['prenomfamille']);

        if($check_pseudo == 0) {
            $insertpf = $bdd->prepare("UPDATE firelink SET prenomfamille = ? WHERE id = ?");
            $insertpf->execute(array($prenomfamille, $_SESSION['id']));
            header('Location: ../edit/');
        } else {
            $erreur = "Nom d'utilisateur similaire existe déja";
        }
    }
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
        <div class="float-left">
                <a href="" data-toggle="modal" data-target="#modal--notification"><button class="notif-btn-side"><i class='fa fa-bell'></i></button></a>
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
                <div class='sidebar__menu-item sidebar__menu-item--active'>
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
                <h2>Général</h2>
            </div>
            <div class='main__content'>
                <div class='main__settings-form'>
                    <form action='' method='post'>
                        <div class="row mb-4">
                            <div class="col-sm-7">
                                <div class="card settings--card">
                                    <div class="card-body mt-2">
                                        <label class='main__input-label'>NOM DU PROFIL:</label>
                                        <input class='main__input' placeholder='<?php echo $userinfo['pseudo']; ?>'
                                            type='text' value='<?php echo $userinfo['pseudo']; ?>' name='pseudo'>
                                        <label class='main__input-label'>NOM RÉEL:</label>
                                        <input class='main__input'
                                            placeholder='<?php echo $userinfo['prenomfamille']; ?>' type='text'
                                            value='<?php echo $userinfo['prenomfamille']; ?>' name='prenomfamille'>
                                        <label class='main__input-label'>ADRESSE EMAIL:</label>
                                        <input class='main__input' placeholder='<?php echo $userinfo['mail']; ?>'
                                            type='mail' value='<?php echo $userinfo['mail']; ?>' name='mail'>
                                        <?php
                                            if(isset($erreur)) {
                                                echo '<div>'.$erreur.'</div>';
                                            }
                                        ?>
                                        <p></p>
                                        <button class="save--button ml-2" type='submit'>SAUVEGARDER</button>
                                        <a href="../" class="cancel--button ml-2">ANNULER</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include('script/modal_notification.php'); ?>
    <div class="settings-grey-logo-container">
        <img src="../../content/img/HYPERA/v2/small/small3.png">
    </div>
    <p class="app-version">v0.7.1</p>
    <script src="../../styles/js/bootstrap.min.js"></script>
</body>

</html>

<!-- Made by COOLINK and Bootstrap v5 -->