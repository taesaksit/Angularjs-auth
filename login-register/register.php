<?Php

include("../condb.php");

$data = json_decode(file_get_contents("php://input"));
$username = $data->username;
$password = $data->password;
$response = array();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header('location: indexlogin.php');
    exit();

} else {
    $check_username = "SELECT username FROM users WHERE username = '{$username}'";
    $check_username_result = $conn->query($check_username);

    if ($check_username_result->num_rows > 0) {
        $response['data'] = 'username already exits';
    } else {

        $sql = "INSERT INTO users (username , password)  VALUES ('{$username}','{$password}') ";

        if ($conn->query($sql)) {
            $response['data'] = "Register Successfully";
        } else {
            $response['data'] = "Insert faild";
        }
    }
}

echo json_encode($response);
$conn->close();


