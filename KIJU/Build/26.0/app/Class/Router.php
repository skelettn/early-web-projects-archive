<?php

namespace KIJU;

class Router
{
    /**
     * Met en relation l'url et l'affichage du contenu
     *
     * @return void
     */
    public static function route($p): void
    {
        switch ($p) {
            case 'home':
                require '../pages/homePage.php';
                break;
            case 'profile':
                require '../pages/profilePage.php';
                break;
            case 'discover':
                require '../pages/discoverPage.php';
                break;
            case 'community':
                require '../pages/communityPage.php';
                break;
            case 'communities':
                require '../pages/communitiesPage.php';
                break;
            case 'updates':
                require '../pages/updatesPage.php';
                break;
            case 'view_post':
                require '../pages/viewPostPage.php';
                break;
            case 'search':
                require '../pages/searchPage.php';
                break;
            case 'access':
                require '../pages/accessPage.php';
                break;
            case '404':
                require '../pages/404Page.php';
                break;
            default:
                require '../pages/homePage.php';
                break;
        }
    }
}
