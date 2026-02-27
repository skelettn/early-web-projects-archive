<?php

use KIJU\Controllers\Elements\RightContentController;
use KIJU\App;

$rightContentController = new RightContentController();

$hashtags = $rightContentController->getHashtags();

if (App::isLogged()) {
    $subscriptions = $rightContentController->fetchSubscriptions();
}
?>
<div class="right_content">
    <div class="actions">
        <div class="user dropdown-menu">
            <div class="dropdown-menu-btn">
                <?php if (App::isLogged()) : ?>
                    <?php if (!empty($rightContentController->getProfilePicture())) : ?>
                        <img src="<?= $rightContentController->getProfilePicture() ?>" alt="<?= $rightContentController->getUsername() ?>">
                    <?php endif; ?>
                <?php else : ?>
                    <img src="https://assets.kiju.me/img/avatar-default-ptzr6kmg652a2w4lsbc7yrspm9r4z4y5wcvej6fgkg.png" alt="Unknown User">
                <?php endif; ?>
            </div>
            <div class="dropdown-content">
                <?php if (App::isLogged()) : ?>
                    <a href="/user/<?= $rightContentController->getUsername() ?>">
                        <div class="item">
                            <img src="https://assets.kiju.me/img/icons/user.svg" alt="Profile">
                            <span>Mon profil</span>
                        </div>
                    </a>
                    <a href="/communities">
                        <div class="item">
                            <img src="https://assets.kiju.me/img/icons/users.svg" alt="Communities">
                            <span>Communautés</span>
                        </div>
                    </a>
                    <div class="item modalBtn" data-modal="plusModal">
                        <img src="https://assets.kiju.me/img/icons/verified.svg" alt="Become verified">
                        <span>Kiju+</span>
                    </div>
                    <a href="https://account.kiju.me/ac">
                        <div class="item">
                            <img src="https://assets.kiju.me/img/icons/settings.svg" alt="Account Center">
                            <span>Espace compte</span>
                        </div>
                    </a>
                <?php endif; ?>
                <a href="https://trello.com/b/ZV3fgcFo/kiju-trello">
                    <div class="item">
                        <img src="https://assets.kiju.me/img/icons/bug.svg" alt="Bugs">
                        <span>Problèmes connus</span>
                    </div>
                </a>
                <a href="/updates">
                    <div class="item">
                        <img src="https://assets.kiju.me/img/icons/update.svg" alt="Updates">
                        <span>Mises à jours</span>
                    </div>
                </a>
                <div class="item modalBtn" data-modal="aboutModal">
                    <img src="https://assets.kiju.me/img/icons/info.svg" alt="Informations">
                    <span>Informations</span>
                </div>
            </div>
        </div>
    </div>
    <?php if (App::isLogged()) : ?>
        <h3 class="section-title">Abonnements</h3>
        <section class="friends">
            <?php foreach ($subscriptions as $sub) : ?>
                <a href="/user/<?= $sub->getUsername() ?>">
                    <div class="friend">
                        <div class="profile-picture" style="background-image: url('<?= $sub->getProfilePicture() ?>');"></div>
                        <h4 class="name"><?= $sub->getUsername() ?></h4>
                    </div>
                </a>
            <?php endforeach; ?>
        </section>
    <?php else : ?>
        <section class="other">
            Connectez-vous pour accéder à Kiju.
        </section>
    <?php endif; ?>
    <h3 class="section-title">Informations</h3>
    <section class="infos">
        <div class="warning">
            <?= $rightContentController->getSVG('warning', false) ?>
        </div>
        <p>À l'heure actuelle, seul le mode visiteur est disponible.</p>
    </section>

    <h3 class="section-title">Tendances</h3>
    <section class="trending">
        <div class="trends">
            <?php foreach ($hashtags as $hashtag) : ?>
                <a href="/search/posts/hashtag_<?= $hashtag['hashtag'] ?>">
                    <div class="trend">
                        <h4>#<?= $hashtag['hashtag'] ?></h4>
                        <span>
                            <strong><?= $hashtag['count'] ?></strong> personnes discutent
                        </span>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </section>
</div>