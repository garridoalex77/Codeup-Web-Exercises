<?php
function pageController() {
    if (!isset($_GET['count'])) {
        $count = 0;
    } else {
        $count = $_GET['count'];
    }
    return ['count' => $count];
}

extract(pageController());

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<h1>Count:<?= $count ?> </h1>
<a href="?count=<?= $count+ 1 ?>">Up</a>
<a href="?count=<?= $count- 1 ?>">Down</a>

</body>
</html>