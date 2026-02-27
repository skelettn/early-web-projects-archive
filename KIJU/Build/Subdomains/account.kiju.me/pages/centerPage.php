<?php

use KIJU\App;

$tab = htmlspecialchars($_GET['tab']);
$subtab  = htmlspecialchars($_GET['subtab']);
echo App::getAuth()->setAuthID();
?>
<div class="center">
    <div class="open-sidebar">
        <i class="lni lni-menu"></i>
    </div>
    <div class="sidebar">
        <img src="https://assets.kiju.me/img/new/Base.png" alt="Kiju" class="kiju-logo">
        <h1 class="title">Espace compte</h1>
        <p class="desc">Gérer l'intégralité de votre compte Kiju ainsi que les services associés.</p>
        <ul class="links">
            <a href="/ac/userdata">
                <li class="link <?php echo ($tab == "userdata") ? 'active' : ''; ?>">
                    <img src="https://assets.kiju.me/img/icons/user.svg" alt="User">
                    <span>Informations de compte</span>
                </li>
            </a>
            <a href="/ac/communities">
                <li class="link <?php echo ($tab == "communities" || $tab == "community") ? 'active' : ''; ?>">
                    <img src="https://assets.kiju.me/img/icons/users.svg" alt="Communities">
                    <span>Mes communautés</span>
                </li>
            </a>
            <a href="">
                <li class="link disabled">
                    <img src="https://assets.kiju.me/img/icons/shield.svg" alt="Security">
                    <span>Sécurité</span>
                </li>
            </a>
            <a href="">
                <li class="link disabled">
                    <img src="https://assets.kiju.me/img/icons/gift.svg" alt="Subscriptions">
                    <span>Mes abonnements</span>
                </li>
            </a>
            <a href="">
                <li class="link disabled">
                    <img src="https://assets.kiju.me/img/icons/lab.svg" alt="Kiju Lab">
                    <span>Kiju Lab</span>
                </li>
            </a>
            <a href="https://beta.kiju.me/">
                <li class="link">
                    <img src="https://assets.kiju.me/img/icons/arrow-left.svg" alt="Back">
                    <span>Retour vers Kiju</span>
                </li>
            </a>
            <a href="/logout">
                <li class="link">
                    <img src="https://assets.kiju.me/img/icons/exit.svg" alt="Logout">
                    <span>Déconnexion</span>
                </li>
            </a>
        </ul>
    </div>
    <div class="view">
        <img src="https://assets.kiju.me/img/new/Base.png" alt="Kiju" class="kiju-logo">
        <?php
        switch ($tab) {
            case 'userdata':
                switch ($subtab) {
                    case 'name':
                        require 'templates/tabs/subtab/name.php';
                        break;
                    case 'username':
                        require 'templates/tabs/subtab/username.php';
                        break;
                    case 'avatar':
                        require 'templates/tabs/subtab/avatar.php';
                        break;
                    case 'profiledata':
                        require 'templates/tabs/subtab/profiledata.php';
                        break;
                    case 'banner':
                        require 'templates/tabs/subtab/banner.php';
                        break;
                    default:
                        require 'templates/tabs/userdata.php';
                        break;
                }
                break;
            case 'communities':
                switch ($subtab) {
                    case 'edit':
                        require 'templates/tabs/subtab/edit.php';
                        break;
                    default:
                        require 'templates/tabs/communities.php';
                        break;
                }
                break;
            case 'community':
                switch ($subtab) {
                    default:
                        require 'templates/tabs/subtab/community_edit.php';
                        break;
                }
                break;
            default:
                require 'templates/tabs/userdata.php';
                break;
        }
        ?>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const openSidebarButton = document.querySelector(".open-sidebar");
        const sidebar = document.querySelector(".sidebar");

        openSidebarButton.addEventListener("click", function() {
            if (sidebar.style.marginLeft === "-100%") {
                sidebar.style.marginLeft = "0";
            } else {
                sidebar.style.marginLeft = "-100%";
            }
        });

        document.addEventListener("click", function(event) {
            if (sidebar.style.marginLeft === "0" && event.target !== sidebar && event.target !== openSidebarButton) {
                sidebar.style.marginLeft = "-100%";
            }
        });
    });
</script>