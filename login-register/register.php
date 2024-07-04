<?Php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

$data = json_decode(file_get_contents("php://input"));

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "authen";
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    die("" . $conn->connect_error);
}

$username = $data->username;
$password = $data->password;
$response = array();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header('location: index.php');
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
