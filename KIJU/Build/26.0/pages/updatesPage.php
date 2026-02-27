<?php

use KIJU\Controllers\UpdatesController;

$updatesController = new UpdatesController();
?>
<div class="updates">
    <div class="fixed-infos">
        <a href="/home">
            <div class="return-action">
                <div class="icon"><i class="lni lni-arrow-left"></i></div>
            </div>
        </a>
        <span>Mises à jours</span>
    </div>
    <div class="updatesPage">
        <?php $updatesController->showUpdates(); ?>
    </div>
</div>