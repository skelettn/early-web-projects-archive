<?php

namespace KIJU\Posts;

use KIJU\App;
use DateTime;

/**
 * Classe représentant un média
 *
 * Cette classe permet de récupérer les informations d'un média
 */
class Media
{
    private $MediaID;

    /**
     * Constructeur
     *
     * @param int $mediaID Identifiant du média
     */
    public function __construct($mediaID)
    {
        $this->MediaID = $mediaID;
    }

    /**
     * Récupère les données du média
     *
     * @return array
     */
    public function getMediaData(): array
    {
        $getMedia = App::getDatabase()->executeQuery('SELECT * FROM media WHERE MediaID = ?', [$this->MediaID]);
        return $getMedia->fetch();
    }

    /**
     * Récupère l'url du média
     *
     * @return string
     */
    public function getMediaURL(): string
    {
        return $this->getMediaData()['MediaURL'];
    }
}
