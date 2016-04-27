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
var_dump(extract(pageController()));

?>

<!DOCTYPE html>
<html>
<head>
    <title>PING</title>
    <link rel="stylesheet" href="/CSS/pingpong.css">
</head>
<body>
<h1>PING <?= $count ?> </h1>
<div id="upper">
    <a href="pong.php?count=<?= $count + 1 ?>" class="moveIt">HIT</a>
</div>
<div id="ball"></div>
<div id="lower">
    <a href="pong.php?count=0" class="moveIt">MISS</a>
</div>

</body>
</html>