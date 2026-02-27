<?php

namespace KIJU;

class Router
{
    /**
     * Met en relation l'url et l'affichage du contenu
     *
     * @return string
     */
    public static function route($p)
    {
        switch ($p) {
            case 'auth':
                require '../pages/authPage.php';
                break;
            case 'next':
                require '../pages/nextPage.php';
                break;
            case 'ac':
                require '../pages/centerPage.php';
                break;
            case 'success':
                require '../pages/successPage.php';
                break;
            case 'logout':
                require '../pages/logoutPage.php';
                break;
            default:
                require '../pages/centerPage.php';
                break;
        }
    }
}
