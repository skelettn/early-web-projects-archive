<?php

namespace KIJU\Controllers;

use KIJU\Controllers\BaseController;
use KIJU\App;
use KIJU\Community\Community;
use KIJU\User\User;
use KIJU\Posts\Post;
use Exception;
use PDOException;

/**
 * Classe représentant la page 'discover' du site
 *
 * Cette classe permet de récupérer les informations de vitrine pour la page
 */
class DiscoverController extends BaseController
{
    /**
     * Gestion des actions sur les publications
     *
     * @return void
     */
    public function managePosts(): void
    {
        $this->verifyPostAction();
    }

    /**
     * Récupère des communautés à afficher
     *
     * @return array
     */
    public function getCommunities(): array
    {
        $getData = App::getDatabase()->executeQuery('SELECT * FROM community ORDER BY RAND() LIMIT 10', []);
        $communities = $getData->fetchAll();

        $commuArray = array_map(function ($community) {
            return new Community($community['CommunityID']);
        }, $communities);

        return $commuArray;
    }

    /**
     * Récupère les publications aléatoires
     *
     * @return array
     */
    public function getRandomPosts()
    {
        $query = "SELECT * FROM post WHERE RefID IS NULL ORDER BY RAND() LIMIT 10";
        return $this->getPosts($query, []);
    }

    /**
     * Récupère les publications à afficher
     *
     * @param string $query Reqûete à exécuter
     * @param string $param Paramètres de la reqûete à exécuter
     * @return array
     */
    public function getPosts(string $query, array $param): array
    {
        $getPosts = App::getDatabase()->executeQuery($query, $param);
        $posts = $getPosts->fetchAll();

        $postsArray = array_map(function ($post) {
            return new Post(
                $post['PostID']
            );
        }, $posts);

        return $postsArray;
    }
}
