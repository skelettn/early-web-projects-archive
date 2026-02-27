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

    <meta name="theme-color" content="#c900ff" />
    <meta name="description" content="Create an account or log in to Kiju - A simple way to share share photos, videos with friends & family." />
    <meta name="keywords" content="kiju, social, kiju.me, Kiju, share, friends, communities, community, post, posts, kiju+" />
    <meta name="robots" content="index, follow" />

    <link rel="stylesheet" href="<?= App::$ASSETS_DOMAIN ?>css/<?= App::$LOCAL ?>account.css?v=<?= random_int(1000000000, 9999999999) ?>">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <script src="https://kit.fontawesome.com/d749d58854.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <main>
        <div class="content">
            <?= $content ?>
        </div>
        <?php require 'elements/toast_box.php'; ?>
    </main>

    <script src="https://assets.kiju.me/js/account.wR59SpVUXjvq6k29dK36.js"></script>

    <?php
    if (isset($_GET['err'])) {
        echo '<script>showToast("' . $_GET['err'] . '");</script>';
    }
    ?>
</body>

</html>