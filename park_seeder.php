<?php
//limit user privileges
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'parks_db');
define('DB_USER', 'parks_user');
define('DB_PASS', 'password');

require 'db_connect.php';

$parks = [
    ['name' => 'Acadia', 'location' => 'Maine', 'date' => 'Feb 26, 1919', 'area' => 47,389.67],
    ['name' => 'American Samoa', 'location' => 'American Samoa', 'date' => 'Oct 31, 1988', 'area' => 9,000.00],
    ['name' => 'Arches', 'location' => 'Utah', 'date' => 'April 12, 1929', 'area' => 76,518.98],
    ['name' => 'Badlands', 'location' => 'South Dakota', 'date' => 'Nov 10, 1978', 'area' => 242,755.94]
];
foreach ($parks as $park) {
    $query = "INSERT INTO national_parks (name, location, date_established, area_in_acres) VALUES ('{$park['name']}', '{$park['location']}', '{$park['date']}', '{$park['area']}')";
    $dbc->exec($query);
    echo "inserted ID: " . $dbc->lastInsertId() . PHP_EOL;
}