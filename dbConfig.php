<?php

$dbHost = 'localhost';

$dbUsername = 'root';

$dbPassword = '';

$dbName = 'labor';

//Connect and select the database

$con= new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($con->connect_error) {

die("Connection failed: " . $con->connect_error);

}

?>