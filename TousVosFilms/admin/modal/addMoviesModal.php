<?php
$valid = false;
if(isset($_POST['addMoviesNext'])) {
    if(!empty($_POST['select-type'])) {
        $type = $_POST['select-type'];
        $valid = true;
    }
}
?>
<div id="addMoviesModal" class="modal">
    <div>
    <h1>Création</h1>
        <form method="post" action="">
            <div class="inputs">
                <?php
                if(!$valid) {
                ?>
                    <select name="select-type" id="">
                        <option value="">- Sélectionner le type -</option>
                        <option value="movie">Film</option>
                        <option value="show-dis" disabled>Série</option>
                        <option value="show">Épisode de série</option>
                    </select>
                <?php
                } else {
                ?>
                    <input type="text" placeholder="name" name="name">
                    <input type="text" placeholder="cover" name="cover">
                    <input type="text" placeholder="background" name="background">
                    <input type="text" placeholder="title" name="title">
                    <input type="text" placeholder="description" name="description">
                    <input type="text" placeholder="stars" name="stars">
                    <input type="text" placeholder="date" name="date">
                    <input type="text" placeholder="type" name="type" value="<?= $type ?>">
                    <input type="text" placeholder="showname" name="showname">
                    <input type="text" placeholder="nbseason" name="nbseason">
                    <input type="text" placeholder="season" name="season">
                    <input type="text" placeholder="director" name="director">
                    <input type="text" placeholder="genre" name="genre">
                    <input type="text" placeholder="category" name="category">
                    <input type="text" placeholder="cast" name="cast">
                    <input type="text" placeholder="link" name="link">
                <?php
                }
                ?>
            </div>
            <div class="submit">
                <a href="">Annuler</a>
                <?php
                if(!$valid) {
                ?>
                    <input type="submit" value="Suivant" name="addMoviesNext">
                <?php
                } else {
                ?>
                    <input type="submit" value="Suivant" name="addMoviesSubmit">
                <?php
                }
                ?>
            </div>
        </form>
    </div>
</div>