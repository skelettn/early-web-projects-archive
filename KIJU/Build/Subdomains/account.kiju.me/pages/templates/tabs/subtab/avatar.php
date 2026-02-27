<?php

use KIJU\Controllers\UpdateController;
use KIJU\App;

if (isset($_POST['ac-save-avatar'])) {
    $updateController = new UpdateController;
    if (isset($_FILES['ac-profile-picture']) && $_FILES['ac-profile-picture']['name'] != "") {
        $avatar = $_FILES['ac-profile-picture'];
        $updateController->updateAvatar($avatar);
    }
}

$currAvatar = "";
if (!empty(App::getUser()->getProfilePicture())) {
    $currAvatar = App::getUser()->getProfilePicture();
}
?>
<h2 class="title">Votre avatar</h2>
<p class="desc">Modifiez votre avatar pour Kiju et les services associés.</p>
<section>
    <form method="post" action="" enctype="multipart/form-data">
        <div class="file">
            <input type="file" name="ac-profile-picture" id="ac-profile-picture">
            <label for="ac-profile-picture" class="profile-picture">
                <div class="upload" style="background-image: url('<?= $currAvatar ?>');">
                    <img src="https://assets.kiju.me/img/icons/plus.svg" alt="Upload">
                </div>
            </label>
        </div>

        <input type="submit" name="ac-save-avatar" value="Sauvegarder">
    </form>
</section>