<?php

namespace KIJU\Posts;

use KIJU\App;
use DateTime;

/**
 * Classe représentant une publication
 *
 * Cette classe permet de récupérer les informations d'une publication
 */
class Post
{
    private $PostId;

    private $postData;
    private $userData;
    private $communityData;

    /**
     * Constructeur
     *
     * @param int $postId Identifiant de la publication
     */
    public function __construct($postId)
    {
        $this->PostId = $postId;

        $this->setPostData();
        $this->setUserData();
        $this->setCommunityData();
    }

    /**
     * Enregistre les données de la publication
     *
     * @return void
     */
    public function setPostData(): void
    {
        $setPostData = App::getDatabase()->executeQuery('SELECT * FROM post WHERE PostID = ?', [$this->PostId]);
        $this->postData = $setPostData->fetch();
    }

    /**
     * Récupère les données de la publication
     *
     * @return array
     */
    public function getPostData(): array
    {
        return $this->postData;
    }

    /**
     * Enregistre les données utilisateur
     *
     * @return void
     */
    public function setUserData(): void
    {
        $setUserData = App::getDatabase()->executeQuery('SELECT * FROM user WHERE UserID = ?', [$this->getPostData()['UserID']]);
        $this->userData = $setUserData->fetch();
    }

    /**
     * Enregistre les données de communauté
     *
     * @return void
     */
    public function setCommunityData(): void
    {
        $setCommData = App::getDatabase()->executeQuery('SELECT * FROM community WHERE CommunityID = ?', [$this->getPostData()['CommunityID']]);
        $this->communityData = $setCommData->fetch();
    }

    /**
     * Détecte les liens, les mentions et les hashtags dans les publications pour les afficher avec un style différent
     *
     * @param int $content Contenu de la publication
     * @return string
     */
    public function detectLinksMentionsHashtags($content): string
    {
        // Detection des liens
        $linkPattern = '/\b(https?:\/\/\S+)\b/';
        $content = preg_replace($linkPattern, '<a href="$1" target="_blank">$1</a>', $content);

        // Detection des mentions
        $mentionPattern = '/@(\w+)/';
        $content = preg_replace($mentionPattern, '<a href="/user/$1">@$1</a>', $content);

        // Detection des hashtags
        $hashtagPattern = '/#(\w+)/';
        $content = preg_replace($hashtagPattern, '<a href="/search/posts/hashtag_$1">#$1</a>', $content);

        return $content;
    }

    /**
     * Affiche la date de publication en fonction du temps actuel
     *
     * @return string
     */
    public function displayElapsedTime(): string
    {
        $now = new DateTime();
        $date = new DateTime($this->getCreationDate());
        $diff = $now->diff($date);

        if ($diff->y > 0) {
            return "Il y a " . $diff->y . " an(s)";
        } elseif ($diff->m > 0) {
            return "Il y a " . $diff->m . " mois";
        } elseif ($diff->d > 0) {
            return "Il y a " . $diff->d . " jour(s)";
        } elseif ($diff->h > 0) {
            return "Il y a " . $diff->h . " heure(s)";
        } elseif ($diff->i > 0) {
            return "Il y a " . $diff->i . " minute(s)";
        } else {
            return "Il y a quelques instants";
        }
    }

    /**
     * Récupère le nombre de j'aime de la publication
     *
     * @return int
     */
    public function getLikes(): int
    {
        $getLikes = App::getDatabase()->executeQuery('SELECT * FROM `like` WHERE PostID = ?', [$this->PostId]);
        $likes = $getLikes->rowCount();

        return $likes;
    }

    /**
     * Récupère le nombre de republication de la publication
     *
     * @return int
     */
    public function getShares(): int
    {
        $getShares = App::getDatabase()->executeQuery('SELECT * FROM shares WHERE PostID = ?', [$this->PostId]);
        $shares = $getShares->rowCount();

        return $shares;
    }

    /**
     * Récupère le nombre de commentaire de la publication
     *
     * @return int
     */
    public function getComments(): int
    {
        $getComments = App::getDatabase()->executeQuery('SELECT * FROM post WHERE RefID IS NOT NULL AND RefID = ?', [$this->PostId]);
        $comments = $getComments->rowCount();

        return $comments;
    }

    /**
     * Vérifie si la publication est un commentaire
     *
     * @return bool
     */
    public function IsRefID(): bool
    {
        $getPost = App::getDatabase()->executeQuery('SELECT RefID FROM post WHERE PostID = ?', [$this->PostId]);
        $refID = $getPost->fetchColumn();

        return $refID != NULL;
    }


    /**
     * Si c'est un commentaire, renvoie son RefID
     *
     * @return mixed
     */
    public function getRefId(): mixed
    {
        if ($this->IsRefID()) {
            $getPost = App::getDatabase()->executeQuery('SELECT RefID FROM post WHERE PostID = ?', [$this->PostId]);
            $refID = $getPost->fetchColumn();

            return $refID;
        }

        return 0;
    }

