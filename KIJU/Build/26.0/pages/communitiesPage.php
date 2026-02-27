<?php

use KIJU\Controllers\CommunitiesController;

$communitiesController = new CommunitiesController();

$myCommunities = $communitiesController->getMyCommunities();
$followedCommunities = $communitiesController->getFollowedCommunities();

?>
<div class="communitiesPage">
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
                            <?= $communitiesController->getSVG('search', false) ?>
                        </div>
                        <div class="data">
                            <span class="name">Voir tous les posts</span>
                        </div>
                    </div>
                </a>
            </div>
        </form>
    </div>
    <div class="communities myCommunities">
        <h2 class="title">Mes communautés</h2>
        <div class="communitiesContent">
            <?php foreach ($myCommunities as $c) : ?>
                <a href="/c/<?= $c->getCommunityUID() ?>">
                    <div class="community">
                        <div class="filter"></div>
                        <div class="data">
                            <h4 class="title"><?= $c->getCommunityName() ?></h4>
                            <span class="memberCount">
                                <span class="count"><?= $c->getCommunityMembersCount() ?></span> membres
                            </span>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="communities">
        <h2 class="title">Suivie(s)</h2>
        <div class="communitiesContent">
            <?php foreach ($followedCommunities as $c) : ?>
                <a href="/c/<?= $c->getCommunityUID() ?>">
                    <div class="community">
                        <div class="filter"></div>
                        <div class="data">
                            <h4 class="title"><?= $c->getCommunityName() ?></h4>
                            <span class="memberCount">
                                <span class="count"><?= $c->getCommunityMembersCount() ?></span> membres
                            </span>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="communities" id="kiju_search_communities_by_topic" style="display: none;">
        <h2 class="title">Rechercher par sujet</h2>
        <div class="topics">
            <div class="topic">
                <div class="name">
                    #FNAF
                </div>
                <span class="stats">
                    0.0k groupes
                </span>
            </div>
        </div>
        <div class="topic">
            <div class="name error">
                Cette fonctionnalité n'est pas encore disponible.
            </div>
        </div>
    </div>
</div>