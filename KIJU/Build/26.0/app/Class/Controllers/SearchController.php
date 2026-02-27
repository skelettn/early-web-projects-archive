<?php

namespace KIJU\Controllers;

use KIJU\Controllers\BaseController;
use KIJU\App;
use KIJU\Community\Community;
use KIJU\User\User;

/**
 * Classe représentant la page 'search' du site
 *
 * Cette classe permet d'afficher les informations de publications/utilisateurs avec la requête passé en paramètre
 */
class SearchController extends BaseController
{
    private $query;

    /**
     * Constructeur
     *
     * @param string $query Requête
     */
    public function __construct($query)
    {
        $this->query = $query;
    }

    /**
     * Gestion des actions sur les publications
     *
     * @return void
     */
    public function managePosts(): void
    {
        if ($_POST['action'] === 'loadMorePosts') {
            $lastPostID = htmlspecialchars($_POST['lastPostID']);
            $newPostsHTML = $this->loadPosts($lastPostID);
            echo $newPostsHTML;
            exit;
        }

        $this->verifyPostAction();
    }

    /**
     * Récupère les publications de base
     *
     * @return array
     */
    public function getAllPosts(): array
    {
        $query = "
        SELECT *
        FROM post p
        WHERE (p.Content LIKE ?) AND p.RefID IS NULL
        ORDER BY p.CreationDate DESC
        LIMIT 10;
            ";


        $q = '%' . $this->query . '%';
        $params = [$q];

        $posts = $this->getLatestPosts($query, $params);
        return $posts;
    }

    /**
     * Récupère les publications restantes la page courante
     *
     * @param int $lastPostID Identificant de la dernière publication affiché
     * @return array
     */
    public function loadPosts($lastPostID)
    {
        $query = "
        SELECT *
        FROM post p
        WHERE p.Content LIKE ? AND p.PostID < ? AND p.RefID IS NULL
        ORDER BY p.CreationDate
        LIMIT 10;";

        $q = '%' . $this->query . '%';
        $params = [$q];

        $posts = $this->loadMorePosts($query, $params, $lastPostID);

        return $posts;
    }

    /**
     * Récupère les utilisateurs en fonction de la requête
     *
     * @return array
     */
    public function getUsers(): array
    {
        $getUsers = App::getDatabase()->executeQuery("SELECT * FROM user WHERE Username LIKE ? LIMIT 10", [$this->query . '%']);
        $users = $getUsers->fetchAll();

        $usersArray = array_map(function ($user) {
            return new User($user['UserID']);
        }, $users);

        return $usersArray;
    }

    /**
     * Récupère les communautés en fonction de la requête
     *
     * @return array
     */
    public function getCommunities(): array
    {
        $getCommunities = App::getDatabase()->executeQuery("SELECT * FROM community WHERE Name LIKE ? LIMIT 10", [[$this->query . '%']]);
        $communities = $getCommunities->fetchAll();

        $communitiesArray = array_map(function ($community) {
            return new Community($community['CommunityID']);
        }, $communities);

        return $communitiesArray;
    }

    /**
     * Renvoie la requête de l'utilisateur
     *
     * @return string
     */
    public function getQuery(): string
    {
        return $this->query;
    }
}
