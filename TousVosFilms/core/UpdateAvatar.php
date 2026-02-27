<?php
require('functions.php');
fetchUserData();
$uid = $userData['unique_id'];
if(isset($_GET['profile']) AND isset($_GET['avatar'])) {
    $reqProfile = $db->prepare("SELECT * FROM profile WHERE uid = ? AND name = ?");
    $reqProfile->execute(array($uid, $_GET['profile']));
    $profileData = $reqProfile->fetch();
    $profileExist = $reqProfile->rowCount();
    if($profileExist >= 1) {
        $updAvatar = $db->prepare("UPDATE profile SET avatar = ? WHERE uid = ? AND name = ?");
        $updAvatar->execute(array($_GET['avatar'], $uid, $_GET['profile']));
        header('location: ../select-profile');
        exit;
    } else {
        header('location: ../account');
        exit;
    }
} else {
    header('location: ../account');
    exit;
}
?>