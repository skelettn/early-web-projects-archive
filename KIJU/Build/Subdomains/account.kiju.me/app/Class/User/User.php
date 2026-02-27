<?php

namespace KIJU\User;

use KIJU\APP;
use KIJU\Community\Community;

class User
{
    private $id;
    private $data;

    /**
     * Constructeur
     *
     * @param int $id Identifiant de l'utilisateur
     */
    public function __construct($id)
    {
        $this->id = $id;
        $getData = App::getDatabase()->executeQuery('SELECT * FROM user WHERE UserID = ?', [$this->id]);

        $userData = $getData->fetch();
        $this->data = $userData;
    }

    /**
     * Récupère l'identifiant de l'utilisateur
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Récupère le nom d'utilisateur de l'utilisateur
     *
     * @return string
     */
    public function getUsername(): string
    {
        return $this->data['Username'];
    }

    /**
     * Récupère le nom l'utilisateur
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->data['Name'];
    }

    /**
     * Récupère la photo de profil de l'utilisateur
     *
     * @return string
     */
    public function getProfilePicture(): string
    {
        return $this->data['ProfilePicture'];
    }

    /**
     * Récupère la bannière de l'utilisateur
     *
     * @return string
     */
    public function getBanner(): string
    {
        return $this->data['Banner'];
    }

    /**
     * Récupère la date de naissance de l'utilisateur
     *
     * @return string
     */
    public function getBirth(): string
    {
        return $this->data['Birth'];
    }

    /**
     * Récupère le jour de naissance de l'utilisateur
     *
     * @return string
     */
    public function getBirthDay(): string
    {
        $parts = explode(' ', $this->getBirth());
        if (count($parts) == 3) {
            return $parts[0];
        } else {
            return false;
        }
    }

    /**
     * Récupère le mois de naissance de l'utilisateur
     *
     * @return string
     */
    public function getBirthMonth(): string
    {
        $parts = explode(' ', $this->getBirth());
        if (count($parts) == 3) {
            return $parts[1];
        } else {
            return false;
        }
    }

    /**
     * Récupère l'année de naissance de l'utilisateur
     *
     * @return string
     */
    public function getBirthyear(): string
    {
        $parts = explode(' ', $this->getBirth());
        if (count($parts) == 3) {
            return $parts[2];
        } else {
            return false;
        }
    }

    /**
     * Récupère la localisation de l'utilisateur
     *
     * @return string
     */
    public function getLoc()
    {
        return $this->data['Loc'];
    }

    /**
     * Récupère la biographie de l'utilisateur
     *
     * @return string
     */
    public function getBio(): string
    {
        return $this->data['Bio'];
    }

    /**
     * Récupère le status vérifé de l'utilisateur
     *
     * @return bool
     */
    public function getVerifedStatus(): bool
    {
        return $this->data['IsVerified'];
    }

    /**
     * Récupère les communautés crées l'utilisateur connecté
     *
     * @return array
     */
    public function getMyCommunities(): array
    {
        $getData = App::getDatabase()->executeQuery('SELECT * FROM community WHERE OwnerID = ?', [$this->id]);
        $followedCommunities = $getData->fetchAll();

        $commuArray = array_map(function ($community) {
            return new Community($community['CommunityID']);
        }, $followedCommunities);

        return $commuArray;
    }

    /**
     * Récupère les communautés suivie(s) par l'utilisateur
     *
     * @return array
     */
    public function getFollowedCommunities(): array
    {
        $getData = App::getDatabase()->executeQuery('SELECT * FROM communitymembers WHERE CommunityUserID = ?', [$this->id]);
        $followedCommunities = $getData->fetchAll();

        $commuArray = array_map(function ($community) {
            return new Community($community['CommunityID']);
        }, $followedCommunities);

        return $commuArray;
    }
}
