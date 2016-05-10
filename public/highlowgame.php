<?php  
function pageController() {
    require '../Highlow.php';
    session_start();
    // var_dump($_SESSION);
    // var_dump($_REQUEST);
    if (!Input::has("low") && !Input::has("high")) {
        $message = "Choose a number range: ";
    } else {
        Highlow::getrange();
        Input::redirect("Location: highlowstart.php");
    }
    return ["message" => $message];
}
extract(pageController());

?>




<!DOCTYPE html>
<html>
<head>
    <title>HighLow</title>
</head>
<body>
    <h1> <?= $message ?> </h1>
    <form method="POST" action="">
    <label>Low</label>
    <input type="text" name="low"></input>
    <label>High</label>
    <input type="text" name="high"></input>
    <input type="submit"></input>

</body>
</html>