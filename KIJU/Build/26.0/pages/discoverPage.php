<?php

use KIJU\Controllers\DiscoverController;
use KIJU\App;

$discoverController = new DiscoverController();
$hashtags = $discoverController->getHashtags();
$communities = $discoverController->getCommunities();
$posts = $discoverController->getRandomPosts();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $discoverController->managePosts();
}
?>
<div class="discover">
    <div class="fixed-infos">
        <a href="/home">
            <div class="return-action">
                <div class="icon"><i class="lni lni-arrow-left"></i></div>
            </div>
        </a>
        <form action="" method="post" class="fixed-search" id="searchForm">
            <input type="text" name="" id="searchInput" class="search-input" placeholder="Rechercher sur Kiju">
            <div class="results">
                <a href="/home">
                    <div class="result">
                        <div class="icon">
                            <?= $discoverController->getSVG('search', false) ?>
                        </div>
                        <div class="data">
                            <span class="name">Voir tous les posts</span>
                        </div>
                    </div>
                </a>
            </div>
        </form>
    </div>
    <div class="discoverPage">
        <div class="trending">
            <h2>Tendances 🔥</h2>
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
        </div>
        <div class="groups">
            <h2>Communautés</h2>
            <div class="communities">
                <?php
                foreach ($communities as $community) :
                    $users = $discoverController->getCommunitiesMembers($community->getCommunityId());
                ?>
                    <a href="/c/<?= $community->getCommunityUID() ?>">
                        <div class="community">
                            <div class="banner" style="background-image: url('<?= $community->getCommunityBanner() ?>');"></div>
                            <div class="data">
                                <h4><?= $community->getCommunityName() ?></h4>
                                <div class="subdata">
                                    <div class="profile-pictures">
                                        <?php foreach ($users as $user) : ?>
                                            <div class="profile-picture" style="background-image: url('<?= $user->getProfilePicture() ?>');"></div>
                                        <?php endforeach;    ?>
                                    </div>
                                    <span><strong><?= $community->getCommunityMembersCount() ?></strong> membres</span>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endforeach;  ?>
            </div>
        </div>
        <div class="posts">
            <h2>Vous allez aimer</h2>
            <div class="posts">
                <?php require('templates/components/post-skeleton.php'); ?>
                <?php foreach ($posts as $post) : ?>
                    <?php require('templates/components/post.php'); ?>
                <?php endforeach; ?>
            </div>
            <a href="/home" class="see-more">
                Charger plus
            </a>
        </div>
    </div>
</div>