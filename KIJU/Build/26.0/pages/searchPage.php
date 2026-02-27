<?php

use KIJU\Controllers\SearchController;

if (!isset($_GET['query'])) {
    header('Location: home');
}

$query = $_GET['query'];
if (substr($_GET['query'], 0, 8) === "hashtag_") {
    $query = "#" . substr($_GET['query'], 8);
}

$searchController = new SearchController(htmlspecialchars($query));

$users = $searchController->getUsers();
$posts = $searchController->getAllPosts();
$communities = $searchController->getCommunities();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $searchController->managePosts();
}
?>
<div class="search">
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
                            <?= $searchController->getSVG('search', false) ?>
                        </div>
                        <div class="data">
                            <span class="name">Voir tous les posts</span>
                        </div>
                    </div>
                </a>
            </div>
        </form>
    </div>
    <div class="page-tabs">
        <a href="/search/<?= (@$_GET['type'] == '' || @$_GET['type'] == 'posts' || is_null(@$_GET['type'])) ? 'posts' : 'posts' ?>/<?= htmlspecialchars($_GET['query']) ?>" class="<?= (@$_GET['type'] == '' || @$_GET['type'] == 'posts' || is_null(@$_GET['type'])) ? 'active' : '' ?>">Publications</a>
        <a href="/search/<?= (@$_GET['type'] == 'users') ? 'users' : 'users' ?>/<?= htmlspecialchars($_GET['query']) ?>" class="<?= (@$_GET['type'] == 'users') ? 'active' : '' ?>">Utilisateurs</a>
        <a href="/search/<?= (@$_GET['type'] == 'communities') ? 'communities' : 'communities' ?>/<?= htmlspecialchars($_GET['query']) ?>" class="<?= (@$_GET['type'] == 'communities') ? 'active' : '' ?>">Communautés</a>
    </div>
    <div class="page-tab">
        <div class="posts">
            <?php if (@$_GET['type'] == 'posts') : ?>
                <?php require('templates/components/post-skeleton.php'); ?>
                <?php foreach ($posts as $post) : ?>
                    <?php require('templates/components/post.php'); ?>
                <?php endforeach; ?>
                <div id="new-posts"></div>
            <?php elseif (@$_GET['type'] == 'users') : ?>
                <?php require('templates/components/account-skeleton.php'); ?>
                <?php foreach ($users as $user) : ?>
                    <?php require('templates/components/account.php'); ?>
                <?php endforeach; ?>
            <?php elseif (@$_GET['type'] == 'communities') : ?>
                <div class="communities">
                    <?php foreach ($communities as $community) : ?>
                        <?php
                        $users = $searchController->getCommunitiesMembers($community->getCommunityId());
                        require('templates/components/community.php');
                        ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
    $(window).scroll(function() {
        if ((($(window).scrollTop() + $(window).height()) + 5) >= $(document).height()) {
            <?php
            if (@$_GET['type'] == 'posts' || @$_GET['type'] == '') {
                echo "loadMorePosts('', 'loadMorePosts');";
            }
            ?>
        }
    });
</script>