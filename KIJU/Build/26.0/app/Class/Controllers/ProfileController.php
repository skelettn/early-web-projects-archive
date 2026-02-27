<?php

namespace KIJU\Controllers;

use KIJU\Controllers\BaseController;
use KIJU\App;
use KIJU\User\User;
use Exception;
use PDOException;

/**
 * Classe représentant la page 'profile' du site
 *
 * Cette classe permet d'afficher des informations de l'utilisateur passé en paramètre et de gérer les actions
 */
class ProfileController extends BaseController
{

    private $name;
    private $user;

    /**
     * Constructeur
     *
     * @param string $name Nom d'utilisateur
     * @return void
     */
    public function __construct($name)
    {
        $this->name = $name;
        $this->isProfileExist();

        $getProfile = App::getDatabase()->executeQuery('SELECT UserID FROM user WHERE `Username` = ?', [$this->name]);

        $id = $getProfile->fetchColumn();
        $this->user = new User($id);
    }

    /**
     * Vérifie si le profil existe
     *
     * @return void
     */
    public function isProfileExist(): void
    {
        $req = App::getDatabase()->executeQuery('SELECT * FROM user WHERE `Username` = ?', [$this->name]);
        $exist = $req->rowCount();

        if ($exist < 1) {
            header('location: /home');
            exit;
        }
    }

    /**
     * Renvoie le nom d'utilisateur du profil
     *
     * @return string
     */
    public function getUsername(): string
    {
        return $this->name;
    }

    /**
     * Vérifie s'il existe une relation entre l'utilisateur et l'utilisateur connecté
     *
     * @return bool
     */
    public function isRelation(): bool
    {
        $getData = App::getDatabase()->executeQuery('SELECT * FROM follower WHERE UserFollowedID = ? AND UserFollowerID = ?', [$this->getId(), App::getUser()->getId()]);
        $data = $getData->rowCount();

        return $data >= 1;
    }

    /**
     * Créer une relation entre l'utilisateur et l'utilisateur connecté
     *
     * @return void|null
     */
    public function addRelation()
    {
        try {
            $addRelation = App::getDatabase()->executeQuery('INSERT INTO follower (`UserFollowedID`, `UserFollowerID`, `CreationDate`) VALUES (?,?,?)', [$this->getId(), App::getUser()->getId(), date('Y-m-d H:i:s')]);
            header('location: /user/' . $this->getUsername() . '&err=KIJU_Follow');
            exit;
        } catch (Exception $e) {
            echo 'kiju_dev_error_9';
            return null;
        } catch (PDOException $e) {
            echo 'kiju_dev_error_9';
            return null;
        }
    }

    /**
     * Supprime la relation entre l'utilisateur et l'utilisateur connecté
     *
     * @return void|null
     */
    public function delRelation()
    {
        try {
            $delRelation = App::getDatabase()->executeQuery('DELETE FROM follower WHERE UserFollowedID = ? AND UserFollowerID = ?', [$this->getId(), App::getUser()->getId()]);
            header('location: /user/' . $this->getUsername() . '&err=KIJU_Unfollow');
            exit;
        } catch (Exception $e) {
            echo 'kiju_dev_error_10';
            return null;
        } catch (PDOException $e) {
            echo 'kiju_dev_error_10';
            return null;
        }
    }

    /**
     * Récupère l'action relative à la relation
     *
     * @return void
     */
    public function profileAction()
    {
        if ($this->isRelation()) {
            return $this->delRelation();
        }
        return $this->addRelation();
    }

    /**
     * Vérifie si l'utilisateur connecté est déja amis avec l'utilisateur
     *
     * @return bool
     */
    public function isFriends(): bool
    {
        $checkRelation = App::getDatabase()->executeQuery('SELECT * FROM follower WHERE (UserFollowedID = ? AND UserFollowerID = ?) OR (UserFollowedID = ? AND UserFollowerID = ?)', [$this->getId(), App::getUser()->getId(), App::getUser()->getId(), $this->getId()]);
        $relation = $checkRelation->rowCount();

        return $relation >= 2;
    }

