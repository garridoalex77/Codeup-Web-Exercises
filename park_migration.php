<?php
//limit user privileges
require 'parks_db_cred.php';
require 'db_connect.php';
$dropQuery = 'DROP TABLE IF EXISTS national_parks';

$createTable = 'CREATE TABLE IF NOT EXISTS national_parks (
        id INT UNSIGNED NOT NULL AUTO_INCREMENT,
        name VARCHAR(50) DEFAULT "NONE",
        location VARCHAR(50) DEFAULT "NONE",
        date_established VARCHAR(50) DEFAULT "NONE",
        area_in_acres INT,
        description VARCHAR(200) DEFAULT "NONE",
        PRIMARY KEY(id)
        )';
$dbc->exec($dropQuery);
$dbc->exec($createTable);

