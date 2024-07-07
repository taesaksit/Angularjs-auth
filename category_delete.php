<?Php
session_start();

require("condb.php");

$data = json_decode(file_get_contents("php://input"));

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header('location: indexlogin.php');
    exit();
} else {

    $response = array();
    $sql = "DELETE FROM categories WHERE category_id = '{$data->category_id}'";
    if ($conn->query(($sql))){
        $response['success'] = 'Category deleted successfully!';
    } else {
        $response['error'] = 'SQL have a problem!! ';
    }
}


echo json_encode($response);
$conn->close();
