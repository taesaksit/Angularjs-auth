<?php
if (basename(__FILE__) == basename($_SERVER['PHP_SELF'])) {
    header('location: pages/index.php');
    exit;
}

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$dbname = "authen";
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    die("" . $conn->connect_error);
}