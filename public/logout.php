<?php 
function pageController() {
    require 'functions.php';
    session_start();
    session_unset();
    session_regenerate_id(true);
    header("Location: login.php");
    die();
}

extract(pageController());

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

</body>
</html>