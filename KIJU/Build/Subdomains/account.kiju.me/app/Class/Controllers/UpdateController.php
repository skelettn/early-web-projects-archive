<?php

namespace KIJU\Controllers;

use KIJU\App;
use KIJU\Controllers\BaseController;

class UpdateController extends BaseController
{
    /**
     * Met à jour le nom de l'utilisateur
     *
     * @param $name Nouveau nom
     * @return void
     */
    public function updateName($name): void
    {
        if ($this->isNameValid($name)) {
            $req = App::getDatabase()->executeQuery('UPDATE user SET `Name` = ? WHERE UserID = ?', [$name, App::getUser()->getId()]);

            header('Location: /ac/userdata&err=KIJU_Success');
            exit;
        }
    }

    /**
     * Met à jour le nom d'utilisateur de l'utilisateur
     *
     * @param $userName Nouveau nom d'utilisateur
     * @return void
     */
    public function updateUserName($userName): void
    {
        if ($this->isUserNameValid($userName)) {
            $req = App::getDatabase()->executeQuery('UPDATE user SET `Username` = ? WHERE UserID = ?', [$userName, App::getUser()->getId()]);

            header('Location: /ac/userdata&err=KIJU_Success');
            exit;
        }
    }

    /**
     * Met à jour la localisation de l'utilisateur
     *
     * @param $loc Localisation de l'utilisateur
     * @return void
     */
    public function updateLoc($loc): void
    {
        if (strlen($loc) <= 35) {
            $req = App::getDatabase()->executeQuery('UPDATE user SET `Loc` = ? WHERE UserID = ?', [$loc, App::getUser()->getId()]);
        }

        header('Location: /ac/userdata&err=KIJU_Success');
        exit;
    }

    /**
     * Met à jour l'avatar de l'utilisateur
     *
     * @param $avatar Nouvel avatar de l'utilisateur
     * @return void
     */
    public function updateAvatar($avatar): void
    {
        $fileName = $avatar['name'];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

        $mediaID = $this->createMediaID();
        $mediaName = $mediaID . '.' . $fileExtension;
        $destinationDirectory = '../beta.kiju.me/public/medias/';

        if ($this->isAvatarValid($avatar)) {
            if (move_uploaded_file($avatar['tmp_name'], $destinationDirectory . $mediaName)) {
                $avatarLink = 'https://medias.kiju.me/?get=' . $mediaName;
            } else {
                $avatarLink = "https://assets.kiju.me/img/avatar-default-ptzr6kmg652a2w4lsbc7yrspm9r4z4y5wcvej6fgkg.png";
            }

            $req = App::getDatabase()->executeQuery('UPDATE user SET `ProfilePicture` = ? WHERE UserID = ?', [$avatarLink, App::getUser()->getId()]);

            header('Location: /ac/userdata&err=KIJU_Success');
            exit;
        }

        header('Location: /ac/userdata&err=KIJU_Error');
        exit;
    }

    /**
     * Met à jour la bannière de l'utilisateur
     *
     * @param $banner Nouvelle bannière de l'utilisateur
     * @return void
     */
    public function updateBanner($banner): void
    {
        $fileName = $banner['name'];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

        $mediaID = $this->createMediaID();
        $mediaName = $mediaID . '.' . $fileExtension;
        $destinationDirectory = '../beta.kiju.me/public/medias/';

        if ($this->isAvatarValid($banner)) {
            if (move_uploaded_file($banner['tmp_name'], $destinationDirectory . $mediaName)) {
                $bannerLink = 'https://medias.kiju.me/?get=' . $mediaName;
            } else {
                $bannerLink = "https://assets.kiju.me/img/avatar-default-ptzr6kmg652a2w4lsbc7yrspm9r4z4y5wcvej6fgkg.png";
            }

            $req = App::getDatabase()->executeQuery('UPDATE user SET `Banner` = ? WHERE UserID = ?', [$bannerLink, App::getUser()->getId()]);

            header('Location: /ac/userdata&err=KIJU_Success');
            exit;
        }

        header('Location: /ac/userdata&err=KIJU_Error');
        exit;
    }

    /**
     * Met à jour la date de naissance
     *
     * @param $birth Date de naissance
     * @return void
     */
    public function updateBirth($birth): void
    {

        $req = App::getDatabase()->executeQuery('UPDATE user SET `Birth` = ? WHERE UserID = ?', [$birth, App::getUser()->getId()]);

        header('Location: /ac/userdata&err=KIJU_Success');
        exit;
    }

    /**
     * Vérifie si l'username est valide
     *
     * @param $userName Nom d'utilisateur à vérifier
     * @return bool
     */
    public function isUserNameValid($userName): bool
    {
        if ($this->isNameValid($userName)) {
            if (!$this->isUserNameUsed($userName)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Vérifie si le nom est valide
     *
     * @param $name Nom d'utilisateur à vérifier
     * @return bool
     */
    public function isNameValid($name): bool
    {
        $len = strlen($name);
        return $len <= 25;
    }

    /**
     * Vérifie si le nom d'utilisateur existe déjà
     *
     * @param $userName Nom d'utilisateur à vérifier
     * @return bool
     */
    public function isUserNameUsed($userName): bool
    {
        $req = App::getDatabase()->executeQuery('SELECT Username FROM user WHERE Username = ?', [$userName]);
        return $req->rowCount() >= 1;
    }

    /**
     * Vérifie si l'avatar est valide
     *
     * @param string $avatar Avatar de l'utilisateur
     * @return bool
     */
    public function isAvatarValid($avatar): bool
    {
        if (empty($avatar)) return false;

        $fileName = $avatar['name'];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        $fileSize = $avatar['size'];

        if (!in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif'])) return false;

        $maxSize = 5 * 1024 * 1024;

        return ($fileSize <= $maxSize) ? true : false;
    }
}
