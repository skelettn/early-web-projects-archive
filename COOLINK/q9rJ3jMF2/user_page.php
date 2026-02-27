<?php
require('user_id.php');

if($websiteinfo['website_statut'] == "0") {
    require_once('pages_offline.php');
    exit;
}

if($websiteinfo['website_statut'] == "1") {
    echo '';
}


if(empty($websiteinfo['website_title'])) {
    header('location: index');
}

$p = $websiteinfo['website_title'];

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title><?php echo $websiteinfo['website_title'] ?> | COOLINK</title>
    <link rel="icon" href="content/img/favicon.png">
    <link rel="stylesheet" href="q9rJ3jMF2/user_page.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&display=swap" rel="stylesheet">
</head>
<style>
    * {
        font-family: '<?= $websiteinfo['website_font'] ?>', sans-serif;
    }
</style>
<?php
if($websiteinfo['website_theme'] == 'theme1') {
    echo '<body class="theme1" style="color:'.$websiteinfo['website_color'].'">';
}
?>
<?php
if($websiteinfo['website_theme'] == 'themedark') {
    echo '<body class="themedark" style="color:'.$websiteinfo['website_color'].'">';
}
?>
<?php
if($websiteinfo['website_theme'] == 'theme2') {
    echo '<body class="theme2" style="color:'.$websiteinfo['website_color'].'">';
}
?>
<?php
if($websiteinfo['website_theme'] == 'theme3') {
    echo '<body class="theme3" style="color:'.$websiteinfo['website_color'].'">';
}
?>
<?php
if($websiteinfo['website_theme'] == 'theme4') {
    echo '<body class="theme4" style="color:'.$websiteinfo['website_color'].'">';
}
?>
<?php
if($websiteinfo['website_theme'] == 'theme5') {
    echo '<body class="theme5" style="color:'.$websiteinfo['website_color'].'">';
}
?>
<?php
if($websiteinfo['website_theme'] == 'theme6') {
    echo '<body class="theme6" style="color:'.$websiteinfo['website_color'].'">';
}
?>
<?php
if($websiteinfo['website_theme'] == 'theme7') {
    echo '<body class="theme7" style="color:'.$websiteinfo['website_color'].'">';
}
?>
    <div class="bio-form" align="center">
        <div align="center">
            <?php
                if(file_exists("dashboard/public/website_picture/". $websiteinfo['id'] . "/" . $websiteinfo['website_picture']) && isset($websiteinfo['website_picture'])) {
            ?>
                <img src="<?= "dashboard/public/website_picture/". $websiteinfo['id'] . "/" . $websiteinfo['website_picture']; ?>" class="avatar">
            <?php
                } else {
                    echo '<div class="avatar--default">'.$p[0].'</div>';
                }
            ?>
            <hr>
            <?php
            if($websiteinfo['website_theme'] == '') {
                if($websiteinfo['website_title'] == '') {
                    echo "<h3>Page inexistante</h3>";
                }
            }
            ?>
            <?php
            if($websiteinfo['website_title'] == '') {
                    echo "<h3>Votre page ne possède aucun titre</h3>";
            }
            if($websiteinfo['website_description'] == '') {
                echo "<h5>Votre page ne possède aucune description</h5>";
            }
            echo '<h3> '.$websiteinfo['website_title'].' </h3>
            <h5> '.$websiteinfo['website_description'].'</h5>';
            ?>
            <p></p>
            <?php
            if($LinkListNumber != 0) {
                foreach($LinkList as $row) {
            ?>
                    <a href="#<?= $row['link_id'] ?>"><button class="<?= $row['link_theme'] ?>"><?= $row['link_title'] ?></button></a>
                    <p></p>
                    <div id="<?= $row['link_id'] ?>" class="modal-window">
                    <div>
                        <a href="#" title="Close" class="modal-close"><b>Fermer</b></a>
                        <h1>Attention !</h1>
                        <div>Tu quittes COOLINK pour accéder à un site Web qui n’a pas été créé par COOLINK ou HYPERA et peut inclure du contenu sensible.</div>
                        <br><br>
                        <a href="<?= $row['link_redirection'] ?>"  style="color:black!important;" target="_blank" class="themebase">Accéder</a>
                        <a href="hc/abuse?unique_id=<?= $websiteinfo['unique_id'] ?>" target="_blank" style="color:white!important;" class="themered">Signaler</a>
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
            <p><a class="footer" href="goHome">🔥 made with <b>COOLINK</b></a></p>
</body>

</html>

<!-- /*COPYRIGHT HYPERA.*/ -->