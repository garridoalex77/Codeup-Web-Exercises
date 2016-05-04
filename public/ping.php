<?php
require_once '../input.php';
require 'functions.php';
function pageController() {
    $count = Input::get('count', 0);
    return ['count' => $count];
}

extract(pageController());

?>

<!DOCTYPE html>
<html>
<head>
    <title>PING</title>
    <link rel="stylesheet" href="/CSS/pingpong.css">
</head>
<body>
<h1>PING <?= escape($count) ?> </h1>
<div id="upper">
    <a href="pong.php?count=<?= escape($count) + 1 ?>" class="moveIt">HIT</a>
</div>
<div id="ball"></div>
<div id="lower">
    <a href="pong.php?count=0" class="moveIt">MISS</a>
</div>

</body>
</html>