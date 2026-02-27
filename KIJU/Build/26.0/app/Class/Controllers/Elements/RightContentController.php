<?php

namespace KIJU\Controllers\Elements;

use KIJU\Controllers\BaseController;
use KIJU\App;
use KIJU\User\User;

/**
 * Classe représentant le contrôle du menu latérale droit 
 *
 */
class RightContentController extends BaseController
{

    /**
     * Récupère les abonnements des utilisateurs
     *
     * @return array
     */
    public function fetchSubscriptions(): array
    {
        $getSubscriptions = App::getDatabase()->executeQuery("SELECT * FROM follower WHERE UserFollowerID = ?", [App::getUser()->getId()]);
        $subscriptions = $getSubscriptions->fetchAll();

        $subscriptionsArray = array_map(function ($subscription) {
            return new User($subscription['UserFollowedID']);
        }, $subscriptions);

        return $subscriptionsArray;
    }
}
