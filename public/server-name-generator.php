<?php

function pageController() {
    require_once '../Generate.php';
    return ["randomColor" => Generate::getColor(), "randomName" => Generate::generatingNames()];
}

extract(pageController());
?>
<!DOCTYPE html>
<html> 
<head>
<style>
    body {
        background-color: <?= $randomColor ?>;
    }
    h1 {
        margin-top: 150px;
        text-align: center;
        font-size: 3em;
        color: orchid;
    }
</style>
</head>
<body>
<h1><?= $randomName ?></h1>

</body>