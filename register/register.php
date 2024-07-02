<?Php

$data = json_decode(file_get_contents("php://input"));

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "authen";
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    die("". $conn->connect_error);
}


$check_username = "SELECT username FROM users WHERE username = '{$data->username}'";
$check_username_result = $conn->query($check_username);
if ($check_username_result->num_rows > 0) {
    echo json_encode('username already exits');
}

$sql = "INSERT INTO users (username , password) 
        VALUES ('{$data->username}','{$data->password}') ";

if ($conn->query($sql)) {
    echo json_encode('Success');
} else {
    echo json_encode('Insert faild');
}

?>


