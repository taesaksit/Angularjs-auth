<?Php
session_start();

require("condb.php");

$data = json_decode(file_get_contents("php://input"));

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header('location: indexlogin.php');
    exit();
} else {

    $response = array();

    $sql = "UPDATE categories SET category_name = '{$data->name}' WHERE category_id = '{$data->id}'";
    if ($conn->query(($sql))){
        $response['success'] = 'updated successfully!';
    } else {
        $response['error'] = 'SQL have a problem!! ';
    }
}


echo json_encode($response);
$conn->close();
