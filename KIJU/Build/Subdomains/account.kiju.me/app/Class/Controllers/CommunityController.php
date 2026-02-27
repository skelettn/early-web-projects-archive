<?php

namespace KIJU\Controllers;

use KIJU\App;
use KIJU\Controllers\BaseController;
use KIJU\Community\Community;

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
        $this->isValid();

        $getID = App::getDatabase()->executeQuery('SELECT CommunityID FROM community WHERE `CommunityUID` = ?', [$this->communityUID]);

        $id = $getID->fetchColumn();

        $this->community = new Community($id);
    }

    /**
     * Vérifie si la communauté existe
     *
     * @return bool
     */
    public function isCommunityExist(): bool
    {
        $req = App::getDatabase()->executeQuery('SELECT * FROM community WHERE `CommunityUID` = ?', [$this->communityUID]);
        return $req->rowCount() >= 1;
    }

    /**
     * Vérifie si la communauté est celle de l'utilisateur connecté
     *
     * @return bool
     */
    public function isMyCommunity(): bool
    {
        $req = App::getDatabase()->executeQuery('SELECT * FROM community WHERE OwnerID = ? AND `CommunityUID`= ?', [App::getUser()->getId(), $this->communityUID]);
        return $req->rowCount() >= 1;
    }

    /**
     * Vérifie si tout est valide
     *
     * @return void
     */
    public function isValid(): void
    {
        if (!$this->isCommunityExist() || !$this->isMyCommunity()) {
            header('location: /ac');
            exit;
        }
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
     * Met à jour la bannière de l'utilisateur
     *
     * @param mixed $banner Nouvelle bannière de l'utilisateur
     * @param int $uid Identifiant de la communauté
     * @return void
     */
    public function updateBanner($banner, $uid): void
    {
        $fileName = $banner['name'];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

        $mediaID = $this->createMediaID();
        $mediaName = $mediaID . '.' . $fileExtension;
        $destinationDirectory = '../beta.kiju.me/public/medias/';

        if ($this->isBannerValid($banner)) {
            if (move_uploaded_file($banner['tmp_name'], $destinationDirectory . $mediaName)) {
                $bannerLink = 'https://medias.kiju.me/?get=' . $mediaName;
            } else {
                $bannerLink = "https://assets.kiju.me/img/Global_Community_Banner.png";
            }

            $req = App::getDatabase()->executeQuery('UPDATE community SET `Banner` = ? WHERE CommunityUID = ?', [$bannerLink, $uid]);
        }
    }

    /**
     * Vérifie si la bannière est valide
     *
     * @param string $banner Bannière de la communauté
     * @return bool
     */
    public function isBannerValid($banner): bool
    {
        if (empty($banner)) return false;

        $fileName = $banner['name'];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        $fileSize = $banner['size'];

        if (!in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif'])) return false;

        $maxSize = 5 * 1024 * 1024;

        return ($fileSize <= $maxSize) ? true : false;
    }

    /**
     * Met à jour le nom de la communauté
     *
     * @param string $name Nouveau nom de la communauté
     * @param int $uid Identifiant de la communauté
     * @return void
     */
    public function updateName($name, $uid): void
    {
        $req = App::getDatabase()->executeQuery('UPDATE community SET `Name` = ? WHERE CommunityUID = ?', [$name, $uid]);
    }

    /**
     * Met à jour la description de la communauté
     *
     * @param string $description Nouvelle description de la communauté
     * @param int $uid Identifiant de la communauté
     * @return void
     */
    public function updateDescription($description, $uid): void
    {
        $req = App::getDatabase()->executeQuery('UPDATE community SET `Bio` = ? WHERE CommunityUID = ?', [$description, $uid]);
    }

    /**
     * Met à jour la communauté
     *
     * @param int $uid Identifiant de la communauté
     * @param mixed $banner Bannière de la communauté
     * @param string $name Nom de la communauté
     * @param string $desc Description de la communauté
     * 
     * @return void
     */
    public function updateCommunity(int $uid, mixed $banner, string $name, string $desc)
    {
        if (!is_null($banner) && !empty($banner)) {
            $this->updateBanner($banner, $uid);
        }
        $this->updateName($name, $uid);
        $this->updateDescription($desc, $uid);

        header('location: /ac/community/' . $uid);
    }
}
