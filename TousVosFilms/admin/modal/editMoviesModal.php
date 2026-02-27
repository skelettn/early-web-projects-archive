<?php
$valid = false;
if(isset($_POST['editMoviesNext'])) {
    if(!empty($_POST['editMovieName'])) {
        $movieName = $_POST['editMovieName'];
        $movieExist = $db->prepare("SELECT * FROM video WHERE name = ?");
        $movieExist->execute(array($movieName));
        $movieExistCount = $movieExist->rowCount();
        if($movieExistCount >= 1) {
            $valid = true;
            $movieData = $movieExist->fetch();
        } else {
            header('location: #errorModal');
            exit;
        }
    }
}
if(isset($_POST['editMovieSubmit'])) {
    $movieName = $_POST['editname'];
    if(!empty($_POST['editcover'])) {
        $upt = $db->prepare("UPDATE video SET cover = ? WHERE name = '{$movieName}'");
        $upt->execute(array($_POST['editcover']));
    }
    if(!empty($_POST['editbackground'])) {
        $upt = $db->prepare("UPDATE video SET background = ? WHERE name = '{$movieName}'");
        $upt->execute(array($_POST['editbackground']));
    }
    if(!empty($_POST['edittitle'])) {
        $upt = $db->prepare("UPDATE video SET title = ? WHERE name = '{$movieName}'");
        $upt->execute(array($_POST['edittitle']));
    }
    if(!empty($_POST['editdescription'])) {
        $upt = $db->prepare("UPDATE video SET description = ? WHERE name = '{$movieName}'");
        $upt->execute(array($_POST['editdescription']));
    }
    if(!empty($_POST['editstars'])) {
        $upt = $db->prepare("UPDATE video SET stars = ? WHERE name = '{$movieName}'");
        $upt->execute(array($_POST['editstars']));
    }
    if(!empty($_POST['editdate'])) {
        $upt = $db->prepare("UPDATE video SET date = ? WHERE name = '{$movieName}'");
        $upt->execute(array($_POST['editdate']));
    }
    if(!empty($_POST['edittype'])) {
        $upt = $db->prepare("UPDATE video SET type = ? WHERE name = '{$movieName}'");
        $upt->execute(array($_POST['edittype']));
    }
    if(!empty($_POST['editshowname'])) {
        $upt = $db->prepare("UPDATE video SET showname = ? WHERE name = '{$movieName}'");
        $upt->execute(array($_POST['editshowname']));
    }
    if(!empty($_POST['editnbseason'])) {
        $upt = $db->prepare("UPDATE video SET nbseason = ? WHERE name = '{$movieName}'");
        $upt->execute(array($_POST['editnbseason']));
    }
    if(!empty($_POST['editdirector'])) {
        $upt = $db->prepare("UPDATE video SET director = ? WHERE name = '{$movieName}'");
        $upt->execute(array($_POST['editdirector']));
    }
    if(!empty($_POST['editgenre'])) {
        $upt = $db->prepare("UPDATE video SET genre = ? WHERE name = '{$movieName}'");
        $upt->execute(array($_POST['editgenre']));
    }
    if(!empty($_POST['editcategory'])) {
        $upt = $db->prepare("UPDATE video SET category = ? WHERE name = '{$movieName}'");
        $upt->execute(array($_POST['editcategory']));
    }
    if(!empty($_POST['editcast'])) {
        $upt = $db->prepare("UPDATE video SET `cast` = ? WHERE name = '{$movieName}'");
        $upt->execute(array($_POST['editcast']));
    }
    if(!empty($_POST['editlink'])) {
        $upt = $db->prepare("UPDATE video SET link = ? WHERE name = '{$movieName}'");
        $upt->execute(array($_POST['editlink']));
    }
    header('location: #successModal');
    exit;
}
?>
<div id="editMoviesModal" class="modal">
    <div>
    <h1>Modification</h1>
        <form method="post" action="">
            <div class="inputs">
            <?php
            if(!$valid) {
            ?>
                <input type="text" placeholder="Nom du Film" name="editMovieName">
            <?php
            } else {
            ?>
                <input type="text" placeholder="name" name="editname" value="<?= $movieData['name'] ?>">
                <input type="text" placeholder="cover" name="editcover" value="<?= $movieData['cover'] ?>">
                <input type="text" placeholder="background" name="editbackground" value="<?= $movieData['background'] ?>">
                <input type="text" placeholder="title" name="edittitle" value="<?= $movieData['title'] ?>">
                <input type="text" placeholder="description" name="editdescription" value="<?= $movieData['description'] ?>">
                <input type="text" placeholder="stars" name="editstars" value="<?= $movieData['stars'] ?>">
                <input type="text" placeholder="date" name="editdate" value="<?= $movieData['date'] ?>">
                <input type="text" placeholder="type" name="edittype" value="<?= $movieData['type'] ?>">
                <input type="text" placeholder="showname" name="editshowname" value="<?= $movieData['showname'] ?>">
                <input type="text" placeholder="nbseason" name="editnbseason" value="<?= $movieData['nbseason'] ?>">
                <input type="text" placeholder="season" name="editseason" value="<?= $movieData['season'] ?>">
                <input type="text" placeholder="director" name="editdirector" value="<?= $movieData['director'] ?>">
                <input type="text" placeholder="genre" name="editgenre" value="<?= $movieData['genre'] ?>">
                <input type="text" placeholder="category" name="editcategory" value="<?= $movieData['category'] ?>">
                <input type="text" placeholder="cast" name="editcast" value="<?= $movieData['cast'] ?>">
                <input type="text" placeholder="link" name="editlink" value="<?= $movieData['link'] ?>">
            <?php
            }
            ?>
            </div>
            <div class="submit">
                <a href="">Annuler</a>
                <?php
                if(!$valid) {
                ?>
                    <input type="submit" value="Suivant" name="editMoviesNext">
                <?php
                } else {
                ?>
                    <input type="submit" value="Suivant" name="editMovieSubmit">
                <?php
                }
                ?>
            </div>
        </form>
    </div>
</div>