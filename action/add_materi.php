<?php
    include '../config/conf.php';
            $id     = $_POST['materiID'];
            $user   = $_POST['materiUser'];
            $subject= $_POST['materiName'];
            $course = $_POST['course'];
            $content= $_POST['materiContent'];
            $date   = $_POST['materiDate'];
            $button = $_POST['button'];

            // $nama_file = $_FILES["materiFile"]["name"];
            // move_uploaded_file($_FILES["materiFile"]["tmp_name"],"../filemateri".$nama_file);

            if($button = "TAMBAH") {
                $query = mysqli_query($conn, "INSERT INTO tb_material (material_id, material_course, material_user, material_subject, material_content, material_date) VALUES ('$id','$course', '$user','$subject','$content', '$date')");
            }

                header('Location: ../?p=materi');
?>