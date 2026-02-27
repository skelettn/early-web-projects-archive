/**
 * Kiju AJAX Manager v26.0
 * 
 * Problèmes connues :
 * -> Problèmes avec l'apparition de certains dropdowns
 * -> Problèmes d'ouverture du modal pour faire une réponse
 * -> Problèmes avec la mise à jour du compteur de j'aimes
 * 
 */

import { addLike, repost } from './ajaxManager.js';
import { initializeNewDropdowns, postEvents } from './eventHandlers.js';
import { loadMorePosts, hideSkeleton } from './postManipulation.js';

$(document).ready(function() {

    initializeNewDropdowns(document);
    postEvents();

    $(document).on('click', '.add_Like', function() {
        var button = $(this);
        var postID = $(this).data('post-id');
        var isLiked = button.hasClass('active');
        var counter = button.closest('.actions').next('.actionsData').find('.like_Count');
        var initialCount = parseInt(counter.text());

        addLike(postID, isLiked, button, counter, initialCount);
    });

    $(document).on('click', '.repost_Btn', function() {
        var button = $(this);
        var postID = $(this).data('post-id');
        var isReposted = button.hasClass('active');

        repost(postID, isReposted, button);
    });

    $(window).scroll(function() {
        if ((($(window).scrollTop() + $(window).height()) + 5) >= $(document).height()) {
           loadMorePosts('', 'loadMorePosts');
        }
     });

    hideSkeleton();
    
});