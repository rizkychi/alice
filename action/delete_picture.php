<?php
    session_start();
    require '../config/conf.php';
    
    if (isset($_SESSION['user'])) {
        $uid = $_SESSION['user'];
    }

    //query
    $query = mysqli_query($conn, "UPDATE tb_user SET user_photo = 'avatar.png' WHERE user_id = '$uid'");

    if (!$query) {
        echo "<script>alert('gagal')</script>";
    } else {
        header("Location: ../?p=akun");
    }
?>