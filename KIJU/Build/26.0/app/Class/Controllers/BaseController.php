<?php

namespace KIJU\Controllers;

use KIJU\App;
use KIJU\Posts\Post;
use KIJU\Controllers\Components\PostController;
use KIJU\User\User;
use PDOException;

/**
 * Classe abstraite représentant la classe de Base du site
 *
 * Cette classe permet de réutiliser des fonctions dans les classes filles
 */
abstract class BaseController
{
    /**
     * Récupère le paramètre de navigation et renvoie la classe correspondante
     *
     * @param mixed $p
     * @return string 
     */
    public function isParamActive($p): string
    {
        return ($_GET['p'] == $p) ? "active" : '';
    }

    /**
     * Récupère l'icon svg passé en paramètre
     *
     * @param string $iconName Nom de l'icone
     * @param string $isActive Paramètre actif de la page
     * @return string  
     */
    function getSVG($iconName, $isActive = false)
    {
        $svgCodes = [
            'home' => [
                'active' => '<svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 -960 960 960" width="30"><path d="M160-200v-360q0-19 8.5-36t23.5-28l240-180q21-16 48-16t48 16l240 180q15 11 23.5 28t8.5 36v360q0 33-23.5 56.5T720-120H600q-17 0-28.5-11.5T560-160v-200q0-17-11.5-28.5T520-400h-80q-17 0-28.5 11.5T400-360v200q0 17-11.5 28.5T360-120H240q-33 0-56.5-23.5T160-200Z"/></svg>',
                'inactive' => '<svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 -960 960 960" width="30"><path d="M240-200h120v-200q0-17 11.5-28.5T400-440h160q17 0 28.5 11.5T600-400v200h120v-360L480-740 240-560v360Zm-80 0v-360q0-19 8.5-36t23.5-28l240-180q21-16 48-16t48 16l240 180q15 11 23.5 28t8.5 36v360q0 33-23.5 56.5T720-120H560q-17 0-28.5-11.5T520-160v-200h-80v200q0 17-11.5 28.5T400-120H240q-33 0-56.5-23.5T160-200Zm320-270Z"/></svg>'
            ],
            'communities' => [
                'active' => '<svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 -960 960 960" width="30"><path d="M40-272q0-34 17.5-62.5T104-378q62-31 126-46.5T360-440q66 0 130 15.5T616-378q29 15 46.5 43.5T680-272v32q0 33-23.5 56.5T600-160H120q-33 0-56.5-23.5T40-240v-32Zm698 112q11-18 16.5-38.5T760-240v-40q0-44-24.5-84.5T666-434q51 6 96 20.5t84 35.5q36 20 55 44.5t19 53.5v40q0 33-23.5 56.5T840-160H738ZM360-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47Zm400-160q0 66-47 113t-113 47q-11 0-28-2.5t-28-5.5q27-32 41.5-71t14.5-81q0-42-14.5-81T544-792q14-5 28-6.5t28-1.5q66 0 113 47t47 113Z"/></svg>',
                'inactive' => '<svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 -960 960 960" width="30"><path d="M40-272q0-34 17.5-62.5T104-378q62-31 126-46.5T360-440q66 0 130 15.5T616-378q29 15 46.5 43.5T680-272v32q0 33-23.5 56.5T600-160H120q-33 0-56.5-23.5T40-240v-32Zm800 112H738q11-18 16.5-38.5T760-240v-40q0-44-24.5-84.5T666-434q51 6 96 20.5t84 35.5q36 20 55 44.5t19 53.5v40q0 33-23.5 56.5T840-160ZM360-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47Zm400-160q0 66-47 113t-113 47q-11 0-28-2.5t-28-5.5q27-32 41.5-71t14.5-81q0-42-14.5-81T544-792q14-5 28-6.5t28-1.5q66 0 113 47t47 113ZM120-240h480v-32q0-11-5.5-20T580-306q-54-27-109-40.5T360-360q-56 0-111 13.5T140-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T440-640q0-33-23.5-56.5T360-720q-33 0-56.5 23.5T280-640q0 33 23.5 56.5T360-560Zm0 320Zm0-400Z"/></svg>'
            ],
            'discover' => [
                'active' => '<svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 -960 960 960" width="30"><path d="M480-440q-17 0-28.5-11.5T440-480q0-17 11.5-28.5T480-520q17 0 28.5 11.5T520-480q0 17-11.5 28.5T480-440Zm0 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0 0q-134 0-227-93t-93-227q0-134 93-227t227-93q134 0 227 93t93 227q0 134-93 227t-227 93Zm67-234q6-3 11-8t8-11l117-250q5-10-2.5-17.5T663-683L413-566q-6 3-11 8t-8 11L277-297q-5 10 2.5 17.5T297-277l250-117Z"/></svg>',
                'inactive' => '<svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 -960 960 960" width="30"><path d="M480-440q-17 0-28.5-11.5T440-480q0-17 11.5-28.5T480-520q17 0 28.5 11.5T520-480q0 17-11.5 28.5T480-440Zm0 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320ZM297-277l250-117q6-3 11-8t8-11l117-250q5-10-2.5-17.5T663-683L413-566q-6 3-11 8t-8 11L277-297q-5 10 2.5 17.5T297-277Z"/></svg>'
            ],
            'verified' => [
                'active' => '<svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 -960 960 960" width="30"><path d="m438-452-58-57q-11-11-27.5-11T324-508q-11 11-11 28t11 28l86 86q12 12 28 12t28-12l170-170q12-12 11.5-28T636-592q-12-12-28.5-12.5T579-593L438-452ZM326-90l-58-98-110-24q-15-3-24-15.5t-7-27.5l11-113-75-86q-10-11-10-26t10-26l75-86-11-113q-2-15 7-27.5t24-15.5l110-24 58-98q8-13 22-17.5t28 1.5l104 44 104-44q14-6 28-1.5t22 17.5l58 98 110 24q15 3 24 15.5t7 27.5l-11 113 75 86q10 11 10 26t-10 26l-75 86 11 113q2 15-7 27.5T802-212l-110 24-58 98q-8 13-22 17.5T584-74l-104-44-104 44q-14 6-28 1.5T326-90Z"/></svg>',
                'inactive' => '<svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 -960 960 960" width="30"><path d="M480-165q-17 0-33-7.5T419-194L113-560q-9-11-13.5-24T95-611q0-9 1.5-18.5T103-647l75-149q11-20 29.5-32t41.5-12h462q23 0 41.5 12t29.5 32l75 149q5 8 6.5 17.5T865-611q0 14-4.5 27T847-560L541-194q-12 14-28 21.5t-33 7.5Zm-95-475h190l-60-120h-70l-60 120Zm55 347v-267H218l222 267Zm80 0 222-267H520v267Zm144-347h106l-60-120H604l60 120Zm-474 0h106l60-120H250l-60 120Z"/></svg>'
            ],
            'user' => [
                'active' => '<svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 -960 960 960" width="30"><path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-240v-32q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v32q0 33-23.5 56.5T720-160H240q-33 0-56.5-23.5T160-240Z"/></svg>',
                'inactive' => '<svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 -960 960 960" width="30"><path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-240v-32q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v32q0 33-23.5 56.5T720-160H240q-33 0-56.5-23.5T160-240Zm80 0h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z"/></svg>'
            ],
            'settings' => [
                'active' => '<svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 -960 960 960" width="30"><path d="M405-80q-15 0-26-10t-13-25l-12-93q-13-5-24.5-12T307-235l-87 36q-14 6-28 1.5T170-215L96-344q-8-13-5-28t15-24l75-57q-1-7-1-13.5v-27q0-6.5 1-13.5l-75-57q-12-9-15-24t5-28l74-129q8-13 22-17.5t28 1.5l87 36q11-8 23-15t24-12l12-93q2-15 13-25t26-10h150q15 0 26 10t13 25l12 93q13 5 24.5 12t22.5 15l87-36q14-6 28-1.5t22 17.5l74 129q8 13 5 28t-15 24l-75 57q1 7 1 13.5v27q0 6.5-2 13.5l75 57q12 9 15 24t-5 28l-74 128q-8 13-22.5 18t-28.5-1l-85-36q-11 8-23 15t-24 12l-12 93q-2 15-13 25t-26 10H405Zm77-260q58 0 99-41t41-99q0-58-41-99t-99-41q-59 0-99.5 41T342-480q0 58 40.5 99t99.5 41Z"/></svg>',
                'inactive' => '<svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 -960 960 960" width="30"><path d="M405-80q-15 0-26-10t-13-25l-12-93q-13-5-24.5-12T307-235l-87 36q-14 6-28 1.5T170-215L96-344q-8-13-5-28t15-24l75-57q-1-7-1-13.5v-27q0-6.5 1-13.5l-75-57q-12-9-15-24t5-28l74-129q8-13 22-17.5t28 1.5l87 36q11-8 23-15t24-12l12-93q2-15 13-25t26-10h150q15 0 26 10t13 25l12 93q13 5 24.5 12t22.5 15l87-36q14-6 28-1.5t22 17.5l74 129q8 13 5 28t-15 24l-75 57q1 7 1 13.5v27q0 6.5-2 13.5l75 57q12 9 15 24t-5 28l-74 128q-8 13-22.5 18t-28.5-1l-85-36q-11 8-23 15t-24 12l-12 93q-2 15-13 25t-26 10H405Zm35-80h79l14-106q31-8 57.5-23.5T639-327l99 41 39-68-86-65q5-14 7-29.5t2-31.5q0-16-2-31.5t-7-29.5l86-65-39-68-99 42q-22-23-48.5-38.5T533-694l-13-106h-79l-14 106q-31 8-57.5 23.5T321-633l-99-41-39 68 86 64q-5 15-7 30t-2 32q0 16 2 31t7 30l-86 65 39 68 99-42q22 23 48.5 38.5T427-266l13 106Zm42-180q58 0 99-41t41-99q0-58-41-99t-99-41q-59 0-99.5 41T342-480q0 58 40.5 99t99.5 41Zm-2-140Z"/></svg>'
            ],
            'date' => [
                'active' => '<svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 -960 960 960" width="30"><path d="M580-240q-42 0-71-29t-29-71q0-42 29-71t71-29q42 0 71 29t29 71q0 42-29 71t-71 29ZM200-80q-33 0-56.5-23.5T120-160v-560q0-33 23.5-56.5T200-800h40v-40q0-17 11.5-28.5T280-880q17 0 28.5 11.5T320-840v40h320v-40q0-17 11.5-28.5T680-880q17 0 28.5 11.5T720-840v40h40q33 0 56.5 23.5T840-720v560q0 33-23.5 56.5T760-80H200Zm0-80h560v-400H200v400Z"/></svg>',
                'inactive' => '<svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 -960 960 960" width="30"><path d="M580-240q-42 0-71-29t-29-71q0-42 29-71t71-29q42 0 71 29t29 71q0 42-29 71t-71 29ZM200-80q-33 0-56.5-23.5T120-160v-560q0-33 23.5-56.5T200-800h40v-40q0-17 11.5-28.5T280-880q17 0 28.5 11.5T320-840v40h320v-40q0-17 11.5-28.5T680-880q17 0 28.5 11.5T720-840v40h40q33 0 56.5 23.5T840-720v560q0 33-23.5 56.5T760-80H200Zm0-80h560v-400H200v400Z"/></svg>'
            ],
            'warning' => [
                'inactive' => '<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M109-120q-11 0-20-5.5T75-140q-5-9-5.5-19.5T75-180l370-640q6-10 15.5-15t19.5-5q10 0 19.5 5t15.5 15l370 640q6 10 5.5 20.5T885-140q-5 9-14 14.5t-20 5.5H109Zm371-120q17 0 28.5-11.5T520-280q0-17-11.5-28.5T480-320q-17 0-28.5 11.5T440-280q0 17 11.5 28.5T480-240Zm0-120q17 0 28.5-11.5T520-400v-120q0-17-11.5-28.5T480-560q-17 0-28.5 11.5T440-520v120q0 17 11.5 28.5T480-360Z"/></svg>'
            ],
            'tag' => [
                'inactive' => '<svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 -960 960 960" width="30"><path d="m360-320-33 131q-3 13-13 21t-24 8q-19 0-31-15t-7-33l28-112H171q-20 0-32-15.5t-7-34.5q3-14 14-22t25-8h129l40-160H231q-20 0-32-15.5t-7-34.5q3-14 14-22t25-8h129l33-131q3-13 13-21t24-8q19 0 31 15t7 33l-28 112h160l33-131q3-13 13-21t24-8q19 0 31 15t7 33l-28 112h109q20 0 32 15.5t7 34.5q-3 14-14 22t-25 8H660l-40 160h109q20 0 32 15.5t7 34.5q-3 14-14 22t-25 8H600l-33 131q-3 13-13 21t-24 8q-19 0-31-15t-7-33l28-112H360Zm20-80h160l40-160H420l-40 160Z"/></svg>'
            ],
            'search' => [
                'inactive' => '<svg xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 -960 960 960" width="30"><path d="M380-320q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l224 224q11 11 11 28t-11 28q-11 11-28 11t-28-11L532-372q-30 24-69 38t-83 14Zm0-80q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/></svg>'
            ]
        ];

        $state = $isActive ? 'active' : 'inactive';
        return $svgCodes[$iconName][$state] ?? '';
    }

