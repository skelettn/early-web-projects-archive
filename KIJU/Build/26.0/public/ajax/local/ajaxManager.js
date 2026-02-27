// ajaxManager.js

export function addLike(postID, isLiked, button, counter, initialCount) {
    $.ajax({
        type: 'POST',
        url: window.location.href,
        data: {
            action: 'like',
            postid: postID,
            isLiked: isLiked
        },
        success: function(response) {

            if (button.hasClass('active')) {
                button.removeClass('active');
                button.find('.fa').removeClass('fa-solid');
                button.find('.fa').removeClass('active');
                button.find('.fa').toggleClass('fa-regular');
                var updatedCount = initialCount - 1;
            } else {
                button.addClass('active');
                button.find('.fa').toggleClass('fa-solid');
                button.find('.fa').toggleClass('active');
                button.find('.fa').removeClass('fa-regular');
                var updatedCount = initialCount + 1;
            }

            counter.text(updatedCount);
        }
    });
}

export function repost(postID, isReposted, button) {
    $.ajax({
        type: 'POST',
        url: window.location.href,
        data: {
            action: 'repost',
            postid: postID,
            isReposted: isReposted
        },
        success: function(response) {
            if (button.hasClass('active')) {
                button.removeClass('active');
                button.find('.fa').removeClass('active');
            } else {
                button.addClass('active');
                button.find('.fa').toggleClass('active');
            }
        }
    });
}
