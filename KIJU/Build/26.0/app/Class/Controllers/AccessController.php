<?php

namespace KIJU\Controllers;

/**
 * Classe représentant la vérification de l'accès au site
 *
 * Cette classe permet de vérifier le mot de passe entré par l'utilisateur
 */
class AccessController
{
    private $pwd = "Kiju10122003";

    /**
     * Donne l'accès au site à l'utilisateur
     *
     * @return void
     */
    public function getAccess(): void
    {
        $_SESSION['admin_Access'] = "Confirmed";

        header('location: /home');
        exit;
    }

    /**
     * Récupère le mot de passe
     *
     * @return string
     */
    public function getPwd(): string
    {
        return $this->pwd;
    }
}
