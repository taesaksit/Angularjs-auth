<?php
require 'condb.php';
session_start();

$data = json_decode(file_get_contents("php://input"));

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header('location: indexlogin.php');
    exit();
} else {
    $sql = "SELECT count(product_id ) AS count , categories.category_name FROM product
                    INNER JOIN categories ON category = categories.category_id
                    GROUP BY categories.category_name";
    $result = $conn->query( $sql );
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $response[] = $row;
        }
    } else {
        $response['error'] = 'SQL have a problem!! ';
    }
}

echo json_encode($response);
$conn->close();