    /**
     * Récupère les publications de la page principale
     *
     * @param string $request Requête SQL à éxécuter
     * @param array $params Paramètres de la requête
     * @return array
     */
    public function getLatestPosts($request, $params): array
    {
        $getPosts = App::getDatabase()->executeQuery($request, $params);
        $posts = $getPosts->fetchAll();

        $postsArray = array_map(function ($post) {
            return new Post($post['PostID']);
        }, $posts);

        return $postsArray;
    }

    /**
     * Récupère les nouvelles publications après avoir touché le bas de la page
     * 
     * @param string $request Requête SQL à éxécuter
     * @param array $params Paramètres de la requête
     * @param mixed $lastpostID Identificant de la dernière publication affiché
     * @return array
     */
    public function loadMorePosts($request, $params, $lastPostID): string
    {
        $getPostID = App::getDatabase()->executeQuery('SELECT PostID FROM post WHERE PostUniqueID = ?', [$lastPostID]);
        $postID = $getPostID->fetchColumn();

        $allParams = array_merge($params, [$postID]);

        $getMorePosts = App::getDatabase()->executeQuery($request, $allParams);
        $morePosts = $getMorePosts->fetchAll();

        $postsHTML = '';

        $postsArray = array_map(function ($post) {
            return new Post(
                $post['PostID']
            );
        }, $morePosts);


        foreach ($postsArray as $post) {
            ob_start();
            require($_SERVER['DOCUMENT_ROOT'] . App::$base_version . '/pages/templates/components/post.php');
            $postsHTML .= ob_get_clean();
        }

        return $postsHTML;
    }

