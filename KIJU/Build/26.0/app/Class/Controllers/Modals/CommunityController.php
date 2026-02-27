<?php

namespace KIJU\Controllers\Modals;

use KIJU\App;
use DateTime;
use Exception;
use PDOException;

/**
 * Classe représentant le modal de création de communautés.
 *
 * Cette classe permet de créer une communauté pour l'utilisateur.
 */
class CommunityController
{
    private $name;
    private $uid;

    /**
     * Attribue le nom de la communauté
     * 
     * @param string $name Nom de la communauté
     * @return void
     */
    public function setCommunityName($name): void
    {
        $this->name = $name;
    }

    /**
     * Récupère le nom de la communauté
     *
     * @return string
     */
    public function getCommunityName(): string
    {
        return $this->name;
    }

    /**
     * Créer un id unique pour la communauté
     *
     * @return int
     */
    public function createUniqueID(): int
    {
        $min = 100000000000;
        $max = 999999999999;

        $uniqueID = random_int($min, $max);
        $this->uid = $uniqueID;

        return $this->uid;
    }

    /**
     * Vérifie si le nom de la communauté est valide
     *
     * @return bool
     */
    public function isNameValid(): bool
    {
        $len = strlen($this->name);
        return ($len <= 25 && $len > 4) && !$this->isNameUsed();
    }

    /**
     * Vérifie si le nom de la communauté est déjà utilisé
     *
     * @return bool
     */
    public function isNameUsed(): bool
    {
        $req = App::getDatabase()->executeQuery('SELECT `Name` FROM community WHERE `Name` = ?', [$this->getCommunityName()]);

        return $req->rowCount() >= 1;
    }

    /**
     * Renvoie le nombre de communautés restantes à créer
     *
     * @return int
     */
    public function remainingCommunities(): int
    {
        $req = App::getDatabase()->executeQuery('SELECT * FROM community WHERE OwnerID = ?', [App::getUser()->getId()]);
        $numb = $req->rowCount();

        return 5 - $numb;
    }

    /**
     * Vérifie si la communauté est valide
     *
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->isNameValid() && $this->remainingCommunities() >= 1;
    }

    /**
     * Créer la communauté
     *
     * @return void|null
     */
    public function createCommunity()
    {
        try {
            $req = App::getDatabase()->executeQuery('INSERT INTO community (CommunityUID, OwnerID,`Name`,Bio,Banner,IsVerified,Deleted,CreationDate) VALUES (?,?,?,?,?,?,?,?)', [$this->createUniqueID(), App::getUser()->getId(), $this->name, '', '', 0, 0, $this->getCurrentDate()]);
            $this->joinCommunity();
        } catch (Exception $e) {
            echo 'kiju_dev_error_3';
            return null;
        } catch (PDOException $e) {
            echo 'kiju_dev_error_3';
            return null;
        }
    }

    /**
     * L'utilisateur rejoint automatiquement sa communauté
     *
     * @return void
     */
    public function joinCommunity(): void
    {
        $addRelation = App::getDatabase()->executeQuery('INSERT INTO community_member (`CommunityUserID`, `CommunityID`, `CreationDate`) VALUES (?,?,?)', [App::getUser()->getId(), $this->getCommunityId(), date('Y-m-d H:i:s')]);

        header('location: /c/' . $this->uid . '&err=KIJU_Follow_Community');
        exit;
    }

    /**
     * Renvoie l'identifiant de la communauté
     *
     * @return int
     */
    public function getCommunityId(): int
    {
        $req = App::getDatabase()->executeQuery('SELECT CommunityID FROM community WHERE OwnerID = ? AND `CommunityUID` = ?', [App::getUser()->getId(), $this->uid]);
        $id = $req->fetchColumn();

        return $id;
    }

    /**
     * Récupère la date actuelle
     *
     * @return void
     */
    public function getCurrentDate()
    {
        $date = new DateTime();
        return $date->format('Y-m-d H:i:s');
    }
}
