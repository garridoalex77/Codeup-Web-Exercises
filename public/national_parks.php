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
    $total = $dbc->prepare("SELECT * FROM national_parks");
    $total->execute();
    $data['total'] = count($total->fetchAll(PDO::FETCH_ASSOC));

    if (is_string(Input::get('name')) && is_string(Input::get('location')) && is_string(Input::get('date_established')) && is_numeric(Input::get('area_in_acres'))) {
        $query = "INSERT INTO national_parks (name, location, date_established, area_in_acres, description) VALUES (:name, :location, :date_established, :area_in_acres, :description)";
        $stmt = $dbc->prepare($query);
        $stmt->execute(array(':name' => Input::get('name'), ':location' => Input::get('location'), ':date_established' => Input::get('date_established'), ':area_in_acres' => Input::get('area_in_acres'), ':description' => Input::get('description')));
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
            

<form method="GET" action="/national_parks.php">
    <button type="submit" class="btn waves-effect waves-light" name="offset" value=<?= $offset - $pageLimit ?>>Get Previous Parks</button>
    <?php if ($offset > $total - 4 || $offset == $total -4): ?>
        <button type="submit" class=" rightFloat btn waves-effect waves-light" name="offset" value=<?= $offset = 0 ?>>Go to Start</button>
    <?php else: ?>
        <button type="submit" class=" rightFloat btn waves-effect waves-light" name="offset" value=<?= $offset + $pageLimit ?>>Get More Parks</button>
    <?php endif ?>

    
</form>
<div class="row"> 
    <div class="col s6">
        <h1>National Parks</h1>
    </div>        
    <div class="col s6">
        <img src="/IMG/mountains.jpg">
    </div>
</div>
    <!-- <table class="bordered">
        <tr>
            <th>Name</th>
            <th>Location</th>
            <th>Date Established</th>
            <th>Acres</th>
            <th>Description</th>
        </tr> -->
        <?php foreach ($parks as $park): ?>


    <div class="row">
        <div class="card small col s6 leftFloat">
            <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="/IMG/<?=$park['name']?>.jpg">
            </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4"><?=$park['name']?><i class="material-icons right">More Info</i></span>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4"><?=$park['name']?><i class="material-icons right">X</i></span>
                <p>Location: <?=$park['location']?> </p>
                <p>Date Established:  <?=$park['date_established']?> </p>
                <p>Area in Acres: <?=$park['area_in_acres']?> </p>
                <p>Description: <?=$park['description']?> </p>
            </div>
        </div>
    </div>



     <!--    <tr>
            <td> <?=$park['name']?> </td>
            <td> <?=$park['location']?> </td>
            <td> <?=$park['date_established']?> </td>
            <td> <?=$park['area_in_acres']?> </td>
            <td> <?=$park['description']?> </td>
        </tr> -->
        <?php endforeach; ?>
    </table>
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