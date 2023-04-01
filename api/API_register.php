<?php
require_once '../models/ConnectSQL.php';

$username = $_POST['username'];
$password = $_POST['password'];
$cf_password = $_POST['cf_password'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$date=$_POST['date'];
$error_msg = ""; // variable to store error message

$sql_check = "SELECT * FROM administration WHERE name='$username' or email='$email'";
$result_check = mysqli_query($conn, $sql_check);

if (mysqli_num_rows($result_check) > 0) {
    $error_msg = 'this name or email not already exists';
} else if($password !== $cf_password){
    $error_msg = 'Confirm password did not match';
} else if(strlen($password) < 6){
    $error_msg = 'Password must be at least 6 characters.';
}else if(!is_numeric($phone)){
     $error_msg = 'can only enter numbers';
}else if(strlen($phone)<10){
     $error_msg = 'phone must be at least 10 characters.';
} else{
     $password = md5($password);
 
     $sql = "INSERT INTO administration (name, password, email, phone ,date) VALUES ('$username', '$password', '$email', '$phone','$date')";
     if (mysqli_query($conn, $sql)) {
        
         echo json_encode(array("success" => true));
     } else {
         echo json_encode(array("success" => false, "message" => "Registration error!"));
     }
 }
 
 mysqli_close($conn); // close database connection
 
 if($error_msg !== ""){
     // display error message on the same page
     echo json_encode(array("success" => false, "message" => $error_msg));
 }
 ?>


