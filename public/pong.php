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
    <title>PONG</title>
    <link rel="stylesheet" href="/CSS/pingpong.css">
</head>
<body>
<h1>PONG <?= escape($count) ?> </h1>
<div id="upper">
    <a href="ping.php?count=0" class="moveIt">MISS</a>
</div>

<div id="ball"></div>

<div id="lower">
    <a href="ping.php?count=<?= escape($count) + 1 ?>" class="moveIt">HIT</a>
</div>

</body>
</html>