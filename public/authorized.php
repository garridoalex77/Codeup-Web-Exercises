<?php
function pageController() {
    require '../Auth.php';
    session_start();
    if (Input::has("logged_in_usr")) {
        Input::redirect("Location: login.php");
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