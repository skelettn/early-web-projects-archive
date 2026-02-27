<?php

use KIJU\Controllers\CommunityController;
use KIJU\App;

$communityController = new CommunityController($_GET['community_uid']);

$posts = $communityController->getAllPosts();
$users = $communityController->getCommunityMembers();

// Vérifie si la communauté existe
$communityController->isCommunityExist();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $communityController->managePosts();
}

// Vérifie si une action de la relation existe
if (isset($_POST['communityAction'])) {
    echo $communityController->communityAction();
    exit;
}
?>
<div class="communityPage">
    <div class="fixed-infos">
        <a href="/home">
            <div class="return-action">
                <div class="icon"><i class="lni lni-arrow-left"></i></div>
            </div>
        </a>
        <span><?= $communityController->getCommunityName() ?></span>
    </div>
    <div class="profile-data">
        <div class="banner" style="background-image: url(<?= $communityController->getCommunityBanner() ?>);"></div>
        <div class="data" style="background: #b621fe;">
            <div class="actions">
                <form action="" method="post">
                    <?php if (App::isLogged()) : ?>
                        <?php if (!$communityController->isMyCommunity()) : ?>
                            <?php if ($communityController->getCommunityName() != "Global") : ?>
                                <?php if (!$communityController->isRelation()) : ?>
                                    <button class="join global" name="communityAction">Rejoindre</button>
                                <?php else : ?>
                                    <button class="join global fill" name="communityAction">Quitter</button>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php else : ?>
                            <a href="/c/<?= $communityController->getCommunityUID() ?>/<?= (@$_GET['tabs'] == 'edit') ? 'edit' : 'edit' ?>" class="join global">Modifier</a>
                        <?php endif; ?>
                    <?php endif; ?>
                </form>
            </div>
            <h1 class="name">
                <?= $communityController->getCommunityName() ?>
                <?php if ($communityController->getVerifedStatus()) : ?>
                    <img src="https://assets.kiju.me/img/1123/verified_badge_white.png" class="badge" alt="Verified Community" title="Verified Community">
                <?php endif; ?>
            </h1>
            <p class="bio"><?= $communityController->getCommunityBio() ?></p>
            <div class="stats">
                <div class="stat">
                    <span class="count"><?= $communityController->getPostsCount() ?></span>
                    <span class="statName">Posts</span>
                </div>
                <div class="stat">
                    <span class="count"><?= $communityController->getRepliesCount() ?></span>
                    <span class="statName">Réponses</span>
                </div>
                <div class="stat">
                    <span class="count"><?= $communityController->getCommunityMembersCount() ?></span>
                    <span class="statName">Membres</span>
                </div>
            </div>
        </div>
        <div class="page-tabs">
            <a href=" /c/<?= $communityController->getCommunityUID() ?>/<?= (@$_GET['tabs'] == '' || @$_GET['tabs'] == 'posts' || is_null(@$_GET['tabs'])) ? 'posts' : 'posts' ?>" class="<?= (@$_GET['tabs'] == '' || @$_GET['tabs'] == 'posts' || is_null(@$_GET['tabs'])) ? 'active' : '' ?>">Posts</a>
            <a href="/c/<?= $communityController->getCommunityUID() ?>/<?= (@$_GET['tabs'] == 'members') ? 'members' : 'members' ?>" class="<?= (@$_GET['tabs'] == 'members') ? 'active' : '' ?>">Membres</a>
            <a href="/c/<?= $communityController->getCommunityUID() ?>/<?= (@$_GET['tabs'] == 'about') ? 'about' : 'about' ?>" class="<?= (@$_GET['tabs'] == 'about') ? 'active' : '' ?>">Informations</a>
        </div>
    </div>

    <div class="page-tab">
        <?php
        if (@$_GET['tabs'] == '' || @$_GET['tabs'] == 'posts' || is_null(@$_GET['tabs'])) {
            require('templates/components/post-skeleton.php');
            foreach ($posts as $post) {
                require('templates/components/post.php');
            }
            echo '<div id="new-posts"></div>';
        } elseif (@$_GET['tabs'] == 'members') {
            require('templates/components/account-skeleton.php');
            foreach ($users as $user) {
                require('templates/components/account.php');
            }
            echo '<div id="new-posts"></div>';
        } elseif (@$_GET['tabs'] == 'about') {
        ?>
            <div class="community-infos">
                <h2 class="title">Informations de la communauté</h2>
                <div class="infos">
                    <div class="info">
                        <div class="icon">
                            <?= $communityController->getSVG("communities", true) ?>
                        </div>
                        <div class="stat">
                            <span><?= $communityController->getCommunityMembersCount() ?> </span>
                            membres
                        </div>
                    </div>
                    <div class="info">
                        <div class="icon">
                            <?= $communityController->getSVG("user", true) ?>
                        </div>
                        <div class="stat">
                            Créee par
                            <a href="/user/<?= $communityController->getCommunityAuthor() ?>">
                                <span>@<?= $communityController->getCommunityAuthor() ?></span>
                            </a>
                        </div>
                    </div>
                    <div class="info">
                        <div class="icon">
                            <?= $communityController->getSVG("date", true) ?>
                        </div>
                        <div class="stat">
                            Créee le <span><?= $communityController->getCreationDate() ?></span>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>

<script>
    $(window).scroll(function() {
        if ((($(window).scrollTop() + $(window).height()) + 5) >= $(document).height()) {
            loadMorePosts('', 'loadMorePosts');
        }
    });
</script>