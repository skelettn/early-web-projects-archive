<?php

$conn= mysqli_connect("DB_HOST", "DB_USER", "DB_PASS", "DB_NAME");
if(!$conn) {
    echo "Erreur DB";
    exit();
}

$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']=== 'on'? "https" : "http") . ".//" .$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

$arry_link = explode("l?", $link);
$req_exten = $arry_link['1'];
$qry_ex=mysqli_query($conn, "select `orig_url` from `firelinkurlshortner` where `unique_exten`='$req_exten'");
$res = mysqli_fetch_assoc($qry_ex);

header('location: '.$res['orig_url'].'');


?>
