<?Php
session_start();

require("condb.php");

$data = json_decode(file_get_contents("php://input"));

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header('location: indexlogin.php');
    exit();
} else {
    $category = $data->name;
    $response = array();

    $sql = "INSERT INTO categories (category_name) VALUES ('{$category}')";
    if ($conn->query(($sql))){
        $response['success'] = 'Product type saved successfully!';
    } else {
        $response['error'] = 'SQL have a problem!! ';
    }
}


echo json_encode($response);
$conn->close();
