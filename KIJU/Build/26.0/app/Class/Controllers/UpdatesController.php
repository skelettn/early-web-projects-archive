<?php

namespace KIJU\Controllers;

use KIJU\App;

/**
 * Classe représentant la page 'update' du site
 *
 * Cette classe permet d'afficher les dernière mises à jour de Kiju
 */
class UpdatesController
{
    /**
     * Affiche les mises à jours
     *
     * @return void
     */
    public function showUpdates(): void
    {
        // Chemin du fichier CSV
        $cheminFichierCSV = 'updates.csv';

        // Lire le contenu du fichier CSV
        $lines = file($cheminFichierCSV);

        // Parcourir les lignes du fichier CSV
        foreach ($lines as $line) {
            $line = trim($line); // Supprimer les espaces blancs au début et à la fin de la ligne

            // Vérifier si la ligne commence par "10" pour identifier une nouvelle version
            if (preg_match('/^(1\d|2\d|3\d|4\d|5\d|6\d|7\d|8\d|9\d)\.(0|1)/', $line, $matches)) {
                // Nouvelle version détectée
                if (isset($currentVersion)) {
                    echo '</ul></div></div>';
                }
                $currentVersion = $matches[0];
                echo '<div class="update">';
                echo '<div class="updateBadge">Mise à jour</div>';
                echo '<h2 class="updateTitle">' . $currentVersion . '</h2>';
                echo '<div class="updateDetails"><ul>';
            } else {
                // Pas une nouvelle version, afficher dans un li
                echo '<li>' . $line . '</li>';
            }
        }

        // Fermer la dernière div si la version se termine le fichier
        if (isset($currentVersion)) {
            echo '</ul></div></div>';
        }
    }
}
