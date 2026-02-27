<a href="/user/<?= $user->getUsername(); ?>">
    <div class="account account-loaded" data-user-id="<?= $user->getId() ?>">
        <div class="profilePicture">
            <img src="<?= $user->getProfilePicture(); ?>" alt="<?= $user->getUsername(); ?>">
        </div>
        <div class="data">
            <h5 class="fullName">
                <?= $user->getUsername(); ?>
                <?php
                if ($user->getVerifedStatus()) {
                    echo '<img src="https://assets.kiju.me/img/1123/verified_badge_purple.png" class="badge" alt="Verified" title="Verified">';
                }
                ?>
            </h5>
            <h5 class="userName">@<?= $user->getUsername(); ?></h5>
        </div>
    </div>
</a>