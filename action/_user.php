<?php
    session_start();
    include '../config/conf.php';

    $act = $_GET['act'];

    if (!isset($_SESSION['role']) || $_SESSION['role'] != 1) {
        die();
    }

    if ($act == 'add') {
        // if ($_POST) {
        //     $name = $_POST['courseName'];
        //     $sks  = $_POST['courseSKS'];

        //     $query = mysqli_query($conn, "INSERT INTO tb_course (course_name, course_sks) VALUES ('$name','$sks')");

        //     if (!$query) {
        //         echo "<script>alert('gagal')</script>";
        //     } else {
        //         header('Location: ../?p=admin&v=course');
        //     }
        // }
    } else if ($act == 'delete') {
        if (isset($_GET['id'])) {
            $uid  = $_GET['id'];
            $view = $_GET['v'];

            $query = mysqli_query($conn, "DELETE FROM tb_user WHERE user_id = '$uid'");

            if (!$query) {
                echo "<script>alert('gagal')</script>";
            } else {
                header("Location: ../?p=admin&v=$view");
            }
        }
    } else if ($act == 'update') {
        // if ($_POST) {
        //     $id   = $_POST['courseID'];
        //     $name = $_POST['courseName'];
        //     $sks  = $_POST['courseSKS'];

        //     $query = mysqli_query($conn, "UPDATE tb_course SET course_name = '$name', course_sks = '$sks' WHERE course_id = $id");

        //     if (!$query) {
        //         echo "<script>alert('gagal')</script>";
        //     } else {
        //         header('Location: ../?p=admin&v=course');
        //     }
        // }
    } else if ($act == 'verify') {
        if (isset($_GET['id'])) {
            $uid  = $_GET['id'];
            $view = $_GET['v'];

            $query = mysqli_query($conn, "UPDATE tb_user SET user_verified = '1' WHERE user_id = '$uid'");

            if (!$query) {
                echo "<script>alert('gagal')</script>";
            } else {
                header("Location: ../?p=admin&v=$view");
            }
        }
    } else if ($act == 'unverify') {
        if (isset($_GET['id'])) {
            $uid  = $_GET['id'];
            $view = $_GET['v'];

            $query = mysqli_query($conn, "UPDATE tb_user SET user_verified = '0' WHERE user_id = '$uid'");

            if (!$query) {
                echo "<script>alert('gagal')</script>";
            } else {
                header("Location: ../?p=admin&v=$view");
            }
        }
    }
?>