<?php
require_once '../parks_db_cred.php';
require_once '../db_connect.php';
function pageController($dbc) {
    $data = [];
    $stmt = $dbc->query('SELECT * FROM national_parks');
    $data['parks'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}
extract(pageController($dbc));
?>




<!DOCTYPE html>
<html>
<head>
    <title>National Parks</title>
</head>
<body>
    <h1>National Parks</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Location</th>
            <th>Date Established</th>
            <th>Acres</th>
        </tr>
        <?php foreach ($parks as $park) { ?>
        <tr>
            <?php foreach ($park as $title => $value) { ?>
            <td><?= $value ?></td>
            <?php };?>
        </tr>
        <?php }; ?>


    </table>

</body>
</html>