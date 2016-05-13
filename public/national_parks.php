<?php
require_once '../parks_db_cred.php';
require_once '../db_connect.php';
function pageController($dbc) {
    $data = [];
    if (isset($_GET['offset']) && $_GET['offset'] < 0) {
        $data['offset'] = 0;
    } elseif (isset($_GET['offset'])) {
        $data['offset'] = $_GET['offset'];
    } else {
        $data['offset'] = 0;
    }
    $stmt = $dbc->query("SELECT * FROM national_parks LIMIT 4 OFFSET {$data['offset']}");
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
<form method="GET" action="/national_parks.php">
    <button type="submit" name="offset" value=<?= $offset - 4 ?>>Get Previous Park</button>
    <button type="submit" name="offset" value=<?= $offset + 4 ?>>Get Next Park</button>
</form>
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
            <?php foreach ($park as $value) { ?>
            <td><?= $value ?></td>
            <?php };?>
        </tr>
        <?php }; ?>


    </table>

</body>
</html>