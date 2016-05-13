<?php
require_once '../parks_db_cred.php';
require_once '../db_connect.php';
require '../Input.php';
function pageController($dbc) {
    $data = [];
    $name = Input::get("name");
    $location = Input::get("location");
    $date = Input::get("date_established");
    $area = Input::get("area_in_acres");

    if (Input::has("offset") && Input::get("offset") < 0) {
        $data['offset'] = 0;
    } elseif (Input::has("offset")) {
        $data['offset'] = Input::get("offset");
    } else {
        $data['offset'] = 0;
    }
    $data['pageLimit'] = 4;
    $stmt = $dbc->query("SELECT * FROM national_parks LIMIT {$data['pageLimit']} OFFSET {$data['offset']}");
    $totalParks = $dbc->query("SELECT * FROM national_parks");
    $data['parks'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $data['totalparks'] = $totalParks->fetchAll(PDO::FETCH_ASSOC);
    $data['rowCount'] = $stmt->rowCount();
    // $data['addPark'] = "INSERT INTO national_parks (name, location, date_established,area_in_acres) VALUES ('{$name}', '{$location}', '{$date}', '{$area}')";
    // var_dump(count($data['totalparks']));
    $data['numParks'] = count($data['totalparks']);
    var_dump($data['offset']);
    var_dump($data['numParks']);
    return $data;
    //grab number of queries and check instead of 4

}
extract(pageController($dbc));
?>
<!DOCTYPE html>
<html>
<head>
    <title>National Parks</title>
    <link rel="stylesheet" href="CSS/parks.css">
</head>
<body>
<form method="GET" action="/national_parks.php">
    <button type="submit" name="offset" value=<?= $offset - $pageLimit ?>>Get Previous Parks</button>
    <?php if ($offset > $numParks - 4 || $offset == $numParks -4): ?>
        <button type="submit" name="offset" value=<?= $offset = 0 ?>>Go to Start</button>
    <?php else: ?>
        <button type="submit" name="offset" value=<?= $offset + $pageLimit ?>>Get More Parks</button>
    <?php endif ?>

    
</form>
    <h1>National Parks</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Location</th>
            <th>Date Established</th>
            <th>Acres</th>
        </tr>
        <?php foreach ($parks as $park): ?>
        <tr>
            <td> <?=$park['name']?> </td>
            <td> <?=$park['location']?> </td>
            <td> <?=$park['date_established']?> </td>
            <td> <?=$park['area_in_acres']?> </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <h1> Add A New Park</h1>
    <form method="POST">
        <label>Name</label>
        <input type="text" name="name">
        <label>Location</label>
        <input type="text" name="location">
        <label>Date Established</label>
        <input type="text" name="date">
        <label>Acres</label>
        <input type="text" name="area_in_acres">
        <input type="submit"><?php // $dbc->query($addPark); ?></input>
    </form>

</body>
</html>