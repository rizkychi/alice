<?php
    session_start();
    include '../config/conf.php';

    $act = $_GET['act'];
    
    // if (!isset($_SESSION['role']) || $_SESSION['role'] != 1) {
    //     die();
    // }

    if ($act == 'join') {
        if ($_POST) {
            $code = $_POST['classCode'];
            $uid  = $_POST['userId'];

            $query = mysqli_query($conn, "SELECT class_id FROM tb_class WHERE class_code = '$code'");
            $exist = mysqli_num_rows($query);
            $cid   = mysqli_fetch_array($query)[0];

            if ($exist > 0) {
                $query = mysqli_query($conn, "INSERT INTO tb_class_member (class_id, user_id) VALUES ($cid, '$uid')");
                $_SESSION['successJoinClass'] = true;
                header("Location: ../?p=class&id=$cid");
            } else {
                $_SESSION['errorJoinClass'] = true;
                header("Location: ../?p=home");
            }
        }
    }
?>