<?php

use KIJU\App;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= App::$title; ?></title>
    <link rel="icon" href="<?= App::$icon; ?>" />
    <link rel="apple-touch-icon" href="<?= App::$icon; ?>" />
    <meta name="theme-color" content="#c900ff" />
    <meta name="description" content="Create an account or log in to Kiju - A simple way to share share photos, videos with friends & family." />
    <meta name="keywords" content="kiju, social, kiju.me, Kiju, share, friends, communities, community, post, posts, kiju+" />
    <meta name="robots" content="index, follow" />

    <meta property="og:title" content="Kiju" />
    <meta property="og:description" content="Create an account or log in to Kiju - A simple way to share share photos, videos with friends & family." />
    <meta property="og:url" content="https://kiju.me/" />
    <meta property="og:type" content="website" />

    <meta name="twitter:card" content="Kiju" />
    <meta name="twitter:site" content="@KijuApp" />
    <meta name="twitter:title" content="Kiju" />
    <meta name="twitter:description" content="Connect with your friends and share about your passions." />

    <link rel="stylesheet" href="<?= App::$ASSETS_DOMAIN ?>css/<?= App::$LOCAL ?>style.css?v=<?= random_int(1000000000, 9999999999) ?>">
    <link rel="stylesheet" href="<?= App::$ASSETS_DOMAIN ?>css/<?= App::$LOCAL ?>mobile.css?v=<?= random_int(1000000000, 9999999999) ?>">
    <link rel="stylesheet" href="https://assets.kiju.me/css/pace.css">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <script src="https://kit.fontawesome.com/d749d58854.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <?php
    if (App::isLogged()) {
        require 'elements/modal/new.php';
        require 'elements/modal/add.php';
        require 'elements/modal/community.php';
    }
    ?>
    <?php require 'elements/nav.php'; ?>
    <main class="main_HomePage wrapper">
        <div class="container">
            <?php require 'elements/sidebar.php'; ?>
            <div class="content">
                <?= $content ?>
            </div>
            <?php require 'elements/right_content.php'; ?>
        </div>
        <?php require 'elements/mobile_nav.php'; ?>
        <?php require 'elements/toast_box.php'; ?>
        <?php require 'elements/modal/plus.php'; ?>
        <?php require 'elements/modal/about.php'; ?>
    </main>

    <div class="dev-build">
        <span><?= App::getBuildVersion() ?></span>
    </div>

    <script>
        $(document).ready(function() {
            $(".search-input").keyup(function() {
                var input = $(this).val();
                if (input !== "") {
                    $.ajax({
                        url: "<?= App::$base_version ?>/public/core/3L42XjJaDYaiv3523ycZ",
                        method: "POST",
                        data: {
                            input: input
                        },
                        success: function(data) {
                            $(".results").html(data);
                        }
                    });
                } else {
                    $(".results").empty();
                }
            });
        });
    </script>

    <script type="module" src="<?= App::$base_version ?>/public/ajax/<?= App::$LOCAL ?>main.js?v=<?= random_int(1000000000, 9999999999) ?>"></script>
    <script src="<?= App::$ASSETS_DOMAIN ?>js/<?= App::$LOCAL ?>global.rTLrQ7VptB59g7429Lsu.js?v=<?= random_int(1000000000, 9999999999) ?>"></script>
    <?php
    if (isset($_GET['err'])) {
        echo '<script>showToast("' . $_GET['err'] . '");</script>';
    }
    ?>
</body>

</html>