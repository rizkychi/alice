<?php
session_start();
require_once '../config/conf.php';

if (isset($_POST['submit'])){

$id = $_SESSION['user'];
$fname = $_POST['fname'];
$email = $_POST['email'];
$date = $_POST['date'];
$sql = mysqli_query($conn,"UPDATE tb_user SET user_name = '$fname' , user_email = '$email' , user_dob = '$date' WHERE user_id = '$id'");
} 

if ($sql) {
    header("Location: ../?p=akun");
}
?>