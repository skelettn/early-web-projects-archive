<?php
$mediaID = htmlspecialchars($_GET['get']);
$path = '../beta.kiju.me/public/medias/';

// Chemin complet vers le média demandé
$media = $path . $mediaID;

// Vérifie si le fichier existe
if (file_exists($media)) {
    // Récupère l'extension du fichier
    $extension = strtolower(pathinfo($media, PATHINFO_EXTENSION));

    // Détermine le type MIME en fonction de l'extension
    $mime_type = '';
    switch ($extension) {
        case 'jpg':
        case 'jpeg':
            $mime_type = 'image/jpeg';
            break;
        case 'png':
            $mime_type = 'image/png';
            break;
        case 'gif':
            $mime_type = 'image/gif';
            break;
        case 'mp4':
            $mime_type = 'video/mp4';
            break;
            // Ajoute d'autres extensions de médias prises en charge au besoin
            // case 'extension':
            //     $mime_type = 'type_mime_correspondant';
            //     break;
    }

    // Vérifie si le type MIME est défini
    if ($mime_type) {
        // Envoie l'en-tête approprié pour le type MIME
        header('Content-Type: ' . $mime_type);
        header('Content-Length: ' . filesize($media));

        // Affiche le contenu du média
        readfile($media);
    } else {
        // Le type MIME n'est pas pris en charge
        echo 'Type MIME non pris en charge.';
    }
} else {
    // Le fichier n'existe pas, vous pouvez afficher une image de remplacement ou un message d'erreur
    echo 'Le média demandé n\'existe pas.';
}
