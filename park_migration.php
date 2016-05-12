<?php
//limit user privileges
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'parks_db');
define('DB_USER', 'parks_user');
define('DB_PASS', 'password');

require 'db_connect.php';
$dropQuery = 'DROP TABLE IF EXISTS national_parks';

$createTable = 'CREATE TABLE IF NOT EXISTS national_parks (
        id INT UNSIGNED NOT NULL AUTO_INCREMENT,
        name VARCHAR(50) DEFAULT "NONE",
        location VARCHAR(50) DEFAULT "NONE",
        date_established VARCHAR(50) DEFAULT "NONE",
        area_in_acres DOUBLE,
        PRIMARY KEY(id)
        )';
$dbc->exec($dropQuery);
$dbc->exec($createTable);

