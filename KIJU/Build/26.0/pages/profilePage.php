<?php

use KIJU\Controllers\ProfileController;
use KIJU\App;

$userName = $_GET['profile_username'];
$profileController = new ProfileController($userName);

$followers = $profileController->getFollowers();

if (isset($_POST['profileAction'])) {
    echo $profileController->profileAction();
    exit;
}

$posts = $profileController->getAllPosts();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $profileController->managePosts();
}

?>
<div class="profile">
    <div class="fixed-infos">
        <a href="/home">
            <div class="return-action">
                <div class="icon"><i class="lni lni-arrow-left"></i></div>
            </div>
        </a>
        <span><?= $profileController->getProfileUsername() ?></span>
    </div>
    <div class="profile-data">
        <div class="banner">
            <div class="uid">
                <img src="https://assets.kiju.me/img/new/Base.png" alt="Kiju Beta">
                <span><?= $profileController->getId() ?></span>
            </div>
        </div>
        <div class="data">
            <div class="profilePicture">
                <?php if (!empty($profileController->getProfilePP())) : ?>
                    <img src="<?= $profileController->getProfilePP() ?>" alt="<?= $profileController->getProfileUsername() ?>">
                <?php endif; ?>
            </div>
            <div class="actions">
                <form action="" method="post">
                    <?php if (App::isLogged()) : ?>
                        <?php if ($profileController->getId() == $profileController->getMyID()) : ?>
                            <span class="status">Vous</span>
                            <a href="https://account.kiju.me/ac" class="join global">Modifier le profil</a>
                        <?php else : ?>
                            <?php if ($profileController->isFriends()) : ?>
                                <span class="status">Amis</span>
                            <?php elseif ($profileController->isFollowingMe()) : ?>
                                <span class="status">Vous suit</span>
                            <?php endif; ?>
                            <?php if (!$profileController->isRelation()) : ?>
                                <button class="join global" name="profileAction">S'abonner</button>
                            <?php else : ?>
                                <button class="join global fill" name="profileAction">Se désabonner</button>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </form>
            </div>
            <h1 class="name">
                <?= $profileController->getProfileName() ?>
                <?php if ($profileController->getVerifedStatus()) : ?>
                    <img src="https://assets.kiju.me/img/1123/verified_badge_purple.png" class="badge" alt="Verified User" title="Verified User">
                <?php endif; ?>
            </h1>
            <h3 class="userName">@<?= $profileController->getProfileUsername() ?></h3>
            <p class="bio">
                <?= $profileController->getBio() ?>
            </p>
            <div class="optional-data">
                <?php if (!empty($profileController->getBirth())) : ?>
                    <div class="birth"><i class="lni lni-gift"></i>Né le <?= $profileController->getBirth() ?></div>
                <?php endif; ?>

                <?php if (!empty($profileController->getLoc())) : ?>
                    <div class="loc"><i class="lni lni-map-marker"></i><?= $profileController->getLoc() ?></div>
                <?php endif; ?>
            </div>
            <div class="stats">
                <div class="stat">
                    <span class="count"><?= $profileController->getPostsCount() ?></span>
                    <span class="statName">Posts</span>
                </div>
                <div class="stat">
                    <span class="count"><?= $profileController->getRepliesCount() ?></span>
                    <span class="statName">Réponses</span>
                </div>
                <div class="stat">
                    <span class="count"><?= $profileController->getFollowersCount() ?></span>
                    <span class="statName">Abonnés</span>
                </div>
            </div>
        </div>
        <div class="page-tabs">
            <a href="/user/<?= $profileController->getProfileUsername() ?>/<?= (@$_GET['tabs'] == '' || @$_GET['tabs'] == 'posts' || is_null(@$_GET['tabs'])) ? 'posts' : 'posts' ?>" class="<?= (@$_GET['tabs'] == '' || @$_GET['tabs'] == 'posts' || is_null(@$_GET['tabs'])) ? 'active' : '' ?>">Posts</a>
            <a href="/user/<?= $profileController->getProfileUsername() ?>/<?= (@$_GET['tabs'] == 'replies') ? 'replies' : 'replies' ?>" class="<?= (@$_GET['tabs'] == 'replies') ? 'active' : '' ?>">Réponses</a>
            <a href="/user/<?= $profileController->getProfileUsername() ?>/<?= (@$_GET['tabs'] == 'followers') ? 'followers' : 'followers' ?>" class="<?= (@$_GET['tabs'] == 'followers') ? 'active' : '' ?>">Abonnés</a>
        </div>
    </div>

    <div class="page-tab">
        <div class="posts">
            <?php if (@$_GET['tabs'] != 'followers') : ?>
                <?php require('templates/components/post-skeleton.php'); ?>
                <?php foreach ($posts as $post) : ?>
                    <?php require('templates/components/post.php'); ?>
                <?php endforeach; ?>
                <div id="new-posts"></div>
            <?php else : ?>
                <?php require('templates/components/account-skeleton.php'); ?>
                <?php foreach ($followers as $user) : ?>
                    <?php require('templates/components/account.php'); ?>
                <?php endforeach; ?>
                <div id="new-posts"></div>
            <?php endif; ?>
        </div>
    </div>
</div>