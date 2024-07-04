<?Php
session_start();

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');



if (!isset($_SESSION['username'])){
    header("location: index.php");
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

$check_username = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'";
$check_username_result = $conn->query($check_username);

if ($check_username_result->num_rows > 0 ) {
    $user = $check_username_result->fetch_assoc();
    $_SESSION['user_id']= $user['user_id'];
    $_SESSION['username'] = $user['username'];
    $response['success'] = 'Login success';

} else {
    $response['faild'] = 'username or password invalid';
}

echo json_encode($response);
$conn->close();



?>