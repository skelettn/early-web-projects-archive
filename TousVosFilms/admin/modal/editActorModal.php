<?php
$valid = false;
if(isset($_POST['editActorNext'])) {
    if(!empty($_POST['editActorName'])) {
        $actorName = $_POST['editActorName'];
        $actorExist = $db->prepare("SELECT * FROM actor WHERE name = ?");
        $actorExist->execute(array($actorName));
        $actorExistCount = $actorExist->rowCount();
        if($actorExistCount >= 1) {
            $valid = true;
            $actorData = $actorExist->fetch();
        } else {
            header('location: #errorModal');
            exit;
        }
    }
}
if(isset($_POST['editActorSubmit'])) {
    $actorName = $_POST['editname'];
    if(!empty($_POST['edittitle'])) {
        $upt = $db->prepare("UPDATE actor SET title = ? WHERE name = '{$actorName}'");
        $upt->execute(array($_POST['edittitle']));
    }
    if(!empty($_POST['editpp'])) {
        $upt = $db->prepare("UPDATE actor SET pp = ? WHERE name = '{$actorName}'");
        $upt->execute(array($_POST['editpp']));
    }
    header('location: #successModal');
    exit;
}
?>
<div id="editActorModal" class="modal">
    <div>
    <h1>Modification</h1>
        <form method="post" action="">
            <div class="inputs">
            <?php
            if(!$valid) {
            ?>
                <input type="text" placeholder="Nom de l'acteur" name="editActorName">
            <?php
            } else {
            ?>
                <input type="text" placeholder="name" name="editname" value="<?= $actorData['name'] ?>">
                <input type="text" placeholder="title" name="edittitle" value="<?= $actorData['title'] ?>">
                <input type="text" placeholder="pp" name="editpp" value="<?= $actorData['pp'] ?>">
            <?php
            }
            ?>
            </div>
            <div class="submit">
                <a href="">Annuler</a>
                <?php
                if(!$valid) {
                ?>
                    <input type="submit" value="Suivant" name="editActorNext">
                <?php
                } else {
                ?>
                    <input type="submit" value="Suivant" name="editActorSubmit">
                <?php
                }
                ?>
            </div>
        </form>
    </div>
</div>