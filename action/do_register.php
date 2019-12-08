<?php
$host = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

$db_server = 'localhost';
$db_user   = 'root';
$db_pass   = '';
$db_name   = 'db_alice';

//creare connection
$conn = mysqli_connect($db_server, $db_user, $db_pass);

//check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    } 

mysqli_select_db($conn,$db_name);

if (isset($_POST['daftar'])){
    
    $id = $_POST['id'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $fname = $_POST['fname'];
    $date = $_POST['date'];
    $gender = $_POST['gender'];
    
    $sql = "INSERT INTO tb_user (user_id, user_email, user_password, user_name, user_dob , user_gender) 
    VALUES ('$id','$email','$pass','$fname','$date','$gender')";
    
    $simpan = mysqli_query($conn,$sql);
    if ($simpan) {
        header('location: ../index.php');
    } else { echo "GUAGAL COY"; } 
    
}
?>