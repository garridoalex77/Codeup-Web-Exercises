<?php 

function inputHas($key) {
    return isset($_REQUEST[$key]);
}

function inputGet($key) {
    return inputHas($key) ? $_REQUEST[$key] : null;
}

function redirect($input) {
    return header($input);
    die();
}

function escape($input) {
    return htmlentities($input);
}






