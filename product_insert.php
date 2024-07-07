<?Php

session_start();
require("condb.php");

$data = json_decode(file_get_contents("php://input"));

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header('location: indexlogin.php');
    exit();
} else {

    $name = $data->name;
    $price = $data->price;
    $unit = $data->unit;
    $category = $data->category;
    $response = array();

    $sql = "INSERT INTO product (product_name,product_price,product_unit,category) VALUES ('{$name}',{$price},{$unit},{$category})";
    if ($conn->query(($sql))){
        $response['success'] = 'Product insert successfully!';
    } else {
        $response['error'] = 'SQL have a problem!! ';
    }
}


echo json_encode($response);
$conn->close();
