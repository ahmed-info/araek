<?php
session_start();
    $host = "localhost";
    $user = "root";
    $pass = "";
    $data = "uob_a";
    $dodobe = mysqli_connect($host,$user,$pass,$data) OR die("error");
?>