<?php

namespace KIJU;

use KIJU\Controllers\Authentication\AuthenticationController;
use KIJU\Database\Database;
use KIJU\User\User;

/**
 * Classe représentant l'application Kiju
 *
 * Cette classe permet de gérer les différents controllers du site
 */
class App
{
    public static $DB_NAME = 'kiju';
    public static $DB_USER = 'root';
    public static $DB_PASS = '';
    public static $DB_HOST = 'localhost';
    public static $ASSETS_DOMAIN = '/assets.kiju.me/';
    public static $LOCAL = 'local/';
    public static $base_version = '/10.0';

    private static $_instance;
    private static $database;
    private static $auth;
    private static $user;

    public static $title = "Kiju";
    public static $icon = 'https://assets.kiju.me/img/1123/Social_Bg.jpg';
    public static $version = '26.0';

    /**
     * Détermine si l'application est en local ou sur le serveur
     *
     * @return bool True si l'application est en local, False sinon
     */
    public static function isLocalhost(): bool
    {
        // Ajoutez les adresses IP de votre environnement local
        $localhostIPs = array('127.0.0.1', '::1');

        // Vérifie si l'adresse IP du serveur est dans la liste des adresses locales
        return in_array($_SERVER['SERVER_ADDR'], $localhostIPs);
    }

    /**
     * Initialise les constantes en fonction de l'environnement
     * 
     * @return void
     */
    public static function initProperties(): void
    {
        if (!self::isLocalhost()) {
            self::$DB_NAME = 'DB_NAME';
            self::$DB_USER = 'DB_USER';
            self::$DB_PASS = 'DB_PASS';
            self::$DB_HOST = 'localhost:3306';
            self::$ASSETS_DOMAIN = 'https://assets.kiju.me/';
            self::$LOCAL = '';
            self::$base_version = '';
        }
    }

    /**
     * Récupère l'instance de l'application
     *
     * @return object
     */
    public static function getInstance(): object
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new App();
        }

        return self::$_instance;
    }

    /**
     * Récupère l'instance de la base de données
     *
     * @return object
     */
    public static function getDatabase(): object
    {
        if (is_null(self::$database)) {
            self::$database = new Database(self::$DB_NAME, self::$DB_USER, self::$DB_PASS, self::$DB_HOST);
        }

        return self::$database;
    }


    /**
     * Récupère l'instance de l'authentification
     *
     * @return object
     */
    public static function getAuth(): object
    {
        if (is_null(self::$auth)) {
            self::$auth = new AuthenticationController();
        }

        return self::$auth;
    }

    /**
     * Vérifie si une session existe
     *
     * @return bool
     */
    public static function isLogged(): bool
    {
        return isset($_COOKIE['auth_token']);
    }

    /**
     * Vérifie si une session temporaire existe
     *
     * @return bool
     */
    public static function isTempLogged(): bool
    {
        return isset($_SESSION['temp_logged']);
    }

    /**
     * Récupère l'instance de l'utilisateur
     *
     * @return mixed
     */
    public static function getUser()
    {
        if (self::isLogged()) {
            self::getAuth()->setAuthID();
            if (is_null(self::$user)) {
                self::$user = new User(self::getAuth()->getAuthID());
            }

            return self::$user;
        }

        return NULL;
    }

    /**
     * Vérifie si il y a une maintenance
     *
     * @return void
     */
    public static function isMaintenance(): void
    {
        $req = self::$database->getPDO()->prepare("SELECT kiju_maintenance FROM config");
        $req->execute();

        $maintenance = $req->fetchColumn();
        if (!(App::isLogged() && self::getUser()->getUsername() == 'Shonned') && $maintenance) {
            header('Location: https://kiju.instatus.com/');
            exit;
        }
        // Continue with regular operations

    }

    /**
     * Transforme le code base HTML
     *
     * @return string
     */
    public static function minifyHtml($html): string
    {
        $search = array(
            '/\>[^\S ]+/s',
            '/[^\S ]+\</s',
            '/(\s)+/s'
        );
        $replace = array(
            '>',
            '<',
            '\\1'
        );
        $html = preg_replace($search, $replace, $html);

        return $html;
    }

    /**
     * Détecte le périphérique de l'utilisateur
     *
     * @return string
     */
    public static function detectDeviceType(): string
    {
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        $mobileKeywords = ['Android', 'iPhone', 'iPad', 'Windows Phone', 'BlackBerry', 'Opera Mini', 'Mobile'];

        foreach ($mobileKeywords as $keyword) {
            if (strpos($userAgent, $keyword) !== false) {
                return 'mobile';
            }
        }

        return 'pc';
    }

    /**
     * Renvoie le numéro de build complet
     *
     * @return string
     */
    public static function getBuildVersion(): string
    {
        return self::$version . '.' . 1701522832;
    }
}
