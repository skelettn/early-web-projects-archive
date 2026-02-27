<?php

use KIJU\App;

$communities = App::getUser()->getMyCommunities();
?>
<h2 class="title">Mes communautés</h2>
<p class="desc">Modifiez vos communautés Kiju.</p>
<section>
    <ul class="actions">
        <?php foreach ($communities as $c) : ?>
            <a href="/ac/community/<?= $c->getCommunityUID() ?>">
                <li class="action">
                    <span><?= $c->getCommunityName() ?></span>
                    <i class="lni lni-chevron-right"></i>
                </li>
            </a>
        <?php endforeach; ?>
    </ul>
</section>