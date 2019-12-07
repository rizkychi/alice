<?php
    $host = $_SERVER['HTTP_HOST'];
    $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

    $db_server = 'localhost';
    $db_user   = 'root';
    $db_pass   = '';
    $db_name   = 'db_alice';

    $conn = mysql_connect($db_server, $db_user, $db_pass);

    if (!$conn) {
        die('Not connected to database '.mysql_error());
    }

    mysql_select_db($db_name);

?>