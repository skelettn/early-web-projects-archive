<?php

namespace KIJU\Controllers;

class TokenController
{
    private $token;

    /**
     * Génère un token unique alléatoirement
     *
     * @return string
     */
    public function generateToken(): string
    {
        $this->token = bin2hex(random_bytes(32));
        return $this->token;
    }

    /**
     * Récupère le token unique
     *
     * @return string
     */
    public function getToken(): string
    {
        return $this->generateToken();
    }
}
