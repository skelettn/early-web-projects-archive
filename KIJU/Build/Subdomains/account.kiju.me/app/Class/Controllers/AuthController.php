<?php

namespace KIJU\Controllers;

error_reporting(E_ALL);
ini_set('display_errors', 1);

use KIJU\App;
use KIJU\Controllers\RegisterController;
use KIJU\Controllers\EmailController;
use KIJU\Controllers\TokenController;

class AuthController
{
    private $email;

    /**
     * Vérifie si une session temporaire existe
     *
     * @return void
     */
    public function isTempOkay(): void
    {
        $emailController = new EmailController($this->email);
        if ($emailController->isEmailValid()) {
            if (!$this->isAccountExist()) {
                $this->registerAccount();
            }

            $emailController->sendCode();
            $code = $emailController->getCode();

            $this->deleteOldCode();
            $this->insertNewCode($code);
            $this->setSession();

            header('Location: /auth&email=' . $this->email);
            exit;
        }
    }

    /**
     * Processus d'inscription du compte
     *
     * @return void
     */
    public function registerAccount(): void
    {
        $registerController = new RegisterController;
        $registerController->setEmail($this->email);
        $registerController->registerUser();
    }

    /**
     * Vérifie si un compte existe avec l'email
     *
     * @return bool
     */
    public function isAccountExist(): bool
    {
        $req = App::getDatabase()->executeQuery('SELECT * FROM user WHERE Email = ?', [$this->email]);
        return $req->rowCount() >= 1;
    }

    /**
     * Création d'un token d'authentification ainsi qu'un cookie
     *
     * @param $code Code de vérification
     * @return void
     */
    public function createAuthToken($code): void
    {
        $emailController = new EmailController($this->email);
        $tokenController = new TokenController;
        $token = $tokenController->getToken();
        $code = $emailController->setCodeBis($code);
        $expiration = time() + 30 * 24 * 60 * 60;

        if ($emailController->verifyCode()) {

            $this->updateStatus();

            $this->setCookie($token, $expiration);
            $this->insertNewToken($token, $expiration);

            header('Location: https://account.kiju.me/success');
            exit;
        }

        header('Location: /auth&email=' . $this->email . '&error');
        exit;
    }

    /**
     * Supprimer les anciens code de connexion
     *
     * @return void
     */
    public function deleteOldCode(): void
    {
        $del = App::getDatabase()->executeQuery('DELETE FROM email_authentication WHERE UserID = (SELECT UserID FROM user WHERE Email = ?)', [$this->email]);
    }

    /**
     * Insert le nouveau code de connexion
     *
     * @param $code Code de vérification
     * @return void
     */
    public function insertNewCode($code): void
    {
        $req = App::getDatabase()->executeQuery('INSERT INTO email_authentication (UserID, Code, `Status`) VALUES ((SELECT UserID FROM user WHERE Email = ?), ?, ?)', [$this->email, $code, 0]);
    }

    /**
     * Insert les nouveaux token d'authentification
     *
     * @param $token Token de validation
     * @param $expiration Expiration du token
     * @return void
     */
    public function insertNewToken($token, $expiration): void
    {
        $ip = $this->getIpAdress();
        $req = App::getDatabase()->executeQuery('INSERT INTO auth_token (Token, UserID, Expiration, IP) VALUES (?, (SELECT UserID FROM user WHERE Email = ?), ?, ?)', [$token, $this->email, $expiration, $ip]);
    }

    /**
     * Met à jour le status du code de connexion
     *
     * @return void
     */
    public function updateStatus(): void
    {
        $upt = App::getDatabase()->executeQuery('UPDATE email_authentication SET `Status` = 1 WHERE UserID = (SELECT UserID FROM user WHERE Email = ?)', [$this->email]);
    }

    /**
     * Créer une session temporaire pour l'utilisateur
     *
     * @return void
     */
    public function setSession(): void
    {
        $_SESSION['temp_logged'] = 1;
        $_SESSION['temp_mail'] = $this->email;
    }

    /**
     * Créer les cookies d'authentification
     *
     * @param $token Token de validation
     * @param $expiration Expiration du token
     * @return void
     */
    public function setCookie($token, $expiration): void
    {
        setcookie('auth_token', $token, $expiration, '/', 'localhost', true, true);
        setcookie('auth_token', $token, $expiration, '/', '.kiju.me', true, true);
    }

    /**
     * Définie l'adresse e-mail de l'utilisateur
     *
     * @param $email Email de l'utilisateur
     * @return void
     */
    public function setEmail($email): void
    {
        $this->email = $email;
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
