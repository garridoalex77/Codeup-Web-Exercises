<?php 
function pageController() {
    if (empty($_POST)) {
        $status = "Login";
    } else {
        if ($_POST["name"] == "guest" && $_POST["password"] == "password") {
            header("Location: authorized.php");
            die();
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