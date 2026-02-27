<?php

use KIJU\Controllers\AuthController;

if (isset($_POST['auth-submit'])) {
    if (isset($_GET['email'])) {
        $email = htmlspecialchars($_GET['email']);
    } else {
        $email = htmlspecialchars($_POST['auth-email']);
    }
    $authController = new AuthController;
    if (!empty($email)) {
        $authController->setEmail($email);

        $authController->isTempOkay();
        exit;
    }
}
?>

<style>
    .content {
        background-image: none !important;
    }
</style>

<div class="auth-container">
    <div class="banner">
        <div class="kiju-logo">
            <img src="https://assets.kiju.me/img/new/Base-White.png" alt="Kiju">
        </div>
    </div>
    <div class="tab first-step validation-step">
        <h2 class="title">Heureux de vous revoir !</h2>
        <p class="desc">Entrez votre adresse e-mail pour procéder à l'inscription/connexion.</p>
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="desc error">Code de vérification incorrect</p>';
        }
        ?>
        <form action="" method="post">
            <div class="input-group">
                <input type="text" name="auth-email" id="auth-email" value="<?= @$_GET['email'] ?>" placeholder="" required="required">
                <label for="auth-email">Saisissez votre adresse e-mail</label>
            </div>
            <div class="actions">
                <button class="continue-btn" type="submit" name="auth-submit">Continuer</button>
            </div>
        </form>
        <div class="separator"></div>
        <div class="new-account">
            <h4>Vous êtes nouveau ?</h4>
            <p>Pas de panique, votre compte sera automatiquement créé si votre adresse e-mail n'est pas reconnue.</p>
        </div>
    </div>
    <div class="footer">
        <ul>
            <li>
                <a href="https://about.kiju.me/cgu" target="_blank">
                    <span>CGU</span>
                </a>
            </li>
            <li>
                <a href="https://about.kiju.me/cgv" target="_blank">
                    <span>CGV</span>
                </a>
            </li>
        </ul>
    </div>
</div>