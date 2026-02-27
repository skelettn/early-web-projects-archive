<?php

namespace KIJU\Controllers;

use KIJU\App;
use DateTime;

class RegisterController
{
    private $email;

    /**
     * Enregistre l'utilisateur dans la db
     *
     * @return void
     */
    public function registerUser(): void
    {
        $req = App::getDatabase()->executeQuery('INSERT INTO user (Username, `Name`, Email, ProfilePicture, Birth, Loc, Bio, Link, IsVerified, CreationDate) VALUES (?,?,?,?,?,?,?,?,?,?)', ["", "", $this->email, "", "0000-00-00 00:00:00", "", "", "", 0, $this->getCurrentDate()]);
        $join = App::getDatabase()->executeQuery('INSERT INTO community_member (CommunityUserID, CommunityID, CreationDate) VALUES (?,?,?)', [$this->getId(), 1, $this->getCurrentDate()]);
    }

    /**
     * Récupère la date actuelle
     *
     * @return string
     */
    public function getCurrentDate(): string
    {
        $date = new DateTime();
        return $date->format('Y-m-d H:i:s');
    }

    /**
     * Récupère l'id utilisateur
     *
     * @return int
     */
    public function getId(): int
    {
        $req = App::getDatabase()->executeQuery('SELECT UserID FROM user WHERE Email = ?', [$this->email]);
        return $req->fetchColumn();
    }

    /**
     * Définie l'e-mail de l'utilisateur
     *
     * @return void
     */
    public function setEmail($e): void
    {
        $this->email = $e;
    }

    /**
     * Récupère l'e-mail de l'utilisateur
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }
}