    /**
     * Vérifie si l'utilisateur connecté est suivi par l'utilisateur
     *
     * @return bool
     */
    public function isFollowingMe(): bool
    {
        $checkRelation = App::getDatabase()->executeQuery('SELECT * FROM follower WHERE UserFollowedID = ? AND UserFollowerID = ?', [App::getUser()->getId(), $this->getId()]);
        $relation = $checkRelation->rowCount();

        return $relation >= 1;
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
     * Récupère les publications sur la page courante
     *
     * @return array
     */
    public function getAllPosts(): array
    {
        if (@$_GET['tabs'] != 'replies') {
            $query = "SELECT p.PostID, p.PostUniqueID, p.UserID, p.Content, p.CommunityID, p.CreationDate, p.Deleted
            FROM post p
            LEFT JOIN repost r ON r.PostID = p.PostID AND r.UserID = ? 
            WHERE (p.UserID = ? OR r.UserID = ?) AND p.RefID IS NULL
            AND p.Deleted = 0
            ORDER BY CASE
                WHEN r.CreationDate IS NOT NULL THEN r.CreationDate
                ELSE p.CreationDate
            END DESC
            LIMIT 10;";
            $params = [$this->getId(), $this->getId(), $this->getId()];
        } else {
            $query = "SELECT * FROM post WHERE UserID = ? AND RefID IS NOT NULL AND Deleted = 0 ORDER BY PostID DESC LIMIT 10";
            $params = [$this->getId()];
        }

        $posts = $this->getLatestPosts($query, $params);
        return $posts;
    }

    /**
     * Récupère les publications restantes la page courante
     *
     * @return array
     */
    public function loadPosts($lastPostID)
    {
        $getPostID = App::getDatabase()->executeQuery('SELECT PostID FROM post WHERE PostUniqueID = ?', [$lastPostID]);
        $postID = $getPostID->fetchColumn();

        $query = "SELECT p.PostID, p.PostUniqueID, p.UserID, p.Content, p.CommunityID, p.CreationDate, p.Deleted
        FROM post p
        LEFT JOIN repost r ON r.PostID = p.PostID AND r.UserID = ?
        WHERE (p.UserID = ? OR r.UserID = ?) AND (p.PostID < ? OR r.PostID < ?) AND p.RefID IS NULL
        AND p.Deleted = 0
        ORDER BY CASE
            WHEN r.CreationDate IS NOT NULL THEN r.CreationDate
            ELSE p.CreationDate
        END DESC
        LIMIT 10;";

        $params = [$this->getId(), $this->getId(), $this->getId(), $postID];
        $posts = $this->loadMorePosts($query, $params, $lastPostID);

        return $posts;
    }

    /**
     * Récupère les followers du profil
     *
     * @return object
     */
    public function getFollowrs(): object
    {
        $data = App::getDatabase()->executeQuery('SELECT * FROM follower WHERE UserFollowedID = ? ORDER BY FollowerID DESC LIMIT 30', [$this->getId()]);

        return $data;
    }

    /**
     * Récupère les followers du profil
     *
     * @return array
     */
    public function getFollowers(): array
    {
        $followers = $this->getFollowrs()->fetchAll();
        $followersArray = array_map(function ($follower) {
            return new User($follower['UserFollowerID']);
        }, $followers);

        return $followersArray;
    }

    /**
     * Récupère le nombre d'abonné sur le profil
     *
     * @return int
     */
    public function getFollowersCount(): int
    {
        $followers = $this->getFollowrs()->rowCount();
        return $followers;
    }

    /**
     * Récupère le nombre de publications sur le profil
     *
     * @return int
     */
    public function getPostsCount(): int
    {
        $getPosts = App::getDatabase()->executeQuery('SELECT * FROM post WHERE UserID = ? AND RefID IS NULL', [$this->getId()]);
        $posts = $getPosts->rowCount();
        return $posts;
    }

    /**
     * Récupère le nombre de réponses sur le profil
     *
     * @return int
     */
    public function getRepliesCount(): int
    {
        $getReplies = App::getDatabase()->executeQuery('SELECT * FROM post WHERE UserID = ? AND RefID IS NOT NULL', [$this->getId()]);
        $replies = $getReplies->rowCount();
        return $replies;
    }

    /**
     * Récupère l'identifiant de l'utilisateur connecté
     *
     * @return int
     */
    public function getMyID(): int
    {
        return App::getUser()->getId();
    }

    /**
     * Récupère l'identifiant de l'utilisateur de la page actuelle
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->user->getId();
    }

    /**
     * Récupère le nom de l'utilisateur
     *
     * @return string
     */
    public function getProfileName(): string
    {
        return $this->user->getName();
    }

    /**
     * Récupère le nom d'utilisateur de l'utilisateur
     *
     * @return string
     */
    public function getProfileUsername(): string
    {
        return $this->user->getUsername();
    }

    /**
     * Récupère la photo de profil de l'utilisateur
     *
     * @return string
     */
    public function getProfilePP(): string
    {
        return $this->user->getProfilePicture();
    }

    /**
     * Récupère la biographie de l'utilisateur
     *
     * @return string
     */
    public function getBio(): string
    {
        return $this->user->getBio();
    }

    /**
     * Récupère la date de naissance de l'utilisateur
     *
     * @return string
     */
    public function getBirth(): string
    {
        return $this->user->getBirth();
    }

    /**
     * Récupère la localisation de l'utilisateur
     *
     * @return string
     */
    public function getLoc(): string
    {
        return $this->user->getLoc();
    }

    /**
     * Récupère le status vérifié de l'utilisateur
     *
     * @return bool
     */
    public function getVerifedStatus(): bool
    {
        return $this->user->getVerifedStatus();
    }
}
