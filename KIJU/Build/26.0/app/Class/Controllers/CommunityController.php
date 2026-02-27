<?php

namespace KIJU\Controllers;

use KIJU\Controllers\BaseController;
use KIJU\App;
use KIJU\User\User;
use KIJU\Community\Community;
use Exception;
use PDOException;

/**
 * Classe représentant la page 'communauty' du site
 *
 * Cette classe permet de récupérer les informations de la communauté et de gérer les actions
 */
class CommunityController extends BaseController
{
    private $communityUID;
    private $community;

    /**
     * Constructeur
     *
     * @param string $communityUID Identifiant unique de la communauté
     */
    public function __construct($communityUID)
    {
        $this->communityUID = $communityUID;
        $this->isCommunityExist();

        $getID = App::getDatabase()->executeQuery('SELECT CommunityID FROM community WHERE `CommunityUID` = ?', [$this->communityUID]);

        $id = $getID->fetchColumn();

        $this->community = new Community($id);
    }

    /**
     * Vérifie si la communauté existe
     *
     * @return void
     */
    public function isCommunityExist(): void
    {
        $req = App::getDatabase()->executeQuery('SELECT * FROM community WHERE `CommunityUID` = ?', [$this->communityUID]);
        $exist = $req->rowCount();

        if ($exist < 1) {
            header('location: /home');
            exit;
        }
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
            WHERE (p.CommunityID = ?) AND p.RefID IS NULL
            ORDER BY p.CreationDate DESC
            LIMIT 10;
            ";

        $params = [$this->getCommunityId()];

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
            WHERE (p.CommunityID = ?) AND (p.PostID < ?) AND p.RefID IS NULL
            ORDER BY p.CreationDate
            LIMIT 10;";

        $params = [$this->getCommunityId()];

        $posts = $this->loadMorePosts($query, $params, $lastPostID);

        return $posts;
    }

    /**
     * Récupère les données de la communauté
     *
     * @return object
     */
    public function getCommunityMembr(): object
    {
        $data = App::getDatabase()->executeQuery('SELECT * FROM community_member WHERE CommunityID = ? ORDER BY CreationDate DESC LIMIT 15', [$this->getCommunityId()]);

        return $data;
    }

    /**
     * Récupère les membres de la communauté
     *
     * @return array
     */
    public function getCommunityMembers(): array
    {

        $members = $this->getCommunityMembr()->fetchAll();
        $membersArray = array_map(function ($member) {
            return new User($member['CommunityUserID']);
        }, $members);

        return $membersArray;
    }

    /**
     * Récupère le nombre de membre de la communauté
     *
     * @return int
     */
    public function getCommunityMembersCount(): int
    {
        $membersCount =  $this->getCommunityMembr()->rowCount();
        $membersCount = ($membersCount >= 100) ? number_format($membersCount / 1000, 1) . "k" : $membersCount;

        return $membersCount;
    }

    /**
     * Récupère le nombre de publications de la communauté
     *
     * @return int
     */
    public function getPostsCount(): int
    {
        $getPosts = App::getDatabase()->executeQuery('SELECT * FROM post WHERE CommunityID = ? AND RefID IS NULL', [$this->getCommunityId()]);
        $posts = $getPosts->rowCount();

        return $posts;
    }

    /**
     * Récupère le nombre de réponses de la communauté
     *
     * @return int
     */
    public function getRepliesCount(): int
    {
        $getReplies = App::getDatabase()->executeQuery('SELECT * FROM post WHERE CommunityID = ? AND RefID IS NOT NULL', [$this->getCommunityId()]);
        $replies = $getReplies->rowCount();
        return $replies;
    }

    /**
     * Vérifie si une relation existe entre l'utilisateur et la communauté
     *
     * @return bool
     */
    public function isRelation(): bool
    {
        $getData = App::getDatabase()->executeQuery('SELECT * FROM community_member WHERE CommunityID = ? AND CommunityUserID = ?', [$this->getCommunityId(), App::getUser()->getId()]);
        $data = $getData->rowCount();

        return $data >= 1;
    }

