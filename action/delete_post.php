<?php

require '../config/conf.php';
$post_id = $_GET['post_id'];
$query = mysqli_query($conn, "DELETE FROM tb_forum_post WHERE post_id = $post_id");
?>
