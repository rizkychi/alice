<?php
    session_start();
    require '../config/conf.php';

    if (isset($_SESSION['user'])) {
        $uid = $_SESSION['user'];
    }

    //upload.php

    if(isset($_POST["image"]))
    {
        $data = $_POST["image"];

        $image_array_1 = explode(";", $data);

        $image_array_2 = explode(",", $image_array_1[1]);

        $data = base64_decode($image_array_2[1]);

        $imageName = $uid . '.png';

        file_put_contents('../img/alice-img/'.$imageName, $data);

        //query
        $query = mysqli_query($conn, "UPDATE tb_user SET user_photo = '$imageName' WHERE user_id = '$uid'");

        if (!$query) {
            echo "<script>alert('gagal')</script>";
        } 
    }

?>