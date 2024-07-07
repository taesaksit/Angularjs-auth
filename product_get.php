<?Php
session_start();

require("condb.php");

$data = json_decode(file_get_contents("php://input"));

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header('location: indexlogin.php');
    exit();
} else {
    $sql = "SELECT product_id , product_name , product_price , product_unit , category_name
            FROM product
            INNER JOIN categories ON product.category = categories.category_id;";
    $result = $conn->query($sql);
    $product_type = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $product_type[] = $row;
        }
    } else {
        $response['error'] = 'SQL have a problem!! ';
    }
}

echo json_encode($product_type);
$conn->close();
