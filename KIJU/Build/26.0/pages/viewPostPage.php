<?php

use KIJU\Controllers\ViewController;
use KIJU\App;

$viewController = new ViewController($_GET['post_id']);
$viewController->isPostExist();
$post = $viewController->getPost();
$comments = $viewController->getComments();


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $viewController->managePosts();
}

if (isset($_POST['publish_Comment'])) {
    $comment = htmlspecialchars($_POST['comment']);
    if (isset($_FILES['comment_Files']['name']) && is_array($_FILES['comment_Files']['name'])) {
        $medias = array();

        foreach ($_FILES['comment_Files']['name'] as $key => $name) {
            $type = $_FILES['comment_Files']['type'][$key];
            $tmp_name = $_FILES['comment_Files']['tmp_name'][$key];
            $error = $_FILES['comment_Files']['error'][$key];
            $size = $_FILES['comment_Files']['size'][$key];

            if ($error === UPLOAD_ERR_OK) {
                $media = array(
                    'name' => $name,
                    'type' => $type,
                    'tmp_name' => $tmp_name,
                    'error' => $error,
                    'size' => $size
                );

                $medias[] = $media;
            }
        }

        $viewController->addComment($comment, $medias);
    }

    $viewController->addComment($comment, []);
}

?>
<div class="feed">
    <?php if ($viewController->IsRefID()) : ?>
        <div class="fixed-infos">
            <a href="/p/<?= $viewController->getPostRefID() ?>">
                <div class="return-action">
                    <div class="icon"><i class="lni lni-arrow-left"></i></div>
                </div>
            </a>
            <span>Retour au post d'origine</span>
        </div>
    <?php else : ?>
        <div class="fixed-infos">
            <a href="/home">
                <div class="return-action">
                    <div class="icon"><i class="lni lni-arrow-left"></i></div>
                </div>
            </a>
            <span>Retour</span>
        </div>
    <?php endif; ?>
    <?php require('templates/components/post-skeleton.php'); ?>
    <?php require('templates/components/post.php'); ?>
    <div class="comments">
        <?php if (App::isLogged()) : ?>
            <div class="account">
                <div class="profilePicture">
                    <?php if (!empty($viewController->getProfilePicture())) : ?>
                        <img src="<?= $viewController->getProfilePicture() ?>" alt="<?= $viewController->getUsername() ?>">
                    <?php endif; ?>
                </div>
                <div class="data comment">
                    <form action="" method="post" enctype="multipart/form-data">
                        <textarea name="comment" id="comment_Textarea" placeholder="Nouvelle réponse" maxlength="2000"></textarea>
                        <div class="comment-actions">
                            <div class="comment-infos">
                                <div class="remaining_Characters">
                                    <span><span id="comment_CharCount">2000</span> restants.</span>
                                </div>
                            </div>
                            <div class="media">
                                <input type="file" name="comment_Files[]" id="comment_Media_Label" multiple>
                                <label for="comment_Media_Label">
                                    <img src="https://assets.kiju.me/img/icons/upload.svg" alt="Upload">
                                </label>
                            </div>
                            <button name="publish_Comment">Envoyer</button>
                        </div>
                    </form>
                </div>
            </div>
        <?php else : ?>
            <div class="account">
                <div class="profilePicture">
                    <img src="https://assets.kiju.me/img/avatar-default-ptzr6kmg652a2w4lsbc7yrspm9r4z4y5wcvej6fgkg.png" alt="avatar-default-user">
                </div>
                <div class="data comment">
                    <form action="">
                        <textarea name="comment" id="comment_Textarea" placeholder="Connectez-vous pour répondre" maxlength="2000"></textarea>
                        <div class="comment-actions">
                            <div class="comment-infos">
                                <div class="remaining_Characters">
                                    <span><span id="comment_CharCount">2000</span> restants.</span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div class="posts">
        <?php require('templates/components/post-skeleton.php'); ?>
        <?php foreach ($comments as $post) : ?>
            <?php require('templates/components/post.php'); ?>
        <?php endforeach; ?>
        <div id="new-posts"></div>
    </div>
</div>
</div>