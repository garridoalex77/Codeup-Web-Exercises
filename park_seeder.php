<?php
//limit user privileges
require 'parks_db_cred.php';
require 'db_connect.php';
$deleteQuery = 'TRUNCATE TABLE national_parks';
$parks = [
    ['name' => 'Acadia', 'location' => 'Maine', 'date' => 'Feb 26, 1919', 'area' => 47389.67],
    ['name' => 'American Samoa', 'location' => 'American Samoa', 'date' => 'Oct 31, 1988', 'area' => 9000.00],
    ['name' => 'Arches', 'location' => 'Utah', 'date' => 'April 12, 1929', 'area' => 76518.98],
    ['name' => 'Badlands', 'location' => 'South Dakota', 'date' => 'Nov 10, 1978', 'area' => 242755.94],
    ['name' => 'Big Bend', 'location' => 'Texas', 'date' => 'June 12, 1944', 'area' => 801163.21],
    ['name' => 'Biscayne', 'location' => 'Florida', 'date' => 'June 28, 1980', 'area' => 172924.07],
    ['name' => 'Black Canyon of The Gunnison', 'location' => 'Colorado', 'date' => 'Oct 21, 1999', 'area' => 32950.03],
    ['name' => 'Bryce Canyon', 'location' => 'Utah', 'date' => 'Feb 25, 1928', 'area' => 35835.08],
    ['name' => 'Canyonlands', 'location' => 'Utah', 'date' => 'Sept 12, 1964', 'area' => 337597.83],
];
$dbc->exec($deleteQuery);
foreach ($parks as $park) {
    $query = "INSERT INTO national_parks (name, location, date_established, area_in_acres) VALUES ('{$park['name']}', '{$park['location']}', '{$park['date']}', '{$park['area']}')";
    $dbc->exec($query);
    echo "inserted ID: " . $dbc->lastInsertId() . PHP_EOL;
};