    /**
     * Vérifie si la publication est un quote
     *
     * @return bool
     */
    public function isQuotedID(): bool
    {
        $getPost = App::getDatabase()->executeQuery('SELECT QuotedID FROM post WHERE PostID = ?', [$this->PostId]);
        $quotedID = $getPost->fetchColumn();

        return $quotedID != NULL;
    }


    /**
     * Si c'est un quote, renvoie son QuotedID
     *
     * @return mixed
     */
    public function getQuotedID(): mixed
    {
        if ($this->isQuotedID()) {
            $getPost = App::getDatabase()->executeQuery('SELECT QuotedID FROM post WHERE PostID = ?', [$this->PostId]);
            $quotedID = $getPost->fetchColumn();

            return $quotedID;
        }

        return 0;
    }

    /**
     * Si c'est un commentaire, Récupère l'utilisateur de la publication mère
     *
     * @return string
     */
    public function getUserSource(): string
    {
        $refID = $this->getRefId();

        $getSourceID = App::getDatabase()->executeQuery('SELECT UserID FROM post WHERE PostID = ?', [$refID]);
        $sourceID = $getSourceID->fetchColumn();

        $getSourceName = App::getDatabase()->executeQuery('SELECT Username FROM user WHERE UserID = ?', [$sourceID]);
        $sourceName = $getSourceName->fetchColumn();

        return $sourceName;
    }

    /**
     * Vérifie si la publication appartient à l'utilisateur connecté
     *
     * @param int $post_ID Identifiant de la publication
     * @return bool
     */
    public function isMyPost($post_ID): bool
    {

        if (App::isLogged()) {
            $getUserID = App::getDatabase()->executeQuery('SELECT UserID FROM post WHERE PostUniqueID = ?', [$post_ID]);
            $userID = $getUserID->fetchColumn();

            return $userID == App::getUser()->getId();
        }

        return false;
    }

    /**
     * Récupère le contenu de la publication avec le style modifié
     *
     * @return string
     */
    public function getContent(): string
    {
        return $this->detectLinksMentionsHashtags($this->getPostData()['Content']);
    }

    /**
     * Récupère les médias de la publication
     *
     * @return array
     */
    public function getMedias(): array
    {
        $getMedias = App::getDatabase()->executeQuery('SELECT * FROM media WHERE PostID = ?', [$this->PostId]);
        $medias = $getMedias->fetchAll();

        $mediasArray = array_map(function ($media) {
            return new Media($media['MediaID']);
        }, $medias);

        return $mediasArray;
    }

    /**
     * Récupère le nom d'utilisateur de la personne qui a publiée
     *
     * @return string
     */
    public function getUsername(): string
    {
        return $this->userData['Username'];
    }

    /**
     * Récupère la photo de profil de la personne qui a publiée
     *
     * @return string
     */
    public function getUserProfilePic(): string
    {
        if (empty($this->userData['ProfilePicture'])) {
            return 'https://assets.kiju.me/img/avatar-default-ptzr6kmg652a2w4lsbc7yrspm9r4z4y5wcvej6fgkg.png';
        }

        return $this->userData['ProfilePicture'];
    }

    /**
     * Récupère le status vérifié de la personne qui a publiée
     *
     * @return bool
     */
    public function getUserStatus(): bool
    {
        return $this->userData['IsVerified'];
    }

    /**
     * Récupère le nom de la communauté dans laquelle la publication apparait
     *
     * @return string
     */
    public function getCommunityName(): string
    {
        return $this->communityData['Name'];
    }

    /**
     * Récupère l'identifiant unique de la communauté
     *
     * @return string
     */
    public function getCommunityUID(): string
    {
        return $this->communityData['CommunityUID'];
    }

    /**
     * Récupère l'identifiant de la publication
     *
     * @return int
     */
    public function getPostId(): int
    {
        return $this->PostId;
    }

    /**
     * Récupère l'identifiant unique de la publication
     *
     * @return string
     */
    public function getPostUniqueID(): string
    {
        return $this->getPostData()['PostUniqueID'];
    }

    /**
     * Récupère l'identifiant de l'auteur de la publication
     *
     * @return int
     */
    public function getUserID(): int
    {
        return $this->getPostData()['UserID'];
    }

    /**
     * Récupère l'identifiant de la communauté de la publication
     *
     * @return int
     */
    public function getCommunityID(): int
    {
        return $this->getPostData()['CommunityID'];
    }

    /**
     * Récupère la date de création de la publication
     *
     * @return string
     */
    public function getCreationDate(): string
    {
        return $this->getPostData()['CreationDate'];
    }

    /**
     * Vérifie si la publication est supprimée ou non
     *
     * @return boolean
     */
    public function getDeleted(): bool
    {
        return $this->getPostData()['Deleted'];
    }
}
