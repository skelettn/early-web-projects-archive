<?php
function checkLevel() {
    global $userData;
    if(isset($_COOKIE['id'])) {
        if($userData['level'] < 3) {
            header("location: ../auth?continue=admin/");
            exit;
        }
    } else {
        header("location: ../auth?continue=admin/");
        exit;
    }
}

function getLevel() {
    global $userData;
    return $userData['level'];
}

function nbMovies() {
    global $db;
    global $nbMovies;
    $req = $db->prepare("SELECT * FROM video");
    $req->execute();
    $nbMovies = $req->rowCount();
    echo $nbMovies;
}

function reqMovies() {
    global $db;
    global $mvData;
    $req = $db->prepare("SELECT * FROM video");
    $req->execute();
    $mvData = $req->fetchAll();
    foreach ($mvData as $data) {
    ?>
    <tr>
        <td><?= $data['name'] ?></td>
        <td><?= $data['title'] ?></td>
        <td><?= $data['link'] ?></td>
    </tr>
    <?php
    }
}

function reqCast() {
    global $db;
    global $mvData;
    $req = $db->prepare("SELECT * FROM actor");
    $req->execute();
    $mvData = $req->fetchAll();
    foreach ($mvData as $data) {
    ?>
    <tr>
        <td><?= $data['name'] ?></td>
        <td><?= $data['title'] ?></td>
        <td><?= $data['pp'] ?></td>
    </tr>
    <?php
    }
}

function reqUsers() {
    global $db;
    global $data;
    global $nbUsers;
    $req = $db->prepare("SELECT * FROM users");
    $req->execute();
    $data = $req->fetchAll();
    $nbUsers = $req->rowCount();
    foreach ($data as $dt) {
    ?>
    <tr>
        <td><?= $dt['username'] ?></td>
        <td><?= $dt['email'] ?></td>
        <td><?= $dt['tvf_plus'] ?></td>
        <td><?= $dt['level'] ?></td>
        <td><a href="#editUser#<?= $dt['unique_id'] ?>" class="edit"><ion-icon name="create-outline"></ion-icon></a></td>
    </tr>
    <div id="editUser#<?= $dt['unique_id'] ?>" class="modal">
        <div>
            <h1><?= $dt['username'] ?></h1>
            <form method="post" action="">
                <div class="inputs">
                    <input type="text" placeholder="Nom d'utilisateur" name="username" value="<?= $dt['username'] ?>">
                    <input type="text" placeholder="Email" name="email" value="<?= $dt['email'] ?>">
                    <input type="text" placeholder="TVF Plus" name="tvf_plus" value="<?= $dt['tvf_plus'] ?>">
                    <input type="text" placeholder="Permissions" name="level" value="<?= $dt['level'] ?>">
                </div>
                <div class="submit">
                    <a href="">Annuler</a>
                    <input type="submit" value="Enregistrer" name="editUser#<?= $dt['unique_id'] ?>Save">
                </div>
            </form>
        </div>
    </div>
    <?php
    }
}

function insertMovie($name,$cover,$background,$title,$description,$stars,$date,$type,$showname,$nbseason,$season,$director,$genre,$category,$cast,$link) {
    global $db;
    $name = trim($name);
    $nameExist = $db->prepare("SELECT * FROM video WHERE name = ?");
    $nameExist->execute(array($name));
    $nExist = $nameExist->rowCount();
    if($nExist < 1) {
        $req = $db->prepare("INSERT INTO video
            (name,
            cover,
            background,
            title,
            description,
            stars,
            date,
            type,
            showname,
            nbseason,
            season,
            director,
            genre,
            category,
            cast,
            link) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)
        ");
        $req->execute(array($name,$cover,$background,$title,$description,$stars,$date,$type,$showname,$nbseason,$season,$director,$genre,$category,$cast,$link));
        header('location: #successModal');
        exit;
    } else {
        header('location: #errorModal');
        exit;
    }
}

function insertActor($name,$title,$pp) {
    global $db;
    $name = trim($name);
    $nameExist = $db->prepare("SELECT * FROM actor WHERE name = ?");
    $nameExist->execute(array($name));
    $nExist = $nameExist->rowCount();
    if($nExist < 1) {
        $req = $db->prepare("INSERT INTO actor
            (name,
            title,
            pp) VALUES (?,?,?)
        ");
        $req->execute(array($name,$title,$pp));
        header('location: #successModal');
        exit;
    } else {
        header('location: #errorModal');
        exit;
    }
}
?>