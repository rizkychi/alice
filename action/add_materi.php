<?php
    include '../config/conf.php';

    // $act = $_GET['act'];

    // if ($act == 'add') {
    //     if ($_POST) {
    //         $user   = $_POST['materiUser'];
    //         $subject= $_POST['materiName'];
    //         $course = $_POST['course'];
    //         $content= $_POST['materiContent'];

    //         $nama_file = $_FILES["materiFile"]["name"];
    //         move_uploaded_file($_FILES["materiFile"]["tmp_name"],"../filemateri/".$nama_file);

    //         $query = mysqli_query($conn, "INSERT INTO tb_material (material_course, material_user, material_subject, material_content, material_attachment) VALUES ('$course', '$user','$subject','$content', '$nama_file')");

    //         if (!$query) {
    //             echo "<script>alert('gagal')</script>";
    //         } else 
    //         echo "<script>alert('sukses')</script>";{
    //             // header('Location: ../?p=admin&v=course');
    //         }
    //     }
    // }
    
    $user   = $_POST['materiUser'];
    $subject= $_POST['materiName'];
    $course = $_POST['course'];
    $content= $_POST['materiContent'];

    $nama_file = $_FILES["materiFile"]["name"];
    move_uploaded_file($_FILES["materiFile"]["tmp_name"],"../filemateri/".$nama_file);

    if($button = "TAMBAH") {
        $query = mysqli_query($conn, "INSERT INTO tb_material (material_course, material_user, material_subject, material_content, material_attachment) VALUES ('$course', '$user','$subject','$content', '$nama_file')");
    }

    if (!$query) {
        echo "<script>alert('gagal menambahkan')</script>";
    } else {
        echo "<script>alert('data ditambahkan')</script>";
        // header('Location: ../page/forum.php');
    }
?>