<?php

namespace KIJU\Controllers\Modals;

use KIJU\App;
use KIJU\Controllers\BaseController;
use KIJU\Posts\AddPost;

/**
 * Classe représentant le modal de création de publications.
 *
 * Cette classe permet de créer une publication.
 */
class PostController extends BaseController
{
    /**
     * Vérifie si le type de communauté existe
     *
     * @param string $community Communauté
     * @return bool
     */
    public function isCommunityExist($community): bool
    {
        $getCommunity = App::getDatabase()->executeQuery('SELECT * FROM community WHERE CommunityUID = ?', [$community]);
        $isExist = $getCommunity->rowCount();

        return $isExist;
    }

    /**
     * Créer une publication
     *
     * @param $content Contenu du commentaire
     * @param $community Communauté
     * @param $media Média s'il existe
     * @return void
     */
    public function addPost($content, $community, $medias): void
    {
        if ($this->isCommunityExist($community)) {
            $addPost = new AddPost($content, $medias, $this->getCommunityID($community));
            $addPost->addPost();
        }

        header('location /home');
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

    /**
     * Récupère l'identifiant de la communauté selon le type
     *
     * @param string $community Identifiant unique de la communauté
     * @return int
     */
    public function getCommunityID($community): string
    {
        $getCommunityID = App::getDatabase()->executeQuery('SELECT CommunityID FROM community WHERE CommunityUID = ?', [$community]);
        $communityID = $getCommunityID->fetchColumn();

        return $communityID;
    }
}
