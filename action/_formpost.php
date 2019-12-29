<?php
    include '../config/conf.php';

    
  //   session_start();
  //   if (isset($_SESSION['user'])) {
  //     $uid = $_SESSION['user'];
  // }

    $act = $_GET['act'];
    $button = $_POST['button'];

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
              // mysqli_query($conn,"CALL sp_exp ('$uid',100)");
              $last_post = mysqli_insert_id($conn);
              header('Location: ../?p=forum&id='.$last_post);
            }
            
        }
    } else if ($act == 'update'){
        if ($_POST) {
            $subject= $_POST['postName'];
            $content= $_POST['postContent'];
            $course = $_POST['course'];
            $user_id = '2';
            $post_id = $_POST['post_id'];
            $query = mysqli_query($conn, "UPDATE tb_forum_post SET post_course = '$course', post_subject='$subject', post_content='$content' where post_id = '$post_id'");
            //var_dump($post_id);
            // echo $post_id;
          
            if (!$query) {
              echo "<script>alert('data tidak tersimpan')</script>";
              header('Location: ../?p=forum');
            } else {
              // $last_post = mysqli_insert_id($conn);
               header('Location: ../?p=forum-post&id='.$post_id);
            }
         
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