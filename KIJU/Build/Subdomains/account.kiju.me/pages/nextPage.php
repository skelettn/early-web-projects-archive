<?php

use KIJU\Controllers\AuthController;

$email = $_SESSION['temp_mail'];

if (isset($_POST['auth-submit'])) {
    $code = htmlspecialchars($_POST['auth-code']);
    $authController = new AuthController;
    if (!empty($email)) {
        $authController->setEmail($email);
        $authController->createAuthToken($code);
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
    <div class="tab second-step validation-step">
        <h2 class="title">Vérification</h2>
        <p class="desc">Entrez le code envoyé à <?= $_SESSION['temp_mail'] ?></p>
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="desc error">Code de vérification incorrect</p>';
        }
        ?>
        <form action="" method="post">
            <div class="input-group">
                <input type="text" name="auth-code" id="auth-code" placeholder="" value="">
                <label for="auth-code">Code reçu à l'email : <?= $_SESSION['temp_mail'] ?></label>
            </div>
            <div class="actions">
                <button class="continue-btn" type="submit" name="auth-submit">Continuer</button>
            </div>
        </form>
        <div class="separator"></div>
        <div class="new-account">
            <h4>Vous ne recevez pas votre code ?</h4>
            <p>Si votre code de validation n'est pas dans votre boîte principale il doit se trouver dans vos spams.</p>
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