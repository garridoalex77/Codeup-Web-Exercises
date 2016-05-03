<?php 
function pageController() {
    require '../Auth.php';
    session_start();
    if (Auth::check()) {
        Input::redirect("Location: authorized.php");
    }
    if (empty($_REQUEST)) {
        $status = "Login";
    } else {
        Auth::attempt(Input::get("name"), Input::get("password"));
        if (Auth::check()) {
            $status = "Login";
            Input::redirect("Location: authorized.php");
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