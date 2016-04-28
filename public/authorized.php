<?php
function pageController() {
    require 'functions.php';
    session_start();
    if (inputHas("logged_in_usr")) {
        redirect("Location: login.php");
    } else {
        $hello = "Hello" . " " . $_SESSION["logged_in_usr"];
    }
    return ["hello" => $hello];
}
extract(pageController());

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <h1> <?= $hello; ?></h1>
    <a href="logout.php">Logout</a>
</body>
</html>