    /**
     * Vérifie si une action de publication existe
     *
     * @return void
     */
    public function verifyPostAction(): void
    {
        if (App::isLogged()) {
            $this->verifyLike();
            $this->verifyRepost();
        }
    }

    /**
     * Vérifie si l'utilisateur à aimer la publication
     *
     * @return void
     */
    public function verifyLike(): void
    {
        if ($_POST['action'] === 'like') {
            $postController = new PostController(htmlentities($_POST['postid']));
            if ($_POST['isLiked'] === 'true') {
                $postController->deleteLike();
                $response = array('success' => false);
            } else {
                if (!$postController->isAlreadyLiked()) {
                    $postController->addLike();
                    $response = array('success' => true);
                }
            }

            echo json_encode($response);
            exit;
        }
    }

    /**
     * Vérifie si l'utilisateur à republié la publication
     *
     * @return void
     */
    public function verifyRepost()
    {
        if ($_POST['action'] === 'repost') {
            $postController = new PostController(htmlspecialchars($_POST['postid']));
            if ($_POST['isReposted'] === 'true') {
                $postController->deleteRepost();
                $response = array('success' => false);
            } else {
                if (!$postController->isAlreadyReposted()) {
                    $postController->addRepost();
                    $response = array('success' => true);
                }
            }

            echo json_encode($response);
            exit;
        }
    }

