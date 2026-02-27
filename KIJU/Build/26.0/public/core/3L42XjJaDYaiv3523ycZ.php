<?php
require_once('../../app/Class/App.php');

use KIJU\App;

$app = new App();
$app->initProperties();

// Création d'un nouveau PDO
$pdo = new PDO('mysql:dbname=' . $app::$DB_NAME . ';host=' . $app::$DB_HOST, $app::$DB_USER, $app::$DB_PASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_POST['input'])) {
    $input = htmlentities($_POST['input']);
    getUsers($input);
    getCommunities($input);
    getPost($input);
}

/**
 * Récupère les utilisateurs en fonction de la recherche
 *
 * @param string $input Recherche de l'utilisateur
 * @return void
 */
function getUsers($input): void
{
    global $pdo;
    $getUsers = $pdo->prepare("SELECT * FROM user WHERE Name LIKE :input LIMIT 10");
    $getUsers->execute(['input' => $input . '%']);
    $users = $getUsers->fetchAll();

    foreach ($users as $user) {
?>
        <a href="/user/<?= $user['Username'] ?>">
            <div class="result user">
                <div class="image">
                    <img src="<?= $user['ProfilePicture'] ?>" alt="<?= $user['Username'] ?>">
                </div>
                <div class="data">
                    <span class="name"><?= $user['Name'] ?></span>
                    <span class="username">@<?= $user['Username'] ?></span>
                </div>
            </div>
        </a>
    <?php
    }
}

/**
 * Récupère les communautés en fonction de la recherche
 *
 * @param string $input Recherche de l'utilisateur
 * @return void
 */
function getCommunities($input): void
{
    global $pdo;
    $getCommunities = $pdo->prepare("SELECT * FROM community WHERE Name LIKE :input LIMIT 10");
    $getCommunities->execute(['input' => $input . '%']);
    $communities = $getCommunities->fetchAll();

    foreach ($communities as $community) {
    ?>
        <a href="/c/<?= $community['CommunityUID'] ?>">
            <div class="result user">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 -960 960 960" width="30">
                        <path d="M40-272q0-34 17.5-62.5T104-378q62-31 126-46.5T360-440q66 0 130 15.5T616-378q29 15 46.5 43.5T680-272v32q0 33-23.5 56.5T600-160H120q-33 0-56.5-23.5T40-240v-32Zm800 112H738q11-18 16.5-38.5T760-240v-40q0-44-24.5-84.5T666-434q51 6 96 20.5t84 35.5q36 20 55 44.5t19 53.5v40q0 33-23.5 56.5T840-160ZM360-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47Zm400-160q0 66-47 113t-113 47q-11 0-28-2.5t-28-5.5q27-32 41.5-71t14.5-81q0-42-14.5-81T544-792q14-5 28-6.5t28-1.5q66 0 113 47t47 113ZM120-240h480v-32q0-11-5.5-20T580-306q-54-27-109-40.5T360-360q-56 0-111 13.5T140-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T440-640q0-33-23.5-56.5T360-720q-33 0-56.5 23.5T280-640q0 33 23.5 56.5T360-560Zm0 320Zm0-400Z" />
                    </svg>
                </div>
                <div class="data">
                    <span class="name"><?= $community['Name'] ?></span>
                    <span class="username">c/<?= $community['CommunityUID'] ?></span>
                </div>
            </div>
        </a>
    <?php
    }
}

/**
 * Récupère le texte en fonction de la recherche
 *
 * @param string $input Recherche de l'utilisateur
 * @return void
 */
function getPost($input): void
{
    ?>
    <a href="/search/posts/<?= $input ?>">
        <div class="result hashtag">
            <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 -960 960 960" width="30">
                    <path d="M380-320q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l224 224q11 11 11 28t-11 28q-11 11-28 11t-28-11L532-372q-30 24-69 38t-83 14Zm0-80q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z" />
                </svg>
            </div>
            <div class="data">
                <span class="name">Rechercher <?= $input ?></span>
            </div>
        </div>
    </a>
<?php
}
