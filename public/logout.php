<?php 
function pageController() {
    require '../Auth.php';
    session_start();
    Auth::logout();
    header("Location: login.php");
    die();
}

extract(pageController());

?>
