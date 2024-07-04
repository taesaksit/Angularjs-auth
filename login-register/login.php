<?Php
session_start();

include("../condb.php");

$data = json_decode(file_get_contents("php://input"));

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header('location: indexlogin.php');
    exit();
} else {
    $username = $data->username;
    $password = $data->password;
    $response = array();

    $check_username = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'";
    $check_username_result = $conn->query($check_username);

    if ($check_username_result->num_rows > 0) {
        $user = $check_username_result->fetch_assoc();
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];
        $response['success'] = 'Login success';
    } else { $response['error'] = 'username or password invalid';}
}


echo json_encode($response);
$conn->close();
