import { initializeNewDropdowns, postEvents } from './eventHandlers.js';

export var displayedPosts = [];

/**
 * Charge davantage de publications depuis le serveur.
 * 
 * @param {string} url - L'URL vers laquelle effectuer la requête AJAX.
 * @param {string} action - L'action à effectuer (par exemple, charger plus de publications).
 */
export function loadMorePosts(url, action) {
    var lastPostID = $('.post:last').data('post-id');

    $.ajax({
        url: url,
        type: 'POST',
        data: {
            action: action,
            lastPostID: lastPostID
        },
        success: function(response) {
            if (response !== '') {
                var newPosts = $(response);

                newPosts.each(function() {
                    var postID = $(this).data('post-id');

                    if (!displayedPosts.includes(postID)) {
                        displayedPosts.push(postID);
                        $('#new-posts').append($(this));
                    }
                });

                postEvents();
                initializeNewDropdowns(document);
                hideSkeleton();
            }
        },
    });
}

/**
 * Cache les éléments skeleton après un certain délai.
 */
export function hideSkeleton() {
    const allSkeleton = $('.skeleton');
    setTimeout(function() {
        allSkeleton.removeClass('skeleton');
    }, 2000);
}