    /**
     * Créer une relation entre l'utilisateur et la communauté
     *
     * @return void|null
     */
    public function addRelation()
    {
        try {
            $addRelation = App::getDatabase()->executeQuery('INSERT INTO community_member (`CommunityUserID`, `CommunityID`, `CreationDate`) VALUES (?,?,?)', [App::getUser()->getId(), $this->getCommunityId(), date('Y-m-d H:i:s')]);
            header('location: /c/' . $this->communityUID . '&err=KIJU_Follow_Community');
            exit;
        } catch (Exception $e) {
            echo 'kiju_dev_error_5';
            return null;
        } catch (PDOException $e) {
            echo 'kiju_dev_error_5';
            return null;
        }
    }

    /**
     * Supprime la relation entre l'utilisateur et la communauté
     *
     * @return void|null
     */
    public function delRelation()
    {
        try {
            $delRelation = App::getDatabase()->executeQuery('DELETE FROM community_member WHERE CommunityUserID = ? AND CommunityID = ?', [App::getUser()->getId(), $this->getCommunityId()]);

            header('location: /c/' . $this->communityUID . '&err=KIJU_Unfollow_Community');
            exit;
        } catch (Exception $e) {
            echo 'kiju_dev_error_6';
            return null;
        } catch (PDOException $e) {
            echo 'kiju_dev_error_6';
            return null;
        }
    }

    /**
     * Récupère l'action relative à la relation
     *
     * @return void
     */
    public function communityAction()
    {
        if ($this->isRelation()) {
            return $this->delRelation();
        }
        return $this->addRelation();
    }

    /**
     * Vérifie si la communauté est celle de l'utilisateur connecté
     *
     * @return bool
     */
    public function isMyCommunity(): bool
    {
        $check = App::getDatabase()->executeQuery('SELECT * FROM community WHERE OwnerID = ? AND `Name`= ?', [App::getUser()->getId(), $this->getCommunityName()]);

        return $check->rowCount() >= 1;
    }

    /**
     * Récupère l'auteur de la communauté
     *
     * @return string
     */
    public function getCommunityAuthor(): string
    {
        $getAuthor = App::getDatabase()->executeQuery('SELECT Username FROM user WHERE UserID = ?', [$this->getCommunityOwnerID()]);
        $author = $getAuthor->fetchColumn();

        return $author;
    }

    /**
     * Récupère l'identifiant de la communauté
     *
     * @return int
     */
    public function getCommunityId(): int
    {
        return $this->community->getCommunityId();
    }

    /**
     * Récupère l'identifiant du créateur de la communauté
     *
     * @return int
     */
    public function getCommunityOwnerID(): int
    {
        return $this->community->getCommunityOwnerID();
    }

    /**
     * Récupère l'identifiant unique de la communauté
     *
     * @return string
     */
    public function getCommunityUID(): string
    {
        return $this->community->getCommunityUId();
    }

    /**
     *  Récupère le nom de la communauté
     *
     * @return string
     */
    public function getCommunityName(): string
    {
        return $this->community->getCommunityName();
    }

    /**
     * Récupère la bio de la communauté
     *
     * @return string
     */
    public function getCommunityBio(): string
    {
        return $this->community->getCommunityBio();
    }

    /**
     * Récupère la bannière de la communauté
     *
     * @return string
     */
    public function getCommunityBanner(): string
    {
        return $this->community->getCommunityBanner();
    }

    /**
     * Récupère le status de la communauté
     *
     * @return bool
     */
    public function getVerifedStatus(): bool
    {
        return $this->community->getCommunityStatus();
    }

    /**
     * Vérifie si la communauté est supprimée ou non
     *
     * @return bool
     */
    public function getDeleted(): bool
    {
        return $this->community->getDeleted();
    }

    /**
     * Récupère la date de création de la communauté
     *
     * @return string
     */
    public function getCreationDate(): string
    {
        return $this->community->getCreationDate();
    }
}
