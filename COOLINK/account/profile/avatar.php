<?php
require('../id/profilbd.php');
if(!isset($_SESSION['id'])) {
    header('location: ../sign-in?lang=fr_FR');
}

$p = $userinfo['pseudo'];


// AVATAR UPLOADER
if(isset($_POST['envoyer'])) { 
    if (isset($_FILES['avatar']) and !empty($_FILES['avatar']['name'])) { // On vérifie qu'il y a bien un fichier

        $ListeExtension = array('jpg' => 'image/jpeg', 'jpeg'=>'image/jpeg', 'png' => 'image/png', 'gif' => 'image/gif');
        $extensionsValides = array('jpg','jpeg','png'); // Format accepté
        $tailleMax = 5242880; // Taille maximum 5 Mo

        if ($_FILES['file']['size'] <= $tailleMax){ // Si le fichier et bien de taille inférieur ou égal à 5 Mo

            $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1)); // Prend l'extension après le point, soit "jpg, jpeg ou png"

            if (in_array($extensionUpload, $extensionsValides)){
                
                $dossier = "../public/avatars/" . $_SESSION['id'] . "/";

                if(!is_dir($dossier)) {
                    mkdir($dossier);
                }

                $fichier = basename($_FILES['avatar']['name']);
                $fichier_ext = strtolower(substr(strrchr($fichier, '.'), 1));
                $fichier = md5(uniqid(rand(), true)) . '.' . $fichier_ext;

                if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) {

                    if(file_exists("../public/avatars/" . $_SESSION['id'] . "/" . $_SESSION['avatar']) && isset($_SESSION['avatar'])) {
                        unlink("../public/avatars/" . $_SESSION['id'] . "/" . $_SESSION['avatar']);
                    }

                    $req = $bdd->prepare("UPDATE firelink SET avatar = ? WHERE id = ?");
                    $req->execute(array($fichier, $_SESSION['id']));

                    $_SESSION['avatar'] = $fichier;

                    header('Location: ../edit/avatar');
                    exit;
                }
                else {
                    header('Location: ../edit/avatar');
                    exit;
                }
            }
        }
    }
}

    

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COOLINK · Avatar</title>
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
                <div class='sidebar__menu-item sidebar__menu-item--active'>
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
                <h2>Avatar</h2>
            </div>
            <div class='main__content'>
                <div class='main__settings-form'>
                <form action='' method='post' enctype="multipart/form-data">
                        <div class='row'>
                            <div class='col'>
                                <?php
                                    if(file_exists("../public/avatars/". $userinfo['id'] . "/" . $userinfo['avatar']) && isset($userinfo['avatar'])){
                                ?>
                                    <img src="<?= "../public/avatars/". $userinfo['id'] . "/" . $userinfo['avatar']; ?>" class="profil-pic-184x-184">
                                <?php
                                    } else {
                                        echo '<div class="profil-pic-184x-184">'.$p[0].'</div>';
                                    }
                                ?>
                            </div>
                            <div class="col-6 mt-2">
                                <p style="white-space: pre-line;">Téléchargez votre avatar en cliquant
                                    sur le bouton ci-dessous. Extentions autorisées:
                                    JPG/JPEG/PNG/GIF[PREMIUM]
                                    <input type="file" name="avatar" id="avatar-upload" class="mt-2">
                                    <label for="avatar-upload" class="btn btn-secondary">Télécharger</label>
                                </p>
                            </div>
                        </div>
                        <div class='mt-5'></div>
                        <input class='btn btn-primary main__save-button mr-2' name="envoyer" value="Envoyer" type="submit">
                        <a href="../" class='btn btn-secondary main__cancel-button'>Annuler</a>
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