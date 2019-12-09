<?php 
session_start();
require_once '../config/conf.php';

$id = addslashes($_POST['userID'],"");
$pass = addslashes(md5($_POST['userPass']),"");

//menyeleksi data dengan username dan password yang sesuai
$data = mysqli_query($conn,"SELECT * FROM tb_user WHERE user_id='$id' && user_password='$pass'");

//menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
$ambil = mysqli_fetch_array($data);

var_dump($ambil);

if($cek > 0){
    $_SESSION['login'] = true ;
    $_SESSION['user'] = $id ;
    $_SESSION['role'] = $ambil['user_role'];   
    if ($ambil['userRole'] == 1) {
        header('Location: ../?p=admin');
    } else {
        header('Location: ../?p=home');
    }
} else {
    $_SESSION['login_failed'] = true;
    header('Location: ../?p=landing#login');
}
?>