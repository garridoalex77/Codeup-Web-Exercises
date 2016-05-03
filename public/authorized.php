<?php
function pageController() {
    require '../Auth.php';
    session_start();
    if (!Auth::check()) {
        Input::redirect("Location: login.php");
    } else {
        $hello = "Hello" . " " . Auth::user();
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