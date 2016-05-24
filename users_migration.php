<?php
require_once 'Model.php';
require_once 'db_connect.php';

$dropQuery = 'DROP TABLE IF EXISTS users';

$createTable = 'CREATE TABLE IF NOT EXISTS users (
    id INT unsigned NOT NULL AUTO_INCREMENT,
    name VARCHAR(250) NOT NULL,
    email VARCHAR(250) NOT NULL,
    password VARCHAR(250) NOT NULL,
    PRIMARY KEY (id)
    )';
$dbc->exec($dropQuery);
$dbc->exec($createTable);