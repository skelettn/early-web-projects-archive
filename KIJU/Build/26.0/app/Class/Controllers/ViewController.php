<?php

namespace KIJU\Controllers;

use DateTime;
use KIJU\Controllers\BaseController;
use KIJU\App;
use KIJU\Posts\Post;
use Exception;
use KIJU\Posts\AddPost;
use PDOException;

/**
 * Classe représentant la page 'view' du site
 *
 * Cette classe permet d'afficher les informations de la publication passé en paramètre ainsi que les réponses
 */
class ViewController extends BaseController
{
    private $post_id;

    /**
     * Constructeur
     *
     * @param string $post_id Identifiant de la publication
     */
    public function __construct($post_id)
    {
        $this->post_id = $post_id;
    }

    /**
     * Vérifie si la publication existe
     *
     * @return void
     */
    public function isPostExist(): void
    {
        $getPost = App::getDatabase()->executeQuery('SELECT * FROM post WHERE PostUniqueID = ?', [$this->post_id]);
        $isExist = $getPost->rowCount();

        if ($isExist < 1) {
            header('location: /home');
            exit;
        }
    }

    /**
     * Récupère les données de la publication
     *
     * @return object
     */
    public function getPost(): object
    {
        $getPost = App::getDatabase()->executeQuery('SELECT * FROM post WHERE PostUniqueID = ?', [$this->post_id]);
        $postData = $getPost->fetch();

        $post = new Post(
            $postData['PostID']
        );

        return $post;
    }

    /**
     * Récupère l'identifiant de la publication
     *
     * @return int
     */
    public function getPostID(): int
    {
        $getPostID = App::getDatabase()->executeQuery('SELECT PostID FROM post WHERE PostUniqueID = ?', [$this->post_id]);
        $postID = $getPostID->fetchColumn();

        return $postID;
    }

    /**
     * Vérifie si la publication est un commentaire
     *
     * @return bool
     */
    public function IsRefID(): bool
    {
        $getPost = App::getDatabase()->executeQuery('SELECT RefID FROM post WHERE PostUniqueID = ?', [$this->post_id]);
        $refID = $getPost->fetchColumn();

        return $refID != NULL;
    }

    /**
     * Récupère l'identifiant de la communauté en fonction de la publication
     *
     * @return int
     */
    public function getCommunityID(): int
    {
        $getCommunityID = App::getDatabase()->executeQuery('SELECT CommunityID FROM post WHERE PostUniqueID = ?', [$this->post_id]);
        $communityID = $getCommunityID->fetchColumn();

        return $communityID;
    }

    /**
     * Récupère l'identifiant de la référence de la publication
     *
     * @return int
     */
    public function getRefId(): int
    {
        if ($this->IsRefID()) {
            $getRefID = App::getDatabase()->executeQuery('SELECT RefID FROM post WHERE PostUniqueID = ?', [$this->post_id]);
            $refID = $getRefID->fetchColumn();

            return $refID;
        }

        return 0;
    }

    /**
     * Récupère l'identifiant unique de la référence de la publication
     *
     * @return string
     */
    public function getPostRefID(): string
    {
        $getRefID = App::getDatabase()->executeQuery('SELECT PostUniqueID FROM post WHERE PostID = ?', [$this->getRefId()]);
        $postRefID = $getRefID->fetchColumn();

        return $postRefID;
    }

    /**
     * Récupère la date de création de la publication
     *
     * @return string
     */
    public function getCreationDate(): string
    {
        $getPost = App::getDatabase()->executeQuery('SELECT CreationDate FROM post WHERE PostUniqueID = ?', [$this->post_id]);
        $creationDate = $getPost->fetchColumn();
        $creationDate = new DateTime($creationDate);
        $formattedDate = $creationDate->format('d M Y, H:i');

        return $formattedDate;
    }

    /**
     * Gestion des actions de publications
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
    public function loadPosts($lastPostID)
    {
        $query = 'SELECT * FROM post WHERE RefID = ? AND PostID < ? ORDER BY PostID DESC LIMIT 10';
        $params = [$this->getPostID()];
        $posts = $this->loadMorePosts($query, $params, $lastPostID);

        return $posts;
    }


    /**
     * Récupère les commentaires de la publication
     *
     * @return array
     */
    public function getComments()
    {
        $query = 'SELECT * FROM post WHERE RefID = ? ORDER BY CreationDate DESC LIMIT 10';
        $params = [$this->getPostID()];
        $comments = $this->getLatestPosts($query, $params);

        return $comments;
    }

    /**
     * Ajoute un commentaire
     *
     * @param $content Contenu du commentaire
     * @param $media Média s'il existe
     * @return void
     */
    public function addComment($content, $medias): void
    {
        $addPost = new AddPost($content, $medias, $this->getCommunityID(), $this->getPostID());
        $addPost->addPost();
    }
}
