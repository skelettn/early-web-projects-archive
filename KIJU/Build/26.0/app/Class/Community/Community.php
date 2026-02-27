<?php

namespace KIJU\Community;

use KIJU\App;
use DateTime;

/**
 * Classe représentant une communauté.
 *
 * Cette classe gère les informations d'une communauté, telles que son identifiant et ses données associées.
 */
class Community
{
    private $id;
    private $data;

    /**
     * Constructeur de la classe
     *
     * @param int $id Identifiant d'une communauté
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
        $this->data = $this->fetchCommunityData();
    }

    /**
     * Récupère les données de la communauté
     *
     * @return array
     */
    public function fetchCommunityData(): array
    {
        $getCommunityData = App::getDatabase()->executeQuery('SELECT * FROM community WHERE CommunityID = ?', [$this->id]);
        $data = $getCommunityData->fetch();

        return $data;
    }

    /**
     * Récupère l'identifiant de la communauté
     *
     * @return int
     */
    public function getCommunityId(): int
    {
        return $this->data['CommunityID'];
    }

    /**
     * Récupère l'identifiant unique de la communauté
     *
     * @return string
     */
    public function getCommunityUID(): string
    {
        return $this->data['CommunityUID'];
    }

    /**
     * Récupère l'identifiant du créateur de la communauté
     *
     * @return int
     */
    public function getCommunityOwnerId(): int
    {
        return $this->data['OwnerID'];
    }

    /**
     * Récupère le nom de la communauté
     *
     * @return string
     */
    public function getCommunityName(): string
    {
        return $this->data['Name'];
    }

    /**
     * Récupère la bio de la communauté
     *
     * @return string
     */
    public function getCommunityBio(): string
    {
        return $this->data['Bio'];
    }

    /**
     * Récupère la bannière de la communauté
     *
     * @return string
     */
    public function getCommunityBanner(): string
    {
        return $this->data['Banner'];
    }

    /**
     * Récupère le status de la communauté
     *
     * @return bool
     */
    public function getCommunityStatus(): bool
    {
        return $this->data['IsVerified'];
    }

    /**
     * Vérifie si la communauté est supprimée ou non
     *
     * @return bool
     */
    public function getDeleted(): bool
    {
        return $this->data['Deleted'];
    }

    /**
     * Récupère la date de création de la communauté
     *
     * @return string
     */
    public function getCreationDate(): string
    {
        return $this->getCDDisplay();
    }

    /**
     * Affiche correctement la date de création de la communauté
     *
     * @return string
     */
    public function getCDDisplay(): string
    {
        $dateOrigine = $this->data['CreationDate'];
        $dateTime = new DateTime($dateOrigine);
        $finalDate = $dateTime->format('j F Y');

        return $finalDate;
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
}
