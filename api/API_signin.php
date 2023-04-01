<?php
require_once '../models/ConnectSQL.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql_check = "SELECT * FROM administration WHERE email='$username' AND password='".md5($password)."'";
$result_check = mysqli_query($conn, $sql_check);

if (mysqli_num_rows($result_check) > 0) {
    echo json_encode(array("success" => true));
} else {
    echo json_encode(array("success" => false, "message" => "Incorrect email or password"));
}

mysqli_close($conn); // close database connection
?>
