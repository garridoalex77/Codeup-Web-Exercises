<?php

function pageController() {
    require_once '../Generate.php';
    return ["randomColor" => Generate::getColor(), "randomName" => Generate::generatingNames()];
}
extract(pageController());
echo $randomName.PHP_EOL;
