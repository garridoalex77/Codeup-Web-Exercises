<?php


function pageController() {
    $adjectives = ["Spotty", "Whispering", "Lazy", "Cuddly", "Relieved", "Jittery", "Confused", "Grumpy", "Shaggy", "Elated"];
    $nouns = ["Unicorn", "Chair", "Cat", "Toaster", "Sandwich", "Frog", "Apple", "Princess", "Train", "Fish"];
    $colors = ["AliceBlue", "Charteuse", "CadetBlue", "Crimson", "Cyan", "Darkgreen", "DeepSkyBlue", "Gold", "Indigo", "Tomato"];
    $randomColor = mt_rand(0, 9);
    $length1 = count($adjectives) - 1;
    $length2 = count($nouns) - 1;
    $firstRand = mt_rand(0, $length1);
    $secondRand = mt_rand(0, $length2);
    return [
        "randomName" => "{$adjectives[$firstRand]} {$nouns[$secondRand]}\n",
        "randomColor" => "{$colors[$randomColor]}"
    ];
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