<!-- COPYRIGHT Hypera.-->
<?php
session_start();
$answer = $_SESSION["answer"];
$user_answer = $_POST["answer"];

if($answer == $user_answer) {
    header('location: ../../login?msg=success');
} else {
    header("location:".  $_SERVER['HTTP_REFERER']); 
}
?>
<!-- COPYRIGHT Hypera.-->