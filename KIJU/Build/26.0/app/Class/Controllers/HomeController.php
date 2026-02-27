<?php

namespace KIJU\Controllers;

use KIJU\Controllers\BaseController;
use KIJU\App;

/**
 * Classe représentant la page 'home' du site
 *
 * Cette classe permet de récupérer les publications sur la page d'accueil
 */
class HomeController extends BaseController
{
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
     * Récupère les publications sur la page courante
     *
     * @return array
     */
    public function getAllPosts(): array
    {
        if (App::isLogged()) {
            $query = "
            SELECT *
            FROM post p
            WHERE (p.UserID <> ?) AND p.RefID IS NULL
            AND p.Deleted = 0
            ORDER BY p.CreationDate DESC
            LIMIT 10;
            ";
            $params = [$this->getUserId()];
        } else {
            $query = "
            SELECT *
            FROM post p
            WHERE p.RefID IS NULL
            AND p.Deleted = 0
            ORDER BY p.CreationDate DESC
            LIMIT 10;
            ";
            $params = [];
        }

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
        if (App::isLogged()) {
            $query = "SELECT *
            FROM post p
            WHERE (p.UserID <> ?) AND (p.PostID < ?) AND p.RefID IS NULL
            ORDER BY p.CreationDate
            LIMIT 10;";

            $params = [$this->getUserId()];
        } else {
            $query = "SELECT *
            FROM post p
            WHERE (p.PostID < ?) AND p.RefID IS NULL
            ORDER BY p.CreationDate
            LIMIT 10;";

            $params = [];
        }

        $posts = $this->loadMorePosts($query, $params, $lastPostID);

        return $posts;
    }
}
