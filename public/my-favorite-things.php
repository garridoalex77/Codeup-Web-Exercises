<?php
function pageController() {
    $things = ["Basketball", "BBQ", "Movies", "Programming", "Soccer"];
    $i = 0;
    return [ "thing" => $things];
    
}
extract(pageController());
?>

<!DOCTYPE html>
<html>
<head>
<style>
    td {
        padding-right: 15px;
    }
    tr:nth-child(2n+1) {
        background-color: grey;
    }
</style>
    <title>My Favorite Things</title>
</head>
<body>
    <h1>My Favorite Things</h1>
    <table>
        <?php foreach ($thing as $value): ?>
        <tr>
            <td> <?= $value; ?> </td>
        </tr>
        <?php endforeach; ?>

    </table>

</body>
</html>