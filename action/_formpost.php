<?php
    include '../config/conf.php';

    session_start();
    if (isset($_SESSION['user'])) {
      $uid = $_SESSION['user'];
  }

    $act = $_GET['act'];
    if ($act == 'add') {
        if ($_POST) {

            $subject= $_POST['postName'];
            $content= $_POST['postContent'];
            $course = $_POST['course'];
            $user_id = $_POST['postUser'];
          $query = mysqli_query($conn, "INSERT INTO tb_forum_post (post_course, post_user, post_subject, post_content) VALUES ('$course', '$user_id','$subject','$content')");
          
              if (!$query) {
              echo "<script>alert('data tidak tersimpan')</script>";
              header('Location: ../?p=forum');
            } else {
              mysqli_query($conn,"CALL sp_exp ('$uid',100)");
              $last_post = mysqli_insert_id($conn);
              header('Location: ../?p=forum&id='.$last_post);
            }
    
        }
    } 
    
    
    // $act = $_GET['act'];
    // else if ($act == 'delete') {
    //   if ($_POST){
    //     $subject= $_POST['postName'];
    //     $content= $_POST['postContent'];
    //     $course = $_POST['course'];
    //     $user_id = $_POST['postUser'];
    //        $query = mysqli_query($conn, "DELETE FROM tb_forum_post WHERE post_id = $id");

    //         if (!$query) {
    //            echo "<script>alert('gagal')</script>";
    //         } else {
    //            header('Location: ../?p=forum');
    //         }
    //       }
    // } 
    
    
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