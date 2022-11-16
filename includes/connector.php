<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "leave_management_system";

    $connect = mysqli_connect($host, $user, $password, $database);
    mysqli_select_db($connect, $database);
?>