<?php

namespace KIJU\Controllers;

use KIJU\Controllers\BaseController;
use KIJU\App;

/**
 * Classe représentant la page 'communities' du site
 *
 * Cette classe permet d'afficher les communautés de l'utilisateur ainsi que les communautés qu'il suit
 */
class CommunitiesController extends BaseController
{
    /**
     * Récupère les communautés crées l'utilisateur connecté
     *
     * @return array
     */
    public function getMyCommunities(): array
    {
        return App::getUser()->getMyCommunities();
    }

    /**
     * Récupère les communautés suivie(s) par l'utilisateur connecté
     *
     * @return array
     */
    public function getFollowedCommunities(): array
    {
        return App::getUser()->getFollowedCommunities();
    }
}
