<?php

namespace KIJU\Controllers\Components;

use Exception;
use KIJU\App;
use KIJU\Controllers\BaseController;
use PDOException;

/**
 * Classe représentant le contrôle d'une publication
 *
 * Cette classe gère les informations de la publication ainsi que les actions associés.
 */
class PostController extends BaseController
{
    private $post_UID;

    /**
     * Constructeur de la classe
     *
     * @param int $id Identifiant d'une publication
     */
    public function __construct($post_UID)
    {
        $this->post_UID = $post_UID;
    }

    /**
     * Vérifie si la publication est déja au status "d'aimé"
     *
     * @return bool
     */
    public function isAlreadyLiked(): bool
    {
        $isLiked = App::getDatabase()->executeQuery('SELECT * FROM `like` WHERE UserID = ? AND PostID = (SELECT PostID FROM post WHERE PostUniqueID = ?)', [App::getUser()->getId(), $this->post_UID]);
        $isLiked = $isLiked->rowCount();

        return $isLiked >= 1;
    }

    /**
     * Récupère l'ID de la publication selon son UID
     *
     * @return int
     */
    public function convertUIDToID(): int
    {
        $getID = App::getDatabase()->executeQuery('SELECT PostID FROM post WHERE PostUniqueID = ?', [$this->post_UID]);
        $id = $getID->fetchColumn();

        return $id;
    }

    /**
     * Ajoute un "j'aime" à la publication
     *
     * @return void
     */
    public function addLike(): void
    {
        $post_ID = $this->convertUIDToID($this->post_UID);
        $likeAction = App::getDatabase()->executeQuery('INSERT INTO `like` (UserID, PostID, CreationDate) VALUES (?,?,?)', [App::getUser()->getId(), $post_ID, date('Y-m-d H:i:s')]);
    }

    /**
     * Supprime un "j'aime" à la publication
     *
     * @return void
     */
    public function deleteLike(): void
    {
        $post_ID = $this->convertUIDToID($this->post_UID);
        $likeAction = App::getDatabase()->executeQuery('DELETE FROM `like` WHERE UserID = ? AND PostID = ?', [App::getUser()->getId(), $post_ID]);
    }

    /**
     * Vérifie si la publication est déja au status de "republié"
     *
     * @return bool
     */
    public function isAlreadyReposted(): bool
    {
        $isReposted = App::getDatabase()->executeQuery('SELECT * FROM repost WHERE UserID = ? AND PostID = (SELECT PostID FROM post WHERE PostUniqueID = ?)', [App::getUser()->getId(), $this->post_UID]);
        $isReposted = $isReposted->rowCount();

        return $isReposted >= 1;
    }

    /**
     * Vérifie si la publication est déja au status de "republié" par $id
     *
     * @param int $id Identificant de l'utilisateur
     * @return bool
     */
    public function isRepostedByID($id): int
    {
        $isReposted = App::getDatabase()->executeQuery('SELECT * FROM repost WHERE UserID = ? AND PostID = (SELECT PostID FROM post WHERE PostUniqueID = ?)', [$id, $this->post_UID]);
        $isReposted = $isReposted->rowCount();

        return $isReposted >= 1;
    }

    /**
     * Récupère le nom d'utilisateur de la personne qui a "republié" selon son $id
     *
     * @param int $id
     * @param string $name
     * @return string
     */
    public function getRepostedUsername($id, $name): string
    {
        if ($this->isRepostedByID($id)) {
            return $name;
        }
    }

    /**
     * Ajoute un "republié" à la publication
     *
     * @return void
     */
    public function addRepost(): void
    {
        $post_ID = $this->convertUIDToID($this->post_UID);
        $repostAction = App::getDatabase()->executeQuery('INSERT INTO repost (UserID, PostID, CreationDate) VALUES (?,?,?)', [App::getUser()->getId(), $post_ID, date('Y-m-d H:i:s')]);
    }

    /**
     * Supprime un "republié" à la publication
     *
     * @return void
     */
    public function deleteRepost(): void
    {
        $post_ID = $this->convertUIDToID($this->post_UID);
        $repostAction = App::getDatabase()->executeQuery('DELETE FROM repost WHERE UserID = ? AND PostID = ?', [App::getUser()->getId(), $post_ID]);
    }

    /**
     * Supprime la publication et supprime les médias
     *
     * @return @return void|null
     */
    public function deletePost()
    {
        try {
            $getMedia = App::getDatabase()->executeQuery('SELECT Media FROM post WHERE PostUniqueID = ?', [$this->post_UID]);
            $media = $getMedia->fetchColumn();

            if ($media != "") {
                $path = 'medias/' . $media;
                if (unlink($path)) {
                    $delPost = App::getDatabase()->executeQuery('UPDATE post SET Content = ?, Media = ?, Deleted = 1 WHERE PostUniqueID = ?', ["Ce post a été supprimé.", "", $this->post_UID]);

                    header('location: /p/' . $this->post_UID . '&err=KIJU_Deleted_Post');
                    exit;
                } else {
                    header('location: /p/' . $this->post_UID . '&err=KIJU_Error');
                    exit;
                }
            } else {
                $delPost = App::getDatabase()->executeQuery('UPDATE post SET Content = ?, Media = ?, Deleted = 1 WHERE PostUniqueID = ?', ["Ce post a été supprimé.", "", $this->post_UID]);

                header('location: /p/' . $this->post_UID . '&err=KIJU_Deleted_Post');
                exit;
            }
        } catch (Exception $e) {
            echo 'kiju_dev_error_4';
            return null;
        } catch (PDOException $e) {
            echo 'kiju_dev_error_4';
            return null;
        }
    }

    /**
     * Création d'une réponse d'une publication
     *
     * @return void|null
     */
    public function addQuote($content, $communityID)
    {
        $postUniqueID = $this->createPostUniqueID();
        try {
            $query = 'INSERT INTO post (PostUniqueID, UserID, QuotedID, Content, CommunityID, CreationDate, Deleted) VALUES (?,?,?,?,?,?,?)';
            $params = [$postUniqueID, App::getUser()->getId(), $this->getPostID(), $content, $communityID, date('Y-m-d H:i:s'), 0];
            $insertQuote = App::getDatabase()->executeQuery($query, $params);
        } catch (Exception $e) {
            echo 'kiju_dev_error_2';
            return null;
        } catch (PDOException $e) {
            echo 'kiju_dev_error_2';
            return null;
        }
    }

    /**
     * Récupère une publication
     *
     * @param $quote_id Identifiant du quote
     * @return array
     */
    public function getQuote(int $quote_id): array
    {
        $query = "SELECT DISTINCT * FROM post WHERE PostID = ?";
        $params = [$quote_id];
        $quote = $this->getLatestPosts($query, $params);
        return $quote;
    }

    /**
     * Récupère l'identifiant de la publication
     *
     * @return int
     */
    public function getPostID(): int
    {
        $getPostID = App::getDatabase()->executeQuery('SELECT PostID FROM post WHERE PostUniqueID = ?', [$this->post_UID]);
        $postID = $getPostID->fetchColumn();

        return $postID;
    }

    /**
     * Récupère l'identifiant de la publication
     *
     * @return int
     */
    public function getPostUID(): int
    {
        return $this->post_UID;
    }
}
