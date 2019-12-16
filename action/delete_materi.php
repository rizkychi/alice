<?php
    require '../config/conf.php';
    
    $materi = $_GET['materi_id'];

      $sql = mysqli_query($conn, "DELETE FROM tb_material where material_id = $materi");
      
      header("Location: ../?p=materi");
?>