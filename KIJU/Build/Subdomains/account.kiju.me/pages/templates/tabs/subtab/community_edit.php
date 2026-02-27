<?php

use KIJU\Controllers\CommunityController;

$communityController = new CommunityController($_GET['subtab']);
$uid = $_GET['subtab'];

$currBanner = "";
if (!empty($communityController->getCommunityBanner())) {
    $currBanner = $communityController->getCommunityBanner();
}

if (isset($_POST['ac-community-save'])) {
    $banner = NULL;
    if (isset($_FILES['ac-community-banner']) && $_FILES['ac-community-banner']['name'] != "") {
        $banner = $_FILES['ac-community-banner'];
    }
    if (isset($_POST['ac-community-name']) && isset($_POST['ac-community-description'])) {
        $name = htmlspecialchars($_POST['ac-community-name']);
        $description = htmlspecialchars($_POST['ac-community-description']);
        $communityController->updateCommunity($uid, $banner, $name, $description);
    }
}
?>
<h2 class="title"><?= $communityController->getCommunityName() ?></h2>
<p class="desc">Modifiez les informations de <strong><?= $communityController->getCommunityName() ?></strong> pour Kiju et les services associés.</p>
<section>
    <form method="post" action="" enctype="multipart/form-data">
        <div class="file">
            <input type="file" name="ac-community-banner" id="ac-community-banner">
            <label for="ac-community-banner" class="banner">
                <div class="upload" style="background-image: url('<?= $currBanner ?>');">
                    <img src="https://assets.kiju.me/img/icons/plus.svg" alt="Upload">
                </div>
            </label>
        </div>
        <div class="input-group">
            <input type="text" name="ac-community-name" id="ac-community-name" value="<?= $communityController->getCommunityName() ?>" placeholder="">
            <label for="ac-community-name">Nom de la communauté</label>
        </div>
        <div class="input-group">
            <input type="text" name="ac-community-description" id="ac-community-description" value="<?= $communityController->getCommunityBio() ?>" placeholder="">
            <label for="ac-community-description">Description de la communauté</label>
        </div>
        <input type="submit" name="ac-community-save" value="Sauvegarder">
    </form>
</section>