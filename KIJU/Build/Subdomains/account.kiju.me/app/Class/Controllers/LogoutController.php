<?php

namespace KIJU\Controllers;

use KIJU\App;

class LogoutController
{
    /**
     * Détruit la session de l'utilisateur
     *
     * @return void
     */
    public function destroySession(): void
    {
        $_SESSION = [];
        session_destroy();
    }

    /**
     * Détruit les cookies de l'utilisateur
     *
     * @return void
     */
    public function destroyCookies(): void
    {
        setcookie("auth_token", "", time() - 3600, "/", ".kiju.me", true, true);
        setcookie("auth_token", "", time() - 3600, "/", "localhost", true, true);
    }

    /**
     * Supprimer le token de connexion
     *
     * @return void
     */
    public function deleteOldToken(): void
    {
        $del = App::getDatabase()->executeQuery('DELETE FROM auth_token WHERE Token = ?', [$_COOKIE['auth_token']]);
    }

    /**
     * Déconnecte l'utilisateur
     *
     * @return void
     */
    public function logout(): void
    {
        $this->destroySession();
        $this->deleteOldToken();
        $this->destroyCookies();



        header('Location: https://beta.kiju.me/');
        exit;
    }
}
