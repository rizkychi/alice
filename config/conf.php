<?php
    $host = $_SERVER['HTTP_HOST'];
    $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

    $db_server = 'localhost';
    $db_user   = 'root';
    $db_pass   = '';
    $db_name   = 'db_alice';

    $conn = mysqli_connect($db_server, $db_user, $db_pass);

    if (!$conn) {
        die('Not connected to database '.mysqli_error($conn));
    }

    $db_select = mysqli_select_db($conn, $db_name);
    
    if (!$db_select) {
    die("Database selection failed: " . mysqli_error($conn));
    }
?>