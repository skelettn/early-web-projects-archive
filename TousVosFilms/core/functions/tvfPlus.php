<?php
function insertTVFPlus($uid) {
    global $db;
    if(isset($_POST['activatePlus'])) {
        $reqUser = $db->prepare("SELECT * FROM users WHERE unique_id = ?");
        $reqUser->execute(array($uid));
        $userData = $reqUser->fetch();
        $valid = true;

        if($userData['tvf_plus'] == "1") {
            $valid = false;
        }

        if($userData['tvf_coin'] < 200) {
            $valid = false;
        }

        $checkExistingSubscription = $db->prepare("SELECT * FROM tvf_plus WHERE uid = ?");
        $checkExistingSubscription->execute(array($uid));
        $subExist = $checkExistingSubscription->rowCount();

        if($subExist >= 1) {
            $delSub = $db->prepare("DELETE FROM tvf_plus WHERE uid = ?");
            $delSub->execute(array($uid));
        }

        if($valid) {
            $currentTime = time();
            $expirationDate = time() + 60 * 60 * 24 * 30;
            $newCoin = $userData['tvf_coin'] - 200;
            $updateTVFPlus = $db->prepare("UPDATE users SET tvf_plus = ? WHERE unique_id = ?");
            $updateTVFPlus->execute(array(1, $uid));
            $updateTVFCoin = $db->prepare("UPDATE users SET tvf_coin = ? WHERE unique_id = ?");
            $updateTVFCoin->execute(array($newCoin, $uid));
            $insertSubscription = $db->prepare("INSERT INTO tvf_plus (uid,subscription_start,subscription_end) VALUES (?, ?, ?)");
            $insertSubscription->execute(array($uid, $currentTime, $expirationDate));
            header('location: account');
            exit;
        }
    }
}

function checkTVFPlus($uid) {
    global $db;
    global $subscriptionEnd;
    $reqUser = $db->prepare("SELECT * FROM users WHERE unique_id = ?");
    $reqUser->execute(array($uid));
    $userData = $reqUser->fetch();
    $valid = true;

    $checkExistingSubscription = $db->prepare("SELECT * FROM tvf_plus WHERE uid = ?");
    $checkExistingSubscription->execute(array($uid));
    $subData = $checkExistingSubscription->fetch();
    $subExist = $checkExistingSubscription->rowCount();

    if($subExist >= 1) {
        $subscriptionEndInt = $subData['subscription_end'];
        $subscriptionEnd = date('d/m/Y', $subscriptionEndInt);
        if(time() >= ($subData['subscription_start'] + 60 * 60 * 24 * 30)) {
            $delSub = $db->prepare("DELETE FROM tvf_plus WHERE uid = ?");
            $delSub->execute(array($uid));
            $updateTVFPlus = $db->prepare("UPDATE users SET tvf_plus = ? WHERE unique_id = ?");
            $updateTVFPlus->execute(array(0, $uid));
            header('location: account');
            exit;
        }
    }
}
?>