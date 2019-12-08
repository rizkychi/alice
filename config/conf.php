<?php
    $host = $_SERVER['HTTP_HOST'];
    $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

    $db_server = 'localhost';
    $db_user   = 'root';
    $db_pass   = '';
    $db_name   = 'db_alice';

    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

    if (mysqli_connect_errno()) {
        die('Not connected to database '.mysqli_connect_errno());
    }
?>