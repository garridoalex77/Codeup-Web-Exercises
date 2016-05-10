<?php
function pageController() {
    require '../Highlow.php';
    session_start();
    $lowNum = Highlow::getNumber("low");
    $highNum = Highlow::getNumber("high");
    if (Input::has("guess")) {
        Highlow::checkGuess();
    }
    // var_dump($_SESSION);
    // var_dump($_REQUEST);
    return ["lowNum" => $lowNum, "highNum" => $highNum];
}
extract(pageController());
?>

<!DOCTYPE html>
<html>
<head>
    <title>Highlow</title>
</head>
<body>
    <h1>Take a guess between <?= $lowNum ?> and <?= $highNum ?>. </h1>
    <form method="POST" action="">
        <label>Guess</label>
        <input type="text" name="guess"></input>
        <input type="submit"></input>
        <div>
            <a href="highlowgame.php">Start over</a>
        </div>

</body>
</html>