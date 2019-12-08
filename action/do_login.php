<?php 
session_start();
require_once '../config/conf.php';

$id = $_POST['userID'];
$pass = $_POST['userPass'];

//menyeleksi data dengan username dan password yang sesuai
$data = mysqli_query($conn,"SELECT * tb_user WHERE user_id='$id' && user_password='$pass'");

//menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
$ambil = mysqli_fetch_array($data);

if($cek > 0){
    $_SESSION['login'] = true ;
    $_SESSION['user'] = $id ;
    $_SESSION['role'] = $ambil['userRole'];   
    header("location:../?p=register");
} else {
    header("location:../?p=home");
}
?>