<?php

use KIJU\App;

$aboutModal = '
<div id="aboutModal" class="modal">
    <div class="modalContainer aboutContainer">
        <div class="modalHeader">
            <div class="modalClose">
                <i class="lni lni-close"></i>
            </div>
        </div>
        <div class="modalContent aboutContent">
            <div class="logo">
                <img src="https://about.kiju.me/assets/img/Purple.png" alt="Kiju Beta">
            </div>
            <span class="version">Version ' . App::getBuildVersion() . '</span>
            <small class="copy">Copyright&copy;2023 KIJU. All Right Reserved</small>
        </div>
    </div>
</div>
';
$aboutModal = App::minifyHtml($aboutModal);
echo $aboutModal;
