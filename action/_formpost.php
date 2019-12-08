<?php
    include '../config/conf.php';

    $act = $_GET['act'];

    if ($act == 'add') {
        if ($_POST) {
            $subject= $_POST['postName'];
            $content= $_POST['postContent'];
            $course = $_POST['course'];
        

            $query  = mysqli_query($conn, "INSERT INTO tb_forum_post (post_subject, post_content, post_course) VALUES ('$subject', '$content', '$course')");

            if (!$query) {
                echo "<script>alert('gagal')</script>";
            } else {
                header('Location: ../?p=forum-post');
            }
        }
    } else if ($act == 'delete') {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $query = mysqli_query($conn, "DELETE FROM tb_forum_post WHERE post_id = $id");

            if (!$query) {
                echo "<script>alert('gagal')</script>";
            } else {
                header('Location: ../?p=forum-post');
            }
        }
    } else if ($act == 'update') {
        if ($_POST) {
            $id   = $_POST['postID'];
            $name = $_POST['courseName'];
            $sks  = $_POST['courseSKS'];

            $query = mysqli_query($conn, "UPDATE tb_forum_post SET postFormTitle = '$subject', postFormContent = '$content' WHERE course = $course");

            if (!$query) {
                echo "<script>alert('gagal')</script>";
            } else {
                header('Location: ../?p=forum-post');
            }
        }
    }
?>