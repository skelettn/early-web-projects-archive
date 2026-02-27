<?php

use KIJU\App;

$addModal = '
<div id="addModal" class="modal">
    <div class="modalContainer">
        <div class="modalHeader">
            <div class="modalLogo">
                <img src="https://about.kiju.me/assets/img/Social.png" alt="Kiju Beta">
            </div>
            <div class="modalClose">
                <i class="lni lni-close"></i>
            </div>
        </div>
        <div class="modalContent">
            <div class="links">
                <div class="link modalBtn" data-modal="postModal">
                    <img src="https://assets.kiju.me/img/icons/write-purple.svg" alt="" class="icon">
                    <span class="title">
                        Publication
                    </span>
                    <div class="arrow">
                        <i class="lni lni-chevron-right"></i>
                    </div>
                </div>
                <div class="link modalBtn" data-modal="addCommunityModal">
                    <img src="https://assets.kiju.me/img/icons/users-purple.svg" alt="" class="icon">
                    <span class="title">
                        Communauté
                    </span>
                    <div class="arrow">
                        <i class="lni lni-chevron-right"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
';
$addModal = App::minifyHtml($addModal);
echo $addModal;
