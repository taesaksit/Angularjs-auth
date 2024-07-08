<?php
require 'condb.php';
session_start();

$data = json_decode(file_get_contents("php://input"));

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header('location: indexlogin.php');
    exit();
} else {
    $sql = "SELECT categories.category_name , avg(product.product_price) AS avg_price
                    FROM product
                    JOIN categories ON categories.category_id = product.category
                    GROUP BY category_id";

    $result = $conn->query($sql);
    
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
