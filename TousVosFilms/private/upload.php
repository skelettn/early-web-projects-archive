<?php
require('../core/functions.php');
if(isset($_POST['send'])) {
    $req = $db->prepare("INSERT INTO video (
        `name`,
        `cover`,
        `background`,
        `title`,
        `description`,
        `stars`,
        `date`,
        `type`,
        `showname`,
        `nbseason`,
        `season`,
        `director`,
        `genre`,
        `category`,
        `cast`,
        `link`
    ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $req->execute(array(
        $_POST['name'],
        $_POST['cover'],
        $_POST['background'],
        $_POST['title'],
        $_POST['description'],
        $_POST['stars'],
        $_POST['date'],
        $_POST['type'],
        $_POST['showname'],
        $_POST['nbseason'],
        $_POST['season'],
        $_POST['director'],
        $_POST['genre'],
        $_POST['category'],
        $_POST['cast'],
        $_POST['link']
    ));
}
?>
<form action="" method="post">
<input type="text" placeholder="name" value="malcolm-saison-1-episode-" name="name">
<input type="text" placeholder="cover" name="cover" value="https://flxt.tmsimg.com/assets/p7896127_b_v8_aa.jpg">
<input type="text" placeholder="background" name="background" value="https://prod-ripcut-delivery.disney-plus.net/v1/variant/disney/F5344A9A8B3888F53C48892CBB91676331EBCC67D731BF21E5F27EAE6A8F2A39/scale?width=2880&aspectRatio=1.78&format=jpeg">
<input type="text" placeholder="title" name="title" value="Malcolm S1:EP">
<input type="text" placeholder="description" name="description" value="">
<input type="text" placeholder="stars" name="stars" value="9.5">
<input type="text" placeholder="date" name="date" value="2000">
<input type="text" placeholder="type" name="type" value="show">
<input type="text" placeholder="showname" name="showname" value="malcolm">
<input type="text" placeholder="nbseason" name="nbseason" value="6">
<input type="text" placeholder="season" name="season" value="1">
<input type="text" placeholder="director" name="director" value="Linwood Boomer">
<input type="text" placeholder="genre" name="genre" value="Sitcom, Comédie">
<input type="text" placeholder="category" name="category" value="comedie">
<input type="text" placeholder="cast" name="cast" value="bryan-cranston jane-kaczmarek frankie-muniz">
<input type="text" placeholder="link" name="link" value="">
<input type="submit" value="Envoyer" name="send">
</form>