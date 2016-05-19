<?php
require_once '../parks_db_cred.php';
require_once '../db_connect.php';
require '../Input.php';
function pageController($dbc) {
    $data = [];
    
    if (Input::has("offset") && Input::getNumber("offset") < 0) {
        $data['offset'] = 0;
    } elseif (Input::has("offset")) {
        $data['offset'] = Input::getNumber("offset");
    } else {
        $data['offset'] = 0;
    }
    $data['pageLimit'] = 4;
    $stmt = $dbc->prepare("SELECT * FROM national_parks LIMIT {$data['pageLimit']} OFFSET {$data['offset']}");
    $stmt->execute();
    $data['parks'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $total = $dbc->prepare("SELECT * FROM national_parks");
    $total->execute();
    $data['total'] = count($total->fetchAll(PDO::FETCH_ASSOC));

    if (!empty($_POST)) {
        $name = Input::getString("name");
        $location = Input::getString("location");
        $date = Input::getString("date_established");
        $area = Input::getNumber("area_in_acres");
        $description = Input::getString("description");
        $query = "INSERT INTO national_parks (
            name,
            location,
            date_established,
            area_in_acres,
            description) 
            VALUES (
            :name,
            :location,
            :date_established,
            :area_in_acres,
            :description)";
        $stmt = $dbc->prepare($query);
        $stmt->execute(array(
            ':name' => $name,
            ':location' => $location,
            ':date_established' => $date,
            ':area_in_acres' => $area,
            ':description' => $description));
        header("Refresh:0");
    }
    return $data;

}
extract(pageController($dbc));
?>
<!DOCTYPE html>
<html>
<head>
    <title>National Parks</title>
    <link href='https://fonts.googleapis.com/css?family=Paytone+One' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
    <link href='https://fonts.googleapis.com/css?family=Paytone+One' rel='stylesheet' type='text/css'>
    <script src="https://code.jquery.com/jquery-2.2.2.min.js" integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
    <link rel="stylesheet" href="CSS/parks.css">
</head>
<body>
<div class="container">
    <div class="row"> 
        <div class="col s6">
            <h1>National Parks</h1>
        </div>        
        <div class="col s6">
            <img src="/IMG/mountains.jpg">
            <footer>Glacier National Park</footer>
        </div>
    </div>
    <div class="row">
    <?php foreach ($parks as $park): ?>
        <div class="card small col s6">
        <!-- add image for form input and check if image -->
            <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="/IMG/<?=$park['name']?>.jpg">
            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4"><?=Input::escape($park['name'])?><i class="material-icons right">More Info</i></span>
            </div>
            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4"><?=Input::escape($park['name'])?><i class="material-icons right">X</i></span>
                <p>Location: <?=Input::escape($park['location'])?> </p>
                <p>Date Established:  <?=Input::escape($park['date_established'])?> </p>
                <p>Area in Acres: <?=Input::escape($park['area_in_acres'])?> </p>
                <p>Description: <?=Input::escape($park['description'])?> </p>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
    <form method="GET" action="/national_parks.php">
    <button type="submit" class="btn waves-effect waves-light" name="offset" value=<?= $offset - $pageLimit ?>>Previous Parks</button>
    <?php if ($offset > $total - 4 || $offset == $total -4): ?>
        <button type="submit" class=" rightFloat btn waves-effect waves-light" name="offset" value=<?= $offset = 0 ?>>Go to Start</button>
    <?php else: ?>
        <button type="submit" class=" rightFloat btn waves-effect waves-light" name="offset" value=<?= $offset + $pageLimit ?>>More Parks</button>
    <?php endif ?>
    </form>
    <h1> Add A New Park</h1>
    <form method="POST">
        <input type="text" required="required" name="name" placeholder="Name">
        <input type="text" required="required" name="location" placeholder="Location">
        <input type="text" required="required" name="date_established" placeholder="Date Established" >
        <input type="text" required="required" name="area_in_acres" placeholder="Area in Acres">
        <input type="text" required="required" name="description" placeholder="Description">
        <input class="btn waves-effect waves-light" type="submit">
    </form>
</div>

</body>
</html>