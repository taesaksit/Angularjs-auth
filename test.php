<?php
require 'condb.php';

$sql  = "SELECT *FROM product";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}
var_dump($data);
?>