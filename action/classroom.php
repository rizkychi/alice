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
                header("Location: ../?p=classroom");
            }
        }
    } else if ($act == 'add') {
        if ($_POST) {
            $uid     = $_POST['classUser'];
            $cname   = $_POST['className'];
            $cdesc   = $_POST['classDesc'];
            $ccourse = $_POST['classCourse'];

            $query   = mysqli_query($conn, "INSERT INTO tb_class (class_name, class_course, class_desc, class_lecturer) VALUES ('$cname', '$ccourse', '$cdesc', '$uid')");
            header("Location: ../?p=classroom");
        }
    } else if ($act == 'update') {
        if ($_POST) {
            $uid     = $_POST['classUser'];
            $cid     = $_POST['classId'];
            $cname   = $_POST['className'];
            $cdesc   = $_POST['classDesc'];
            $ccourse = $_POST['classCourse'];

            $query   = mysqli_query($conn, "UPDATE tb_class SET class_name = '$cname', class_course = '$ccourse', class_desc = '$cdesc', class_lecturer = '$uid' WHERE class_id = '$cid'");
            header("Location: ../?p=classroom");
        }
    } else if ($act == 'add-post') {
        if ($_POST) {
            $uid     = $_POST['userID'];
            $cid     = $_POST['classID'];
            $subject = $_POST['postTitle'];
            $content = $_POST['postContent'];
            $link    = $_POST['postLink'];
            $type    = $_POST['postType'];

            if ($_FILES["attachFile"]["error"] != 4) {
                $fileName = date("Ymdhis").'_'.$_FILES["attachFile"]["name"];
                move_uploaded_file($_FILES["attachFile"]["tmp_name"],"../filemateri-kelas/".$fileName);
            } else {
                $fileName = '';
            }

            $isMaterial   = 0;
            $isAssignment = 0;
            if ($type == 'Materi') {
                $isMaterial = 1;
            } else if ($type == 'Tugas') {
                $isAssignment = 1;
            }

            $query = mysqli_query($conn, "INSERT INTO tb_class_post (post_class_id, post_user, post_subject, post_content, post_attachment, post_attachment_link, post_is_material, post_is_assignment) VALUES ('$cid','$uid','$subject','$content','$fileName','$link','$isMaterial','$isAssignment')");
            header("Location: ../?p=class&id=$cid");
        }
    } else if ($act == 'add-comment') {
        if ($_POST) {
            $uid     = $_POST['userID'];
            $pid     = $_POST['postID'];
            $cid     = $_POST['classID'];
            $content = $_POST['commentContent'];

            $query = mysqli_query($conn, "INSERT INTO tb_class_comment (comment_post, comment_user, comment_content) VALUES ('$pid','$uid','$content')");
            header("Location: ../?p=class&id=$cid&view=post&pid=$pid");
        }
    }
?>