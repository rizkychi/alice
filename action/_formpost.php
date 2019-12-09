<?php
    include '../config/conf.php';

    $act = $_GET['act'];

    if ($act == 'add') {
        if (isset($_POST['button'])) {

            $subject= $_POST['postName'];
            $content= $_POST['postContent'];
            $course = $_POST['course'];
            $id = $_POST['postID'];
            $user = $_POST['postUser'];

            $query = mysqli_query($conn, "INSERT INTO tb_forum_post (post_course, post_user, post_subject, post_content) VALUES ('$course', '$user', '$subject', '$content')");
            
            if ($query) {
              echo "<script>alert('data tersimpan')</script>";
              //header('Location: ../?p=forum-post');
            }
            
            //$query  = "INSERT INTO tb_forum_post (post_course, post_user, post_subject, post_content) VALUES ('$course', '$user', '$subject', '$content')";
            //$query_run = "$conn, $query";

            //if ($query_run) {
               // echo "<script>alert('Data disimpan')</script>";
           // } else {
            //    echo "<script>alert('data gagal ditambahkan')</script>";
               // header('Location: ../page/forum.php');
          //  }
        }
    } 
    
    
    
    //else if ($act == 'delete') {
      //  if (isset($_GET['id'])) {
        //    $id = $_GET['id'];

          //  $query = mysqli_query($conn, "DELETE FROM tb_forum_post WHERE post_id = $id");

            //if (!$query) {
              //  echo "<script>alert('gagal')</script>";
            //} else {
              //  header('Location: ../?p=forum-post');
            //}
        //}
    //} 
    
    
    // else if ($act == 'update') {
      //   if ($_POST) {
         //    $subject= $_POST['postName'];
        //     $content= $_POST['postContent'];
          //   $course = $_POST['course'];

       //      $query = mysqli_query($conn, "UPDATE tb_forum_post SET postFormTitle = '$subject', postFormContent = '$content' WHERE course = $course");

          //   if (!$query) {
            //     echo "<script>alert('gagal')</script>";
           //  } else {
            //     header('Location: ../?p=forum-post');
            // }
         //}
    // }
?>