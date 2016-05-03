<?php 
function pageController() {
    require '../Auth.php';
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