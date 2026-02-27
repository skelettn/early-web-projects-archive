<?php

use KIJU\Controllers\UpdateController;
use KIJU\App;

if (isset($_POST['ac-save-banner'])) {
    $updateController = new UpdateController;
    if (isset($_FILES['ac-banner']) && $_FILES['ac-banner']['name'] != "") {
        $banner = $_FILES['ac-banner'];
        $updateController->updateBanner($banner);
    }
}

$currBanner = "";
if (!empty(App::getUser()->getBanner())) {
    $currBanner = App::getUser()->getBanner();
}
?>
<h2 class="title">Votre bannière</h2>
<p class="desc">Modifiez votre bannière pour Kiju et les services associés.</p>
<section>
    <form method="post" action="" enctype="multipart/form-data">
        <div class="file">
            <input type="file" name="ac-banner" id="ac-banner">
            <label for="ac-banner" class="banner">
                <div class="upload" style="background-image: url('<?= $currBanner ?>');">
                    <img src="https://assets.kiju.me/img/icons/plus.svg" alt="Upload">
                </div>
            </label>
        </div>

        <input type="submit" name="ac-save-banner" value="Sauvegarder">
    </form>
</section>