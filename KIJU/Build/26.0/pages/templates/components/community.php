<a href="/c/<?= $community->getCommunityUID() ?>">
    <div class="community">
        <div class="banner" style="background-image: url('<?= $community->getCommunityBanner() ?>');"></div>
        <div class="data">
            <h4><?= $community->getCommunityName() ?></h4>
            <div class="subdata">
                <div class="profile-pictures">
                    <?php
                    foreach ($users as $user) {
                    ?>
                        <div class="profile-picture" style="background-image: url('<?= $user->getProfilePicture() ?>');"></div>
                    <?php
                    }
                    ?>
                </div>
                <span><strong><?= $community->getCommunityMembersCount() ?></strong> membres</span>
            </div>
        </div>
    </div>
</a>