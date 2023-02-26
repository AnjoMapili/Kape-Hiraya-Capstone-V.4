<?php

// Database credentials
define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'kapehiraya');

// Other configuration settings
define('APP_NAME', 'Kape Hiraya');

// Connect to the database
$con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if(!$con){
    die(mysqli_error($con));
}
