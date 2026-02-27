<?php
require('database.php');
require('functions/tvfPlus.php');
require('functions/reqCategMovies.php');
function checkIfUsername($uid) {
    global $db;
    if(isset($_COOKIE['id'])) {
        $reqUsername = $db->prepare("SELECT username FROM users WHERE unique_id = ?");
        $reqUsername->execute(array($uid));
        $usernameExist = $reqUsername->fetch();
        if($usernameExist['username'] == '') {
            header('location: https://tousvosfilms.com/step-2');
            exit;
        }
    }
}
function checkUsernameValid($username) {
    $valid = 1;
    if (iconv_strlen($username) < 4)  {
        $error = true;
        $valid = 0;
        $errorText = 'Le nom doit être compris entre 3 et 20 caractères';
    } elseif (iconv_strlen($username) > 20)  {
        $error = true;
        $valid = 0;
        $errorText = 'Le nom  doit être compris entre 3 et 20 caractères';
    } elseif (!preg_match("/^[\p{L}0-9- ]*$/u", $username)) {
        $error = true;
        $valid = 0;
        $errorText = 'Un caractère du nom semble incorrect';
    }
    return $valid;
}
function insertUsername($uid) {
    global $db;
    if(isset($_POST['saveUsername'])) {
        if(!empty($_POST['username'])) {
            $username = $_POST['username'];
            if(checkUsernameValid($username) != 0) {
                $reqUsername = $db->prepare("SELECT * FROM users WHERE username = ?");
                $reqUsername->execute(array($username));
                $UsernameExist = $reqUsername->rowCount();
                if($UsernameExist >= 1) {
                    $errorText = 'Nom d\'utilisateur non disponible';
                } else {
                    $updateUsername = $db->prepare("UPDATE users SET username = ? WHERE unique_id = ?");
                    $updateUsername->execute(array($username, $uid));
                    $_COOKIE['profile'] = $username;
                    header('location: select-profile');
                    exit;
                }
            }
        }
    }
}
function fetchMovieData($movie) {
    global $db;
    global $movieData;
    global $castList;
    global $castNumber;
    $reqData = $db->prepare("SELECT * FROM video WHERE name = ?");
    $reqData->execute(array($movie));
    $movieData = $reqData->fetch();
    $isDataExist = $reqData->rowCount();
    if($isDataExist == 0) {
        header('location: ../');
        exit;
    }
    $castString = $movieData['cast'];
    $castList = explode(" ",$castString);
    $castNumber = count($castList);
}
function fetchShowData($show) {
    global $db;
    global $showData;
    global $castList;
    global $castNumber;
    $reqData = $db->prepare("SELECT * FROM series WHERE name = ?");
    $reqData->execute(array($show));
    $showData = $reqData->fetch();
    $isDataExist = $reqData->rowCount();
    if($isDataExist == 0) {
        header('location: ../');
        exit;
    }
    $castString = $showData['cast'];
    $castList = explode(" ",$castString);
    $castNumber = count($castList);
}
function fetchCastData($actor) {
    global $db;
    global $actorData;
    global $video;
    global $shows;
    $reqData = $db->prepare("SELECT * FROM actor WHERE name = ?");
    $reqData->execute(array($actor));
    $actorData = $reqData->fetch();
    $isDataExist = $reqData->rowCount();
    if($isDataExist == 0) {
        header('location: ../');
        exit;
    }
    $reqVideo = $db->prepare("SELECT * FROM video WHERE type = 'movie'  ORDER BY date DESC");
    $reqVideo->execute();
    $reqShow = $db->prepare("SELECT * FROM series  ORDER BY date DESC");
    $reqShow->execute();
    $video = $reqVideo->fetchAll();
    $shows = $reqShow->fetchAll();

}
function fetchLetterData($letter) {
    global $db;
    global $videosByLetter;
    global $showByLetter;
    global $letter;
    $letter = $_GET['l'];
    $reqLetterMovie = $db->prepare("SELECT * FROM video WHERE title LIKE '{$letter}%' AND type = 'movie' ORDER BY date DESC");
    $reqLetterMovie->execute();
    $reqLetterShow= $db->prepare("SELECT * FROM series WHERE title LIKE '{$letter}%' ORDER BY date DESC");
    $reqLetterShow->execute();
    $c = $reqLetterMovie->rowCount();
    $videosByLetter = $reqLetterMovie->fetchAll();
    $showByLetter = $reqLetterShow->fetchAll();
}
function fetchCategoryData($category) {
    global $db;
    global $videosByCategory;
    global $showByCategory;
    global $letter;
    $category = $_GET['c'];
    $reqMovie = $db->prepare("SELECT * FROM video WHERE category = '{$category}' AND type = 'movie' ORDER BY date DESC");
    $reqMovie->execute();
    $reqShow = $db->prepare("SELECT * FROM series WHERE category = '{$category}' ORDER BY date DESC");
    $reqShow->execute();
    $c = $reqMovie->rowCount();
    $videosByCategory = $reqMovie->fetchAll();
    $showByCategory = $reqShow->fetchAll();
}
function fetchAllVideosData($type) {
    global $db;
    global $allVideos;
    global $allShows;
    if(isset($type)) {
        if($type == 'show') {
            $reqVideos = $db->prepare("SELECT * FROM series ORDER BY date DESC");
            $reqVideos->execute();
        } else {
            $reqVideos = $db->prepare("SELECT * FROM video WHERE type = ? ORDER BY date DESC");
            $reqVideos->execute(array($type));
        }
    } else {
        $reqVideos = $db->prepare("SELECT * FROM video WHERE type = ? ORDER BY date DESC");
        $reqVideos->execute(array("movie"));
        $reqShow = $db->prepare("SELECT * FROM series ORDER BY date DESC");
        $reqShow->execute();
        $allShows = $reqShow->fetchAll();
    }

    $allVideos = $reqVideos->fetchAll();
}
function reqLastMovies() {
    global $db;
    $reqMovie = $db->prepare("SELECT * FROM video WHERE type = 'movie' ORDER BY id DESC LIMIT 7");
    $reqMovie->execute();
    $lastMovies = $reqMovie->fetchAll();
    foreach ($lastMovies as $lM) {
    ?>
    <a href="video/<?= $lM['name'] ?>" style="margin-bottom: 15px">
        <div class="movie-card">
            <div class="card-head">
              <img src="assets/images/cover/<?= $lM['cover'] ?>" alt="<?= $lM['title'] ?>" class="card-img">
              <div class="card-overlay">
                <div class="rating">
                  <ion-icon name="star-outline"></ion-icon>
                  <span><?= $lM['stars'] ?></span>
                </div>
                <div class="play">
                  <ion-icon name="play-circle-outline"></ion-icon>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h3 class="card-title"><?= $lM['title'] ?></h3>
              <div class="card-info">
                <span class="genre"><?= $lM['genre'] ?></span>
                <span class="year"><?= $lM['date'] ?></span>
              </div>
            </div>
        </div>
    </a>
    <?php
    }
}
function fetchUserData() {
    global $db;
    global $userData;
    global $profile;
    if(isset($_COOKIE['id'])) {
        @ $profile = $_COOKIE['profile'];
        $fetchData = $db->prepare("SELECT * FROM users WHERE id = ?");
        $fetchData->execute(array($_COOKIE['id']));
        $userData = $fetchData->fetch();
    }
}
function fetchProfile() {
    global $db;
    global $profileData;
    global $userData;
    $fetchProfile = $db->prepare("SELECT * FROM profile WHERE uid = ?");
    $fetchProfile->execute(array($userData['unique_id']));
    $profileData = $fetchProfile->fetchAll();
}
function checkProfileSession() {
    global $db;
    if(!isset($_SESSION['profile'])) {
        header('location: select-profile');
    }
}
function myList($profile) {
    global $db;
    global $userData;
    if(!isset($_COOKIE['id'])) {
        echo "Vous n'êtes pas connecté";
    } else {
        $reqList = $db->prepare("SELECT * FROM list WHERE uid = ? AND profile = ?");
        $reqList->execute(array($userData['unique_id'], $profile));
        $fetchList = $reqList->fetchAll();
        $fetchCount = $reqList->rowCount();
        if($fetchCount >= 1) {
        ?>
        <div class="movies-grid">
        <?php
            foreach ($fetchList as $fList) {
        ?>
        <?php
        if($fList['type'] == 'show') {
        ?>
        <a href="show/<?= $fList['name'] ?>">
        <?php
        } else {
        ?>
        <a href="video/<?= $fList['name'] ?>">
        <?php
        }
        ?>
            <div class="movie-card">
              <div class="card-head">
                <img src="assets/images/cover/<?= $fList['cover'] ?>" alt="<?= $fList['title'] ?>" class="card-img">
                <div class="card-overlay">
                  <div class="rating">
                    <ion-icon name="star-outline"></ion-icon>
                    <span>8.3</span>
                  </div>
                  <div class="play">
                    <ion-icon name="play-circle-outline"></ion-icon>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <h3 class="card-title"><?= $fList['title'] ?></h3>
              </div>
            </div>
          </a>
        <?php
            }
        }
        ?>
    <?php
    }
}
function checkList($uid, $profile, $name, $title, $type, $cover) {
    global $db;
    $reqExist = $db->prepare("SELECT * FROM list WHERE uid = ? AND profile = ? AND name = ? AND title = ? AND type = ? AND cover = ?");
    $reqExist->execute(array($uid,$profile,$name,$title,$type,$cover));
    $exist = $reqExist->rowCount();
    if($exist >= 1) {
    ?>
    <input type="submit" value="Supprimer de ma liste" name="addList">
    <?php
    } else {
    ?>
    <input type="submit" value="Ajouter à ma liste" name="addList">
    <?php
    }
}
function addList($uid, $profile, $name, $title, $type, $cover) {
    global $db;
    $reqExist = $db->prepare("SELECT * FROM list WHERE uid = ? AND profile = ? AND name = ? AND title = ? AND type = ? AND cover = ?");
    $reqExist->execute(array($uid,$profile,$name,$title,$type,$cover));
    $exist = $reqExist->rowCount();
    if($exist >= 1) {
        $insertList = $db->prepare("DELETE FROM list WHERE uid = ? AND profile = ? AND name = ? AND title = ? AND type = ? AND cover = ?");
        $insertList->execute(array($uid,$profile,$name,$title,$type,$cover));
        if($type == 'show') {
            header('location: ../show/'.$name);
            exit;
        } else {
            header('location: ../video/'.$name);
            exit;
        }

    }
    else {
        $insertList = $db->prepare("INSERT INTO list (uid,profile,name,title,type,cover) VALUES (?,?,?,?,?,?)");
        $insertList->execute(array($uid,$profile,$name,$title,$type,$cover));
        if($type == 'show') {
            header('location: ../show/'.$name);
            exit;
        } else {
            header('location: ../video/'.$name);
            exit;
        }
    }
}
function reqProfile($uid) {
    global $db;
    $reqProfiles = $db->prepare("SELECT * FROM profile WHERE uid = ?");
    $reqProfiles->execute(array($uid));
    $Profiles = $reqProfiles->fetchAll();
    foreach ($Profiles as $pr) {
    ?>
    <a href="core/SwitchProfile?uid=<?= $uid ?>&name=<?=$pr['name']; ?>">
        <div class="profile">
            <?php
            if($pr['avatar'] == '') {
                echo '<div class="avatar"><img src="assets/images/avatar/1.png"></div>';
            } else {
                echo '<div class="avatar"><img src="assets/images/avatar/'.$pr['avatar'].'.png"></div>';
            }
            ?>
            <div class="name"><?=$pr['name']; ?></div>
        </div>
    </a>
    <?php
    }
}
function addProfile($name, $uid) {
    global $db;
    $valid = true;
    if(!empty($name)) {
        $name = trim($name);

        if(checkUsernameValid($name) == 0) {
            $valid = false;
            $errorText = "Nom invalide.";
        }

        $reqUser = $db->prepare("SELECT * FROM users WHERE unique_id = ?");
        $reqUser->execute(array($uid));
        $userData = $reqUser->fetch();
        
        if($name == $userData['username']) {
            $error = true;
            $valid = false;
            $errorText = 'Ce profil existe déja';
        }

        $reqName = $db->prepare("SELECT * FROM profile WHERE uid = ? AND name = ?");
        $reqName->execute(array($uid, $name));
        $nameExist = $reqName->rowCount();
        
        if($nameExist >= 1) {
            $valid = false;
            $errorText = 'Ce profil existe déja';
        }

        if($valid) {
            $insertProfile = $db->prepare("INSERT INTO profile (uid, name, avatar) VALUES (?, ?, ?)");
            $insertProfile->execute(array($uid, $name, ''));
            header('location: select-profile');
            exit;
        }
    }
}
function reqProfileModal($uid) {
    global $db;
    $reqProfiles = $db->prepare("SELECT * FROM profile WHERE uid = ?");
    $reqProfiles->execute(array($uid));
    $Profiles = $reqProfiles->fetchAll();
    foreach ($Profiles as $pr) {
    ?>
    <form method="post" action="">
        <div class="profilesModalProfile">
            <?php
            if($pr['avatar'] == '') {
              echo '<div class="profilesModalProfileAvatar"><img src="assets/images/avatar/1.png"></div>';
            } else {
              echo '<div class="profilesModalProfileAvatar"><img src="assets/images/avatar/'.$pr['avatar'].'.png"></div>';
            }
            ?>
            <div class="profilesModalProfileName"><?=$pr['name']; ?></div>
            <a href="account?editProfile=<?=$pr['name']; ?>" class="profilesModalProfileEdit">Modifier</a>
            <input type="submit" class="profilesModalProfileDelete" value="Supprimer" name="deleteProfile">
        </div>
    </form>
    <?php
    }
    if(isset($_POST['deleteProfile'])) {
      deleteProfile($uid, $pr['name']);
    }
}
function deleteProfile($uid, $name) {
    global $db;
    $reqName = $db->prepare("SELECT * FROM profile WHERE uid = ?");
    $reqName->execute(array($uid));
    $profileExist = $reqName->rowCount();
    if($profileExist >= 1) {
        $del = $db->prepare("DELETE FROM profile WHERE uid = ? AND name = ?");
        $del->execute(array($uid, $name));
        $delList = $db->prepare("DELETE FROM list WHERE uid = ? AND profile = ?");
        $delList->execute(array($uid, $name));
        ?>
        <script> location.replace("core/SwitchProfile?uid=<?= $uid ?>"); </script>
        <?php        
        exit;
    }
}
function checkEditProfile($uid) {
    global $db;
    if(isset($_GET['editProfile'])) {
        $reqName = $db->prepare("SELECT * FROM profile WHERE uid = ? AND name = ?");
        $reqName->execute(array($uid, $_GET['editProfile']));
        $profileExist = $reqName->rowCount();
        if($profileExist >= 1) {
            $reqInfos = $db->prepare("SELECT * FROM profile WHERE uid = ? AND name = ?");
            $reqInfos->execute(array($uid, $_GET['editProfile']));
            $profileInfos = $reqInfos->fetch();
        ?>
        <div class="editProfile">
            <div class="editProfileContent">
                <div class="editProfileHeader">
                    <a href="account" class="profilesModalClose"><ion-icon name="close-outline" role="img" class="md hydrated" aria-label="close outline"></ion-icon></a>
                </div>
                <a href="avatar?profile=<?= $_GET['editProfile'] ?>">
                <?php
                if($profileInfos['avatar'] == '') {
                echo '<div class="editProfileAvatar"><img src="assets/images/avatar/1.png"></div>';
                } else {
                echo '<div class="editProfileAvatar"><img src="assets/images/avatar/'.$profileInfos['avatar'].'.png"></div>';
                }
                ?>
                </a>
                <form method="post" action="">
                    <input type="text" placeholder="Nom du profil" value="<?= $_GET['editProfile'] ?>" class="editProfileName" name="editProfileName">
                    <input type="submit" class="editProfileSubmit" value="Sauvegarder" name="editProfileSubmit">
                </form>
            </div>
        </div>
        <?php
            if(isset($_POST['editProfileSubmit'])) {
                if(!empty($_POST['editProfileName'])) {
                    $newName = trim($_POST['editProfileName']);
                    $valid = true;
                    if(checkUsernameValid($newName) == 0) {
                        $valid = false;
                        $errorText = "Nom invalide.";
                    }

                    $reqUser = $db->prepare("SELECT * FROM users WHERE unique_id = ?");
                    $reqUser->execute(array($uid));
                    $userData = $reqUser->fetch();
                    
                    if($newName == $userData['username']) {
                        $valid = false;
                        $errorText = 'Ce profil existe déja';
                    }

                    $reqName = $db->prepare("SELECT * FROM profile WHERE uid = ? AND name = ?");
                    $reqName->execute(array($uid, $newName));
                    $nameExist = $reqName->rowCount();
                    
                    if($nameExist >= 1) {
                        $valid = false;
                        $errorText = 'Ce profil existe déja';
                    }

                    if($valid) {
                        $updateProfile = $db->prepare("UPDATE profile SET name = ? WHERE name = ? AND uid = ?");
                        $updateProfile->execute(array($newName, $_GET['editProfile'], $uid));
                        $updateList = $db->prepare("UPDATE list SET profile = ? WHERE profile = ? AND uid = ?");
                        $updateList->execute(array($newName, $_GET['editProfile'], $uid));
                        $_SESSION['profile'] = $newName;
                        header('location: select-profile');
                        exit;
                    }
                }
            }
        }
    }
}
?>