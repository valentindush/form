<?php

    $server = "localhost";
    $db = "mis_users";
    $username = "root";
    $password="";

    $connect = mysqli_connect($server, $username, $password, $db);

    if(!$connect){
        echo mysqli_connect_error();
    }
?>