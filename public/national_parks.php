<?php
require_once '../parks_db_cred.php';
require_once '../db_connect.php';
require '../Input.php';
function pageController($dbc) {
    $data = [];
    $message = [];
    
    if (Input::has('offset') && Input::get('offset') < 0) {
        $data['offset'] = 0;
    } elseif (Input::has('offset')) {
        $data['offset'] = Input::get('offset');
    } else {
        $data['offset'] = 0;
    }
    $data['pageLimit'] = 4;
    $stmt = $dbc->prepare("SELECT * FROM national_parks LIMIT {$data['pageLimit']} OFFSET {$data['offset']}");
    $stmt->execute();
    $data['parks'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $total = $dbc->prepare('SELECT * FROM national_parks');
    $total->execute();
    $data['total'] = count($total->fetchAll(PDO::FETCH_ASSOC));

    if (!empty($_POST)) {
        try {
            $name = Input::getString('name');
        } catch (InvalidArgumentException $e1) {
            $message['name'] = "Invalid argument".PHP_EOL;
        } catch (OutofRangeException $e1) {
            $message['name'] = "Please enter a value for Park Name".PHP_EOL;
        } catch (DomainException $e1) {
            $message['name'] = "Please use A-Z characters for Park Name".PHP_EOL;
        } catch (LengthException $e1) {
            $message['name'] = "Park Name must be between 5 and 50 characters".PHP_EOL;
        } catch (Exception $e1) {
            $message['name'] = $e1->getMessage().PHP_EOL;
        }
        try {
            $location = Input::getString('location');
       } catch (InvalidArgumentException $e2) {
            $message['location'] = "Invalid argument".PHP_EOL;
        } catch (OutofRangeException $e2) {
            $message['location'] = "Please enter a value for Park Location".PHP_EOL;
        } catch (DomainException $e2) {
            $message['location'] = "Please use A-Z characters for Park Location".PHP_EOL;
        } catch (LengthException $e2) {
            $message['location'] = "Park Location must be between 5 and 50 characters".PHP_EOL;
        } catch (Exception $e2) {
            $message['location'] = $e2->getMessage().PHP_EOL;
        }
        try {
            $date = Input::getString('date_established');
        } catch (InvalidArgumentException $e3) {
            $message['date_established'] = "Invalid argument".PHP_EOL;
        } catch (OutofRangeException $e3) {
            $message['date_established'] = "Please enter a value for Park Date".PHP_EOL;
        } catch (DomainException $e3) {
            $message['date_established'] = "Please use Alphanumeric characters for Park Date".PHP_EOL;
        } catch (LengthException $e3) {
            $message['date_established'] = "Park Date must be between 5 and 50 characters".PHP_EOL;
        } catch (Exception $e3) {
            $message['date_established'] = $e3->getMessage().PHP_EOL;
        }
        try {
            $area = Input::getNumber('area_in_acres', 3, 10);
        } catch (InvalidArgumentException $e4) {
            $message['area_in_acres'] = "Invalid argument".PHP_EOL;
        } catch (OutofRangeException $e4) {
            $message['area_in_acres'] = "Please enter a value for Park Area".PHP_EOL;
        } catch (DomainException $e4) {
            $message['area_in_acres'] = "Please use Numeric characters for Park Area".PHP_EOL;
        } catch (LengthException $e4) {
            $message['area_in_acres'] = "Park Area must be between 3 and 10 characters".PHP_EOL;
        } catch (Exception $e4) {
            $message['area_in_acres'] = $e4->getMessage().PHP_EOL;
        }
        try {
            $description = Input::getString('description', 0, 200);
        } catch (InvalidArgumentException $e5) {
            $message['description'] = "Invalid argument".PHP_EOL;
        } catch (OutofRangeException $e5) {
            $message['description'] = "Please enter a value for Park Description".PHP_EOL;
        } catch (DomainException $e5) {
            $message['description'] = "Please use Alphanumeric characters for Park Description".PHP_EOL;
        } catch (LengthException $e5) {
            $message['description'] = "Park Description must be between 0 and 200 characters".PHP_EOL;
        } catch (Exception $e5) {
            $message['description'] = $e5->getMessage().PHP_EOL;
        }
        $query = 'INSERT INTO national_parks (
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
            :description)';
        $stmt = $dbc->prepare($query);
        if (empty($message)) {
            $stmt->execute(array(
                ':name' => $name,
                ':location' => $location,
                ':date_established' => $date,
                ':area_in_acres' => $area,
                ':description' => $description));
            header('Refresh:0');
            
        }
    }
    if (isset($message['location'])) {
        $data['placeholder'] = $message['location'];
        
    } else {
        $data['placeholder'] = Input::get('location');
        
    }
    $data['message'] = $message;
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
    <link rel="shortcut icon" href="IMG/mountains.jpg">
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
        <input type="text" required="required" name="name" 
         <?php if (isset($message['name'])): ?>
            placeholder="<?= $message['name']; ?>"
        <?php else: ?>
            value="<?= Input::get('name'); ?>"
        <?php endif ?>
            placeholder="Name">



        <input type="text" required="required" name="location" value="<?= $placeholder ?>" placeholder="Location">
        <input type="text" required="required" name="date_established" placeholder="Date Established" value="<?= isset($message['date_established']) ? "" : Input::get('date_established')?>">
        <input type="text" required="required" name="area_in_acres" placeholder="Area in Acres" value="<?= isset($message['area_in_acres']) ? "" : Input::get('area_in_acres')?>">
        <input type="text" required="required" name="description" placeholder="Description" value="<?= isset($message['description']) ? "" : Input::get('description')?>">
        <input class="btn waves-effect waves-light" type="submit" value="Add Park">

    </form>
</div>

</body>
</html>