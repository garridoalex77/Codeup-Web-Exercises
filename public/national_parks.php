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
    $stmt = $dbc->prepare("SELECT * FROM national_parks LIMIT {$data['pageLimit']} OFFSET {$data['offset']}");
    $stmt->execute();
    $data['parks'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $data['rowCount'] = $stmt->rowCount();
    if (is_string(Input::get('name')) && is_string(Input::get('location')) && is_string(Input::get('date_established')) && is_numeric(Input::get('area_in_acres'))) {
        $query = "INSERT INTO national_parks (name, location, date_established, area_in_acres, description) VALUES (:name, :location, :date_established, :area_in_acres, :description)";
        $stmt = $dbc->prepare($query);
        $stmt->execute(array(':name' => Input::get('name'), ':location' => Input::get('location'), ':date_established' => Input::get('date_established'), ':area_in_acres' => Input::get('area_in_acres'), ':description' => Input::get('description')));
    }
    var_dump($data['rowCount']);
    return $data;

}
extract(pageController($dbc));
?>
<!DOCTYPE html>
<html>
<head>
    <title>National Parks</title>
    <link href='https://fonts.googleapis.com/css?family=Paytone+One' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="CSS/parks.css">
</head>
<body>
<form method="GET" action="/national_parks.php">
    <button type="submit" name="offset" value=<?= $offset - $pageLimit ?>>Get Previous Parks</button>
    <?php if ($rowCount < 4): ?>
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
            <th>Description</th>
        </tr>
        <?php foreach ($parks as $park): ?>
        <tr>
            <td> <?=$park['name']?> </td>
            <td> <?=$park['location']?> </td>
            <td> <?=$park['date_established']?> </td>
            <td> <?=$park['area_in_acres']?> </td>
            <td> <?=$park['description']?> </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <h1> Add A New Park</h1>
    <form method="POST">
        <input type="text" required="required" name="name" placeholder="Name">
        <input type="text" required="required" name="location" placeholder="Location">
        <input type="text" required="required" name="date_established" placeholder="Date Established" >
        <input type="text" required="required" name="area_in_acres" placeholder="Area in Acres">
        <input type="text" required="required" name="description" placeholder="Description">
        <input type="submit">
    </form>

</body>
</html>