    /**
     * Créer un identifiant de média unique
     *
     * @return string
     */
    public function createMediaID(): string
    {
        $uniqueID = uniqid('', true);
        $randomString = md5(uniqid(rand(), true));
        $combinedString = $uniqueID . $randomString;

        $uniqueID = substr($combinedString, 0, 25);

        return $uniqueID;
    }

    /**
     * Créer un identifiant de publication unique
     *
     * @return string
     */
    public function createPostUniqueID(): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charLength = strlen($characters);
        $uniqueID = '';

        for ($i = 0; $i < 20; $i++) {
            $randomIndex = mt_rand(0, $charLength - 1);
            $uniqueID .= $characters[$randomIndex];
        }

        return $uniqueID;
    }

    /**
     * Récupère les hashtags les plus utilisés récemment
     *
     * @return array
     */
    public function getHashtags()
    {
        $query = "
        SELECT 
            SUBSTRING_INDEX(SUBSTRING_INDEX(Content, '#', -1), ' ', 1) AS hashtag,
            COUNT(*) AS count
        FROM 
            post
        WHERE 
            Content LIKE '%#%'
            AND CreationDate >= DATE_SUB(NOW(), INTERVAL 7 DAY)
        GROUP BY 
            hashtag
        ORDER BY 
            count DESC
        LIMIT 
            10;
        ";

        $getHashtags = App::getDatabase()->executeQuery($query, []);
        try {
            $getHashtags->execute();
            $hashtags = $getHashtags->fetchAll();
            return $hashtags;
        } catch (PDOException $e) {

            echo "Erreur d'exécution de la requête : " . $e->getMessage();
            return false;
        }
    }

    /**
     * Récupère les utilisateurs d'une communauté à afficher
     *
     * @param int $communityID Identifiant de la communauté
     * @return array
     */
    public function getCommunitiesMembers($communityID): array
    {
        $getData = App::getDatabase()->executeQuery('SELECT * FROM user WHERE UserID IN (SELECT CommunityUserID FROM community_member WHERE CommunityID = ?) ORDER BY RAND() LIMIT 4', [$communityID]);

        $users = $getData->fetchAll();
        $usersArray = array_map(function ($user) {
            return new User($user['UserID']);
        }, $users);

        return $usersArray;
    }


    /**
     * Récupère l'identifiant de l'utilisateur
     *
     * @return int
     */
    public function getUserId(): int
    {
        return App::getUser()->getId();
    }

    /**
     * Récupère le nom d'utilisateur de l'utilisateur
     *
     * @return string
     */
    public function getUsername(): string
    {
        return App::getUser()->getUsername();
    }

    /**
     * Récupère la photo de profil de l'utilisateur
     *
     * @return string
     */
    public function getProfilePicture(): string
    {
        return App::getUser()->getProfilePicture();
    }
}
