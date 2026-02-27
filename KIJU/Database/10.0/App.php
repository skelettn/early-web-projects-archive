<?php

namespace KIJU;

use KIJU\Database\Database;
use KIJU\User\User;

class App
{

    const DB_NAME = 'DB_NAME';
    const DB_USER = 'DB_USER';
    const DB_PASS = 'DB_PASS';
    const DB_HOST = 'localhost:3306';

    public static $title = "Kiju";
    public static $icon = '<link rel="icon" href="https://assets.kiju.me/img/Social_Media.png" /> <link rel="apple-touch-icon" href="https://assets.kiju.me/img/Social_Media.png" />';
    private static $_instance;
    private static $database;
    private static $user;

    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new App();
        }

        return self::$_instance;
    }

    public static function getDatabase()
    {
        if (is_null(self::$database)) {
            self::$database = new Database(self::DB_NAME, self::DB_USER, self::DB_PASS, self::DB_HOST);
        }

        return self::$database;
    }

    public static function getUser()
    {
        if (is_null(self::$user)) {
            self::$user = new User(1);
        }

        return self::$user;
    }
}
