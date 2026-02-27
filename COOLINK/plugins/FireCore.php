<?php
// FIRELINK CORE FILE
// ALL COPYRIGHT TO HYPERA

if(!isset($_SESSION['id'])){header('location: ../login');}


// CHECK BETA ACCESS + IF BAN

if ($userinfo['beta_access'] == '0'){
    header('location: ../index#beta-access');
}
if ($userinfo['beta_access'] == '1'){
    echo "";
}

if ($userinfo['confirme'] == '0'){
    header('location: ../lg/confirm');
}
if ($userinfo['confirme'] == '1'){
    echo "";
}


// CHECK BETA ACCESS + IF BAN


// WEBSITE PICTURE

    if (isset($_FILES['website_picture']) and !empty($_FILES['website_picture']['name'])) { // On vérifie qu'il y a bien un fichier

        $ListeExtension = array('jpg' => 'image/jpeg', 'jpeg'=>'image/jpeg', 'png' => 'image/png', 'gif' => 'image/gif');
        $extensionsValides = array('jpg','jpeg','png','gif'); // Format accepté
        $tailleMax = 5242880; // Taille maximum 5 Mo

        if ($_FILES['file']['size'] <= $tailleMax){ // Si le fichier et bien de taille inférieur ou égal à 5 Mo

            $extensionUpload = strtolower(substr(strrchr($_FILES['website_picture']['name'], '.'), 1)); // Prend l'extension après le point, soit "jpg, jpeg ou png"

            if (in_array($extensionUpload, $extensionsValides)){
                
                $dossier = "public/website_picture/" . $_SESSION['id'] . "/";

                if(!is_dir($dossier)) {
                    mkdir($dossier);
                }

                $fichier = basename($_FILES['website_picture']['name']);
                $fichier_ext = strtolower(substr(strrchr($fichier, '.'), 1));
                $fichier = md5(uniqid(rand(), true)) . '.' . $fichier_ext;

                if(move_uploaded_file($_FILES['website_picture']['tmp_name'], $dossier . $fichier)) {

                    if(file_exists("public/website_picture/" . $_SESSION['id'] . "/" . $_SESSION['website_picture']) && isset($_SESSION['website_picture'])) {
                        unlink("public/website_picture/" . $_SESSION['id'] . "/" . $_SESSION['website_picture']);
                    }

                    $req = $bdd->prepare("UPDATE firelink SET website_picture = ? WHERE id = ?");
                    $req->execute(array($fichier, $_SESSION['id']));

                    $_SESSION['website_picture'] = $fichier;

                    header('Location: ../dashboard/');
                    exit;
                }
                else {
                    header('Location: ../dashboard/');
                    exit;
                }
            }
        }
    }

// WEBSITE PICTURE

// MAIN DASHBOARD CORE

if(isset($_SESSION['id'])) {
    $requser = $bdd->prepare("SELECT * FROM firelink WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
      if(isset($_POST['power-on'])) {
        $insertpoweron = $bdd->prepare("UPDATE firelink SET website_statut = ? WHERE id = ?");
        $insertpoweron->execute(array(1, $_SESSION['id']));
        header('Location: ../dashboard/');
    }
}

  if(isset($_SESSION['id'])) {
    $requser = $bdd->prepare("SELECT * FROM firelink WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
    if(isset($_POST['power-off'])) {
        $insertpoweroff = $bdd->prepare("UPDATE firelink SET website_statut = ? WHERE id = ?");
        $insertpoweroff->execute(array(0, $_SESSION['id']));
        header('Location: ../dashboard/');
    }
}

if(isset($_SESSION['id'])) {
    $requser = $bdd->prepare("SELECT * FROM firelink WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
    if(isset($_POST['theme-0'])) {
        $insertthemebasic = $bdd->prepare("UPDATE firelink SET theme_dashboard = ? WHERE id = ?");
        $insertthemebasic->execute(array(0, $_SESSION['id']));
        header('Location: ');
    }
}
    
if(isset($_SESSION['id'])) {
    $requser = $bdd->prepare("SELECT * FROM firelink WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
    if(isset($_POST['theme-1'])) {
        $insertthemedark = $bdd->prepare("UPDATE firelink SET theme_dashboard = ? WHERE id = ?");
        $insertthemedark->execute(array(1, $_SESSION['id']));
        header('Location: ');
    }
}

// MAIN DASHBOARD CORE

// WEBSITE EDITOR CORE
  
if(isset($_SESSION['id'])) {
    $requser = $bdd->prepare("SELECT * FROM firelink WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
    if(isset($_POST['website_name']) AND !empty($_POST['website_name']) AND $_POST['website_name'] != $user['website_name']) {
        $name = $_POST['website_name'];
        $insert_website = $bdd->prepare("UPDATE firelink SET website_title = ? WHERE id = ?");
        $insert_website->execute(array($name, $_SESSION['id']));
        header('Location: my-coolink');
    }
}
  
if(isset($_SESSION['id'])) {
    $requser = $bdd->prepare("SELECT * FROM firelink WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
    if(isset($_POST['website_description']) AND !empty($_POST['website_description']) AND $_POST['website_description'] != $user['website_description']) {
        $desc = $_POST['website_description'];
        $insert_website = $bdd->prepare("UPDATE firelink SET website_description = ? WHERE id = ?");
        $insert_website->execute(array($desc, $_SESSION['id']));
    }
}
  
if(isset($_SESSION['id'])) {
    $requser = $bdd->prepare("SELECT * FROM firelink WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
    if(isset($_POST['themeselect']) AND !empty($_POST['themeselect']) AND $_POST['themeselect'] != $user['themeselect']) {
        $theme = $_POST['themeselect'];
        $insert_website = $bdd->prepare("UPDATE firelink SET website_theme = ? WHERE id = ?");
        $insert_website->execute(array($theme, $_SESSION['id']));
    }
}

if(isset($_SESSION['id'])) {
    $requser = $bdd->prepare("SELECT * FROM firelink WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
    if(isset($_POST['website_color']) AND !empty($_POST['website_color']) AND $_POST['website_color'] != $user['website_color']) {
        $color = $_POST['website_color'];
        $insert_website = $bdd->prepare("UPDATE firelink SET website_color = ? WHERE id = ?");
        $insert_website->execute(array($color, $_SESSION['id']));
    }
}

if(isset($_SESSION['id'])) {
    $requser = $bdd->prepare("SELECT * FROM firelink WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
    if(isset($_POST['website_font']) AND !empty($_POST['website_font']) AND $_POST['website_font'] != $user['website_font']) {
        $font = $_POST['website_font'];
        $insert_website = $bdd->prepare("UPDATE firelink SET website_font = ? WHERE id = ?");
        $insert_website->execute(array($font, $_SESSION['id']));
    }
}

// WEBSITE EDITOR CORE

?>