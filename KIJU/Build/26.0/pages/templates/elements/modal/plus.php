<?php

use KIJU\App;

$plusModal = '
<div id="plusModal" class="modal kijuPlusModal">
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
            <h3 class="title">Abonnement Kiju+</h3>
            <span class="desc">Abonnez-vous dès maintenant à Kiju+ pour obtenir des avantages exclusifs.</span>
            <div class="features">
                <div class="feature">
                    <div class="icon">
                        <img src="https://assets.kiju.me/img/icons/users.svg" alt="More communities">
                    </div>
                    <div class="text">
                        <h5 class="title">Plus de communautés</h5>
                        <span class="desc">Fini la limite de 5 communautés pour les membres non vérifiés, dès maintenant créez autant que communautés que vous voulez.</span>
                    </div>
                </div>
                <div class="feature">
                    <div class="icon">
                        <img src="https://assets.kiju.me/img/icons/write.svg" alt="Write more">
                    </div>
                    <div class="text">
                        <h5 class="title">Écrivez plus</h5>
                        <span class="desc">Laisser parler votre créativité en faisant des publications de plus de 10 000 caractères au lieu de 2000.</span>
                    </div>
                </div>
                <div class="feature">
                    <div class="icon">
                        <img src="https://assets.kiju.me/img/icons/lab.svg" alt="Kiju Lab">
                    </div>
                    <div class="text">
                        <h5 class="title">Accédez aux nouvelles fonctionnalités</h5>
                        <span class="desc">Débloquez l\'accès à Kiju Lab pour accéder aux nouvelles fonctionnalités et corrections avant tout le monde.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="modalSubmit">
            <span class="infos">
                En souscrivant à Kiju+ vous acceptez les conditions générales d\'utilisation et conditions générales de vente de Kiju.
                L\'adhésion se renouvellera automatiquement chaque mois au tarif de 3,99 $ et peut être annulée à tout instant via l\'espace compte.
            </span>
            <form action="" method="post">
                <button>Indisponible temporairement</button>
            </form>
        </div>
    </div>
</div>
';
$plusModal = App::minifyHtml($plusModal);
echo $plusModal;
