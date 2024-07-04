<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "authen";
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    die("" . $conn->connect_error);
}
