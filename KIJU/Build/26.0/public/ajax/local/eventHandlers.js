// eventHandlers.js

/**
 * Initialise les nouveaux dropdowns.
 * 
 * @param {Element} container - Le conteneur dans lequel initialiser les dropdowns.
 */
export function initializeNewDropdowns(container) {
    const dropdowns = $(container).find(".dropdown-menu");

    if (dropdowns.length > 0) {
        dropdowns.each(function() {
            const dropdown = $(this);
            const dropdownToggle = dropdown.find(".dropdown-menu-btn");
            const dropdownMenu = dropdown.find(".dropdown-content");

            dropdownToggle.on("click", function() {
                dropdown.toggleClass("open");
            });

            $(document).on("click", function(event) {
                const isClickInside = dropdown.is(event.target) || dropdown.has(event.target).length > 0;

                if (!isClickInside && dropdown.hasClass("open")) {
                    dropdown.removeClass("open");
                }
            });

            dropdownMenu.on("animationend", function() {
                if (!dropdown.hasClass("open")) {
                    dropdownMenu.hide();
                }
            });
        });
    }
}

/**
 * Initialise les gestionnaires d'événements pour les publications.
 */
export function postEvents() {
    var postsContainer = $('#new-posts');

    if (postsContainer.length > 0) {
        postsContainer.on('click', function(event) {
            var post = $(event.target).closest('.post');
            if (!post.length) return;

            var dropdownToggle = post.find('.dropdown-menu-btn');
            var dropdownMenu = post.find('.dropdown-content');

            if ($(event.target).closest('.dropdown-menu-btn').length > 0) {
                event.stopPropagation();
                dropdownMenu.toggleClass('open');
                event.preventDefault();
            } else if (!$(event.target).closest('a, button').length) {
                var postId = post.data('postId');
                window.location.href = '/p/' + postId;
            }
        });
    }
}
