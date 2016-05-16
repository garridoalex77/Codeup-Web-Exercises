<?php
//limit user privileges
require 'parks_db_cred.php';
require 'db_connect.php';
$deleteQuery = 'TRUNCATE TABLE national_parks';
$parks = [
    ['name' => 'Acadia', 'location' => 'Maine', 'date_established' => 'Feb 26, 1919', 'area_in_acres' => 47389.67, 'description' => 'Great'],
    ['name' => 'American Samoa', 'location' => 'American Samoa', 'date_established' => 'Oct 31, 1988', 'area_in_acres' => 9000.00, 'description' => 'Great'],
    ['name' => 'Arches', 'location' => 'Utah', 'date_established' => 'April 12, 1929', 'area_in_acres' => 76518.98, 'description' => 'Great'],
    ['name' => 'Badlands', 'location' => 'South Dakota', 'date_established' => 'Nov 10, 1978', 'area_in_acres' => 242755.94, 'description' => 'Great'],
    ['name' => 'Big Bend', 'location' => 'Texas', 'date_established' => 'June 12, 1944', 'area_in_acres' => 801163.21, 'description' => 'Great'],
    ['name' => 'Biscayne', 'location' => 'Florida', 'date_established' => 'June 28, 1980', 'area_in_acres' => 172924.07, 'description' => 'Great'],
    ['name' => 'Black Canyon of The Gunnison', 'location' => 'Colorado', 'date_established' => 'Oct 21, 1999', 'area_in_acres' => 32950.03, 'description' => 'Great'],
    ['name' => 'Bryce Canyon', 'location' => 'Utah', 'date_established' => 'Feb 25, 1928', 'area_in_acres' => 35835.08, 'description' => 'Great'],
    ['name' => 'Canyonlands', 'location' => 'Utah', 'date_established' => 'Sept 12, 1964', 'area_in_acres' => 337597.83, 'description' => 'Great'],
];

$dbc->exec($deleteQuery);

$query = "INSERT INTO national_parks (name, location, date_established, area_in_acres, description) VALUES (:name, :location, :date_established, :area_in_acres, :description)";
$stmt = $dbc->prepare($query);

foreach ($parks as $park) {
    $stmt->bindValue(':name', $park['name'], PDO::PARAM_STR);
    $stmt->bindValue(':location', $park['location'], PDO::PARAM_STR);
    $stmt->bindValue(':date_established', $park['date_established'], PDO::PARAM_STR);
    $stmt->bindValue(':area_in_acres', $park['area_in_acres'], PDO::PARAM_STR);
    $stmt->bindValue(':description', $park['description'], PDO::PARAM_STR);
    $stmt->execute();
    // $dbc->exec(array(':name' => "$park['name']", ':location' => "$park['location']", ':date' => "$park['date']", ':area_in_acres' => "$park['area']", ':description' =>"$park['description']"));
    echo "inserted ID: " . $dbc->lastInsertId() . PHP_EOL;
};