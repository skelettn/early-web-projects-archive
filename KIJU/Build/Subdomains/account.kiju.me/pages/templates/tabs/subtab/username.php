<?php

use KIJU\Controllers\UpdateController;
use KIJU\App;

if (isset($_POST['ac-save-username'])) {
    $updateController = new UpdateController;
    if (isset($_POST['ac-username'])) {
        $userName = htmlspecialchars($_POST['ac-username']);
        $updateController->updateUserName($userName);
    }
}

?>
<h2 class="title">Votre nom d'utilisateur</h2>
<p class="desc">Modifiez votre nom d'utilisateur pour Kiju et les services associés.</p>
<section>
    <form method="post" action="">
        <div class="input-group">
            <input type="text" name="ac-username" id="ac-username" value="<?= App::getUser()->getUsername() ?>" placeholder="">
            <label for="ac-username">Votre nom d'utilisateur</label>
        </div>
        <input type="submit" name="ac-save-username" value="Sauvegarder">
    </form>
</section>