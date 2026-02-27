<?php

namespace KIJU\Controllers;

use KIJU\App;

/**
 * Classe abstraite représentant la classe de Base du site
 *
 * Cette classe permet de réutiliser des fonctions dans les classes filles
 */
abstract class BaseController
{
    /**
     * Créer un identifiant de média unique
     *
     * @return string
     */
    public function createMediaID(): string
    {
        $uniqueID = uniqid('', true);
        $randomString = md5(uniqid(rand(), true));
        $combinedString = $uniqueID . $randomString;

        $uniqueID = substr($combinedString, 0, 25);

        return $uniqueID;
    }

    /**
     * Récupère le paramètre de navigation et renvoie la classe correspondante
     *
     * @param mixed $p
     * @return string 
     */
    public function isParamActive($p): string
    {
        return ($_GET['p'] == $p) ? "active" : '';
    }

    /**
     * Récupère l'identifiant de l'utilisateur
     *
     * @return int
     */
    public function getUserId(): int
    {
        return App::getUser()->getId();
    }

    /**
     * Récupère le nom d'utilisateur de l'utilisateur
     *
     * @return string
     */
    public function getUsername(): string
    {
        return App::getUser()->getUsername();
    }

    /**
     * Récupère la photo de profil de l'utilisateur
     *
     * @return string
     */
    public function getProfilePicture(): string
    {
        return App::getUser()->getProfilePicture();
    }
}
