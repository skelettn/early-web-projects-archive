<?php

use KIJU\Controllers\UpdateController;
use KIJU\App;

if (isset($_POST['ac-save-name'])) {
    $updateController = new UpdateController;
    if (isset($_POST['ac-name'])) {
        $name = htmlspecialchars($_POST['ac-name']);
        $updateController->updateName($name);
    }
}

?>
<h2 class="title">Votre nom</h2>
<p class="desc">Modifiez votre nom pour Kiju et les services associés.</p>
<section>
    <form method="post" action="">
        <div class="input-group">
            <input type="text" name="ac-name" id="ac-name" value="<?= App::getUser()->getName() ?>" placeholder="">
            <label for="ac-name">Votre nom</label>
        </div>
        <input type="submit" name="ac-save-name" value="Sauvegarder">
    </form>
</section>