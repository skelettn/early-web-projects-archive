<?php

use KIJU\App;
use KIJU\Controllers\Components\PostController;

if (isset($_POST['delete-post'])) {
    $post_UID = htmlspecialchars($_POST['post_ID']);
    if ($post->isMyPost($post_UID)) {
        $postController = new PostController($post_UID);
        $postController->deletePost();
    }
    header('location: /p/' . $post_UID . '&err=KIJU_Error');
    exit;
}

if (isset($_POST['add-quote'])) {
    $post_UID = htmlspecialchars($_POST['postid']);
    $content = htmlspecialchars($_POST['post-content']);
    $postController = new PostController($post_UID);
    $postController->addQuote($content, $post->getCommunityID());
    header('location: /p/' . $post_UID . '&err=KIJU_Error');
    exit;
}
?>
<div class="post post-loaded" data-post-id="<?= $post->getPostUniqueID() ?>">
    <form action="" method="post">
        <input type="hidden" name="post_ID" value="<?= $post->getPostUniqueID() ?>">
        <div class="action-buttons">
            <span><?= $post->displayElapsedTime() ?></span>
            <div class="user dropdown-menu">
                <div class="dropdown-menu-btn">
                    <button class="actions" type="button" aria-label="Plus d'options"><i class="lni lni-more-alt"></i></button>
                </div>
                <div class="dropdown-content">
                    <?php if ($post->isMyPost($post->getPostUniqueID()) && $post->getDeleted() != 1) : ?>
                        <div class="item"><button class="deletePost" type="submit" name="delete-post">Supprimer</button></div>
                    <?php endif; ?>
                    <div class="item">Signaler</div>
                </div>
            </div>
        </div>
    </form>
    <a href="/user/<?= $post->getUsername() ?>" class="postRedirect">
        <div class="profilePicture">
            <?php
            if (!empty($post->getUserProfilePic())) : ?>
                <img src="<?= $post->getUserProfilePic() ?>" alt="<?= $post->getUsername() ?>">
            <?php endif; ?>
        </div>
    </a>
    <div class="data">
        <a href="/user/<?= $post->getUsername() ?>" class="postRedirect">
            <h5 class="authorFullName">
                <?= $post->getUsername() ?>
                <?php if ($post->getUserStatus()) : ?>
                    <img src="https://assets.kiju.me/img/1123/verified_badge_purple.png" class="badge" alt="Verified User" title="Verified User">
                <?php endif;  ?>
            </h5>
        </a>
        <a href="/c/<?= $post->getCommunityUID() ?>" class="postRedirect">
            <div class="tags">
                <div class="tag">
                    <span class="tagName"><?= $post->getCommunityName() ?></span>
                </div>
            </div>
        </a>
        <div class="authorContent">
            <p class="c"><?= $post->getContent() ?></p>
            <?php if (count($post->getMedias()) <= 1) : ?>
                <div class="medias">
                    <?php foreach ($post->getMedias() as $media) : ?>
                        <img src="<?= $media->getMediaURL() ?>" alt="ALT">
                    <?php endforeach; ?>
                </div>
            <?php else : ?>
                <div class="medias grid">
                    <?php foreach ($post->getMedias() as $media) : ?>
                        <img src="<?= $media->getMediaURL() ?>" alt="ALT">
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <?php
            // Vérification si le post à un QuotedID
            if ($post->getQuotedID() != 0) {
                $postController = new PostController(0);
                $quote = $postController->getQuote($post->getQuotedID());

                foreach ($quote as $post) : ?>
                    <div class="current-post-content quote">
                        <div class="data">
                            <div class="author">
                                <div class="profile-picture">
                                    <?php
                                    if (!empty($post->getUserProfilePic())) : ?>
                                        <img src="<?= $post->getUserProfilePic() ?>" alt="<?= $post->getUsername() ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="name"><?= $post->getUsername() ?></div>
                            </div>
                            <span><?= $post->displayElapsedTime() ?></span>
                        </div>
                        <div class="post-content">
                            <?= $post->getContent() ?>
                        </div>
                    </div>
            <?php
                endforeach;
            }
            ?>
        </div>
        <?php if ($post->getDeleted() != 1 && App::isLogged()) : ?>
            <form method="post" action="" class="actions">
                <input type="hidden" name="postid" value="<?= $post->getPostUniqueID() ?>">
                <button aria-label="Commenter" type="button">
                    <i class="fa-regular fa-message"></i>
                </button>
                <button aria-label="Citer" type="button" class="modalBtn" data-modal="quote-modal-<?= $post->getPostUniqueID() ?>">
                    <i class="fa-solid fa-quote-right"></i>
                </button>
                <?php
                $postController = new PostController($post->getPostUniqueID());
                ?>
                <?php if ($postController->isAlreadyReposted($post->getPostUniqueID())) : ?>
                    <button aria-label="Republier" type="button" aria-label="Republier" class="repost_Btn active" data-post-id="<?= $post->getPostUniqueID() ?>">
                        <i class="fa active fa-solid fa-retweet"></i>
                    </button>
                <?php else : ?>
                    <button aria-label="Republier" type="button" aria-label="Republier" class="repost_Btn" data-post-id="<?= $post->getPostUniqueID() ?>">
                        <i class="fa fa-solid fa-retweet"></i>
                    </button>
                <?php endif; ?>
                <?php if ($postController->isAlreadyLiked($post->getPostUniqueID())) : ?>
                    <button class="add_Like active" type="button" aria-label="Aimer" data-post-id="<?= $post->getPostUniqueID() ?>">
                        <i class="fa active fa-solid fa-heart"></i>
                    </button>
                <?php else : ?>
                    <button class="add_Like" type="button" aria-label="Aimer" data-post-id="<?= $post->getPostUniqueID() ?>">
                        <i class="fa fa-regular fa-heart"></i>
                    </button>
                <?php endif; ?>
            </form>
        <?php endif; ?>
        <div class="actions-data">
            <span><?= $post->getComments() ?> réponse(s) · <span class="like_Count" data-initial-count="<?= $post->getLikes() ?>"><?= $post->getLikes() ?></span> j'aime(s)</span>
        </div>
        <?php
        $postController = new PostController($post->getPostUniqueID());
        if ($postController->isRepostedByID(@$id)) : ?>
            <div class="repost">
                <span><i class="fa-solid fa-retweet"></i> <?= $postController->getRepostedUsername(@$id, @$userName) ?> a republié ce post.</span>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php if (App::isLogged()) : ?>
    <div id="quote-modal-<?= $post->getPostUniqueID() ?>" class="modal quoted-modal">
        <div class="modalContainer">
            <div class="modalHeader">
                <div class="modalLogo">
                    <img src="https://about.kiju.me/assets/img/Social.png" alt="Kiju Beta">
                </div>
                <div class="modalClose">
                    <i class="lni lni-close"></i>
                </div>
            </div>
            <div class="modalContent">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="postid" value="<?= $post->getPostUniqueID() ?>">
                    <div class="new-post">
                        <div class="new-post-data">
                            <div class="author">
                                <div class="profile-picture" style="background-image: url('<?= App::getUser()->getProfilePicture() ?>');"></div>
                                <div class="subdata">
                                    <div class="name"><?= App::getUser()->getUsername() ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="new-post-content">
                            <textarea name="post-content" id="post-quoted-content" oninput="handleTextareaInput(event)" placeholder="Répondre à <?= $post->getUsername() ?>" maxlength="2000"></textarea>
                        </div>
                        <div class="current-post-content quote">
                            <div class="data">
                                <div class="author">
                                    <div class="profile-picture">
                                        <?php
                                        if (!empty($post->getUserProfilePic())) : ?>
                                            <img src="<?= $post->getUserProfilePic() ?>" alt="<?= $post->getUsername() ?>">
                                        <?php endif; ?>
                                    </div>
                                    <div class="name"><?= $post->getUsername() ?></div>
                                </div>
                                <span><?= $post->displayElapsedTime() ?></span>
                            </div>
                            <div class="post-content">
                                <?= $post->getContent() ?>
                            </div>
                        </div>
                        <div class="new-post-actions">
                            <small style="margin-right: 7px;">Fonctionnalité en cours de test.</small>
                            <div class="remaining_Characters">
                                <span><span id="post_CharCount">2000</span> restants.</span>
                            </div>
                            <div class="action submit">
                                <button type="submit" name="add-quote">Publier</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endif; ?>