<?Php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');


session_start();
if (!isset($_SESSION['username'])){
    header("location: ../login/login.html");
}   


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

$check_username = "SELECT username FROM users 
WHERE username = '{$username}' AND password = '{$password}'";
$check_username_result = $conn->query($check_username);

if ($check_username_result->num_rows > 0 ) {
    $response['success'] = 'Login success';
    $_SESSION['username'] = 'Checkuser';

} else {
    $response['faild'] = 'username or password invalid';
}

echo json_encode($response);
$conn->close();



?>