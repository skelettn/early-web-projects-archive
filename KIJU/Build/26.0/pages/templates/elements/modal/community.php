<?php

use KIJU\Controllers\Modals\CommunityController;
use KIJU\App;

$communityController = new CommunityController();

if (isset($_POST['createCommunity'])) {
    $name = htmlspecialchars($_POST['communityName']);
    $communityController->setCommunityName($name);

    if ($communityController->isValid()) {
        $communityController->createCommunity();
    }
}

$communityModal = '
<div id="addCommunityModal" class="modal">
    <div class="modalContainer">
        <div class="modalHeader">
            <div class="modalLogo">
                <img src="https://about.kiju.me/assets/img/Social.png" alt="Kiju Beta">
            </div>
            <div class="modalClose">
                <i class="lni lni-close"></i>
            </div>
        </div>
        <div class="modalContent">
            <h3 class="title">Communautés Kiju <sup class="beta">bêta</sup></h3>
            <span class="desc">Créez, partagez du contenu dans les différentes communautés de Kiju.</span>
            <div class="features">
                <div class="feature">
                    <div class="icon">
                        <img src="https://assets.kiju.me/img/icons/users.svg" alt="Your community">
                    </div>
                    <div class="text">
                        <h5 class="title">Votre communauté</h5>
                        <span class="desc">Rassemblez les personnes qui partagent votre passion à un seul endroit et avancez ensemble.</span>
                    </div>
                </div>
                <div class="feature">
                    <div class="icon">
                        <img src="https://assets.kiju.me/img/icons/sledgehammer.svg" alt="Modération">
                    </div>
                    <div class="text">
                        <h5 class="title">Modération</h5>
                        <span class="desc">Vous avez le contrôle sur vos membres, choisissez un/des modérateurs qui vous aideront au maintien de votre communauté.</span>
                    </div>
                </div>
                <div class="feature">
                    <div class="icon">
                        <img src="https://assets.kiju.me/img/icons/chart.svg" alt="">
                    </div>
                    <div class="text">
                        <h5 class="title">Propulsez votre communauté</h5>
                        <span class="desc">Souscrivez à un abonnement Kiju+ pour propulser votre communautés dans les tendances de Kiju.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="modalSubmit">
            <span class="infos">
                En créant une communauté vous acceptez les conditions générales d\'utilisation de Kiju.
            </span>
            <form action="" method="post">
                <input type="text" name="communityName" placeholder="Nom de la communauté">
                <button type="submit" name="createCommunity">Créer (' . $communityController->remainingCommunities() . '/5)</button>
            </form>
        </div>
    </div>
</div>
';
$communityModal = App::minifyHtml($communityModal);
echo $communityModal;
