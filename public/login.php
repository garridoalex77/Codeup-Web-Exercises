<?php 
function pageController() {
    require 'functions.php';
    session_start();
    if (inputHas("logged_in_usr")) {
        redirect("Location: authorized.php");
    }
    if (empty($_REQUEST)) {
        $status = "Login";
    } else {
        if (inputGet("name") == "guest" && inputGet("password") == "password") {
            $_SESSION["logged_in_usr"] = inputGet("name");
            $status = "Login";
            redirect("Location: authorized.php");
        } else {
            $status = "Login FAIL";
        }
    }
    return ["status" => $status];
}


extract(pageController());
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <h1> <?= $status ?> </h1>
    <form method="POST" action="">
        <label>Username</label>
        <input type="text" name="name"></input>
        <label>Password</label>
        <input type="password" name="password"></input>
        <input type="submit"></input>
    </form>

</body>
</html>