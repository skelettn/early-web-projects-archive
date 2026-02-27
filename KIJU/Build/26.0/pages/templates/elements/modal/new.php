<?php

use KIJU\Controllers\Modals\PostController;
use KIJU\App;

$postController = new PostController();
$communities = $postController->getFollowedCommunities();

if (isset($_POST['add_Post'])) {
    $content = htmlspecialchars($_POST['post-content']);
    $community = htmlspecialchars($_POST['communities']);
    if (isset($_FILES['media_Files']['name']) && is_array($_FILES['media_Files']['name'])) {
        $medias = array();

        foreach ($_FILES['media_Files']['name'] as $key => $name) {
            $type = $_FILES['media_Files']['type'][$key];
            $tmp_name = $_FILES['media_Files']['tmp_name'][$key];
            $error = $_FILES['media_Files']['error'][$key];
            $size = $_FILES['media_Files']['size'][$key];

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

        $postController->addPost($content, $community, $medias);
    }

    $postController->addPost($content, $community, []);
}
?>
<div id="postModal" class="modal">
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
                <div class="new-post">
                    <div class="new-post-data">
                        <div class="author">
                            <div class="profile-picture" style="background-image: url('<?= App::getUser()->getProfilePicture() ?>');"></div>
                            <div class="subdata">
                                <div class="name"><?= App::getUser()->getUsername() ?></div>
                                <div class="community">
                                    <div class="select-group">
                                        <label for="communities">Communauté</label>
                                        <select name="communities" id="communities" aria-label="Sélectionnez une communauté">
                                            <?php foreach ($communities as $community) : ?>
                                                <option value="<?= $community->getCommunityUID() ?>"><?= $community->getCommunityName() ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="new-post-content">
                        <textarea name="post-content" id="post-content" oninput="handleTextareaInput(event)" placeholder="Quelque chose à partager ?" maxlength="2000"></textarea>
                        <div id="post-medias-preview" class="post-medias-preview scrollable">
                            <div class="medias-preview-container" id="medias-preview-container"></div>
                        </div>
                    </div>
                    <div class="new-post-actions">
                        <div class="remaining_Characters">
                            <span><span id="post_CharCount">2000</span> restants.</span>
                        </div>
                        <div class="action media">
                            <input type="file" name="media_Files[]" id="media_Files" accept="image/*" onchange="previewImage(this)" multiple>
                            <label for="media_Files">
                                <img src="https://assets.kiju.me/img/icons/upload.svg" alt="Upload">
                            </label>
                        </div>
                        <div class="action submit">
                            <button type="submit" name="add_Post">Publier</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>