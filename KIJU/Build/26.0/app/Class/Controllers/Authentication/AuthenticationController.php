<?php

namespace KIJU\Controllers\Authentication;

use KIJU\App;

/**
 * Classe représentant l'authentification de l'utilisateur.
 *
 * Cette classe gère les informations de connexion ainsi que la création des cookies.
 */
class AuthenticationController
{
    private $userid;

    /**
     * Vérifie si le token d'identification existe
     *
     * @return bool
     */
    public function isTokenExist(): bool
    {
        $req = App::getDatabase()->executeQuery("SELECT Token FROM auth_token WHERE Token = ?", [$_COOKIE['auth_token']]);

        return $req->rowCount() >= 1;
    }

    /**
     * Vérifie si l'IP correspond à celle de la base de données pour ce token
     *
     * @return bool
     */
    public function isIPMatch(): bool
    {
        $req = App::getDatabase()->executeQuery("SELECT IP FROM auth_token "); // Problème
        $req->execute();
        $db_ip = $req->fetchColumn();

        return $db_ip == $this->getIpAdress();
    }

    /**
     * Associe l'id utilisateur selon le token de connexion
     *
     * @return void
     */
    public function setAuthID(): void
    {
        if (App::isLogged()) {
            if ($this->isTokenExist() && $this->isIPMatch()) {
                $req = App::getDatabase()->executeQuery("SELECT UserID FROM auth_token WHERE Token = ?", [$_COOKIE['auth_token']]);
                if ($req->rowCount() >= 1) {
                    $this->userid = $req->fetchColumn();
                }
                if ($this->checkUserData()) {
                    header('Location: https://account.kiju.me/ac&err=KIJU_Data');
                    exit;
                }
            } else {
                $expiration = time() - 3600;
                $email = $_SESSION['temp_email'];
                $_SESSION['temp_logged'] = NULL;
                $_SESSION['temp_email'] = NULL;
                setcookie('auth_token', '', $expiration, '/', 'localhost', true, true);
                setcookie('auth_token', '', $expiration, '/', '.kiju.me', true, true);

                header('Location: https://account.kiju.me/auth&email=' . $email);
                exit;
            }
        }
    }

    /**
     * Vérifie si les informations de l'utilisateur sont complètes
     *
     * @return bool
     */
    public function checkUserData(): bool
    {
        $req = App::getDatabase()->executeQuery("SELECT * FROM user WHERE UserID = ?", [$this->userid]);
        $data = $req->fetch();

        return empty($data['Name']) || empty($data['Username']);
    }

    /**
     * Récupère l'id de l'utilisateur connecté
     *
     * @return int
     */
    public function getAuthID(): int
    {
        return $this->userid;
    }

    /**
     * Récupère l'adresse IP de l'utilisateur
     *
     * @return string
     */
    public function getIpAdress(): string
    {
        $ip_address = '';
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip_address = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip_address = $_SERVER['REMOTE_ADDR'];
        }

        return $ip_address;
    }
}
