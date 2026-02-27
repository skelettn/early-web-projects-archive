/**
 * Configure un menu déroulant pour faire défiler son contenu horizontalement.
 *
 * @param {jQuery} $scrollMenu - Menu déroulant sous forme d'objet jQuery.
 */
export function setupScrollMenu($scrollMenu) {
    // Sélection des éléments nécessaires du menu déroulant
    const $content = $scrollMenu.find('.scroll-content');
    const $prevButton = $scrollMenu.find('.prev-button');
    const $nextButton = $scrollMenu.find('.next-button');
    let scrollPosition = 0; // Position actuelle de défilement

    // Gestionnaire de clic pour le bouton précédent
    $prevButton.on('click', function() {
        scrollPosition -= 500;
        if (scrollPosition < 0) {
            scrollPosition = 0;
        }
        updateScrollPosition();
    });

    // Gestionnaire de clic pour le bouton suivant
    $nextButton.on('click', function() {
        scrollPosition += 500;
        if (scrollPosition > $content[0].scrollWidth - $content[0].clientWidth) {
            scrollPosition = $content[0].scrollWidth - $content[0].clientWidth;
        }
        updateScrollPosition();
    });

    // Met à jour la position de défilement en fonction de la position actuelle
    function updateScrollPosition() {
        $content.css('transform', `translateX(-${scrollPosition}px)`);
    }
}