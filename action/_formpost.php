<?php
    include '../config/conf.php';

    $act = $_GET['act'];

    if ($act == 'add') {
        if (isset($_POST['add'])) {

            $subject= $_POST['postName'];
            $content= $_POST['postContent'];
            $course = $_POST['course'];
            $id = $_POST['postID'];
            $user = $_POST['postUser'];

// INSERT INTO tb_forum_post (post_id, post_course, post_user, post_subject, post_content, post_view, post_like, post_dislike, post_date) VALUES ('2', '1', '17.11.1229', 'How to Make CSS','just google it', '','','','');
//            $query = mysqli_query($conn, "INSERT INTO tb_forum_post (post_course, post_user, post_subject, post_content) VALUES ('$course', '$user', '$subject', '$content')");
           
//yang bisa masuk db INSERT INTO tb_forum_post VALUES ('', '1', '17.11.1247','How to Make CSS','Just google it', '','','','');

$query = mysqli_query($conn, "INSERT INTO tb_forum_post VALUES ('$postID', '$course', '$user','$subject','$content', '','','','')");
           // INSERT INTO tb_forum_post  VALUES ('$postID', '1', '17.11.1247', 'How to Make PHP', 'Stackoverflow', '','','','');
            if (!$query) {
              echo "<script>alert('data tidak tersimpan')</script>";
              header('Location: ../?p=forum');
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