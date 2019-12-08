<?php
    $host = $_SERVER['HTTP_HOST'];
    $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

    $db_server = 'localhost';
    $db_user   = 'root';
    $db_pass   = '';
    $db_name   = 'db_alice';

    //creare connection
    $conn =new mysqli($db_server, $db_user, $db_pass, $db_name);

    //check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

?>