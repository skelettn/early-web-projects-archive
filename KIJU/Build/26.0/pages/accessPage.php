<?php

use KIJU\Controllers\AccessController;

$accessController = new AccessController();

if (isset($_POST['verify_Access'])) {
    $pwd = htmlspecialchars($_POST['access_Password']);
    if ($pwd == $accessController->getPwd()) {
        $accessController->getAccess();
    }
}
?>
<div class="accessPage">
    <form action="" method="post">
        <input type="text" name="access_Password" placeholder="Mot de passe administrateur">
        <button type="submit" name="verify_Access">Valider</button>
    </form>
</div>