<?php

namespace KIJU\Posts;

use KIJU\App;
use Exception;
use KIJU\Controllers\BaseController;
use PDOException;

/**
 * Cette classe permet l'insertion d'une nouvelle publication
 */
class AddPost extends BaseController
{
    private $content;
    private $medias;
    private $community;
    private $refid;

    /**
     * Constructeur
     *
     * @param string $content Contenu de la publication
     * @param mixed $medias Médias de la publications
     * @param int $community Identifiant de la communauté
     * @param int $refid Référence de la publication mère
     */
    public function __construct($content, $medias, $community = null, $refid = null)
    {
        $this->content = $content;
        $this->medias = $medias;
        $this->community = $community;
        $this->refid = $refid;
    }

    /**
     * Récupère les données de la publication
     *
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * Récupère l'indentifiant de la communauté
     *
     * @return int
     */
    public function getCommunityID(): int
    {
        return $this->community;
    }

    /**
     * Récupère les médias de la publication
     *
     * @return mixed
     */
    public function getMedias(): mixed
    {
        return $this->medias;
    }

    /**
     * Récupère l'identifiant de référence de la publication mère
     *
     * @return mixed|null
     */
    public function getRefId()
    {
        return $this->refid;
    }

    /**
     * Création de la publication
     *
     * @return void
     */
    public function addPost(): void
    {
        $len = strlen($this->getContent());
        $content = htmlspecialchars($this->getContent());
        $postUniqueID = $this->createPostUniqueID();

        if ($this->isValidPost($len, $content, $this->getMedias())) {
            $this->insertPostIntoDatabase($postUniqueID, $content, $this->getCommunityID());
            if (!empty($this->getMedias())) {
                foreach ($this->getMedias() as $media) {
                    $mediaInfo = $this->processMedia($media);

                    $mediaID = $this->createMediaID();
                    $mediaName = $mediaID . '.' . $mediaInfo['extension'];
                    $destinationDirectory = 'medias/';

                    if ($this->moveUploadedFile($media['tmp_name'], $destinationDirectory . $mediaName)) {
                        $this->insertMedia($postUniqueID, $mediaName);
                    }
                }
            }
            $this->redirectWithSuccess($postUniqueID);
        } else {
            $this->redirectWithError('KIJU_Error');
        }
    }

    /**
     * Vérifie si la publication est valide
     *
     * @param int $len Longueur de la publication
     * @param string $content Contenu de la publication
     * @param array $medias Medias de la publication
     * @return bool
     */
    private function isValidPost($len, $content, $medias): bool
    {
        if ($len >= 2000 || is_null($content) || $content === "") {
            return false;
        }

        foreach ($medias as $media) {
            if (!$this->isValidMedia($media)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Vérifie si le média est valide
     *
     * @param array $media Media de la publication
     * @return bool
     */
    private function isValidMedia($media): bool
    {
        if ($media == []) {
            return true; // Pas de média, donc valide
        }

        $fileName = $media['name'];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        $fileSize = $media['size'];

        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $videoExtensions = ['mp4', 'avi', 'mov', 'wmv'];

        if (in_array($fileExtension, $imageExtensions)) {
            $maxSize = 5 * 1024 * 1024;
        } elseif (in_array($fileExtension, $videoExtensions)) {
            $maxSize = 50 * 1024 * 1024;
        } else {
            return false; // Extension de fichier non valide
        }

        return $fileSize <= $maxSize;
    }


    /**
     * Renvoie le type de média
     *
     * @param string $media Media de la publication
     * @return array
     */
    private function processMedia($media): array
    {
        if ($media == "") {
            return ['type' => "", 'extension' => ""];
        }

        $fileName = $media['name'];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

        if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif'])) {
            return ['type' => 'picture', 'extension' => $fileExtension];
        } elseif (in_array($fileExtension, ['mp4', 'avi', 'mov', 'wmv'])) {
            return ['type' => 'video', 'extension' => $fileExtension];
        } else {
            return ['type' => null, 'extension' => null];
        }
    }

    /**
     * Déplace le média dans l'emplacement sélectionné
     *
     * @param string $tmpName Nom temporaire du média
     * @param string $destination Destination du média
     * @return bool
     */
    private function moveUploadedFile($tmpName, $destination): bool
    {
        return move_uploaded_file($tmpName, $destination);
    }

    /**
     * Insert la publication dans la base de données
     *
     * @param string $postUniqueID Identifiant unique de la publication
     * @param string $content Contenu de la publication
     * @param int $communityID Identifiant de la communauté
     * @param array Médias de la publication
     * @return void|null
     */
    private function insertPostIntoDatabase($postUniqueID, $content, $communityID)
    {
        try {
            $query = 'INSERT INTO post (PostUniqueID, UserID, RefID, Content, CommunityID, CreationDate, Deleted) VALUES (?,?,?,?,?,?,?)';
            $params = [$postUniqueID, $this->getUserId(), $this->getRefId(), $content, $communityID, date('Y-m-d H:i:s'), 0];
            $insertPost = App::getDatabase()->executeQuery($query, $params);
        } catch (Exception $e) {
            echo 'kiju_dev_error_2';
            return null;
        } catch (PDOException $e) {
            echo 'kiju_dev_error_2';
            return null;
        }
    }

    /**
     * Insertion du média dans la base de données
     *
     * @param int $postUniqueID Identifiant unique de la publication
     * @param string $mediaName Nom de la publication
     * @return void|null
     */
    private function insertMedia($postUniqueID, $mediaName)
    {
        try {
            $getPostID = App::getDatabase()->executeQuery("SELECT PostID FROM post WHERE PostUniqueID = ?", [$postUniqueID]);
            $postid = $getPostID->fetchColumn();

            $query = 'INSERT INTO media (MediaUID, MediaURL, PostID, CreationDate) VALUES (?,?,?,?)';
            $params = [$mediaName, 'https://medias.kiju.me/?get=' . $mediaName, $postid, date('Y-m-d H:i:s')];
            $insertMedia = App::getDatabase()->executeQuery($query, $params);
        } catch (Exception $e) {
            echo 'kiju_dev_error_2';
            return null;
        } catch (PDOException $e) {
            echo 'kiju_dev_error_2';
            return null;
        }
    }

    /**
     * Redirige l'utilisateur vers une erreur
     *
     * @param string $error Code d'erreur
     * @return void
     */
    private function redirectWithError($error): void
    {
        header('location: /home&err=' . $error);
        exit;
    }

    /**
     * Redirige l'utilisateur vers sa publication
     *
     * @return void
     */
    private function redirectWithSuccess(): void
    {
        header('location: /home&err=KIJU_Post');
        exit;
    }
}
