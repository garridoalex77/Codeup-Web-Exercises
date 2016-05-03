<?php 
function pageController() {
    require '../Auth.php';
    session_start();
    Auth::logout();
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