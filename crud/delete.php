<?php

    include_once "config.php";

    $userId = $_GET['id'];

    $deletequery = mysqli_query($connect, "DELETE FROM mis_users WHERE user_id = '$userId'");

    if($deletequery){
        header("Location: index.php");
        exit;
    }
?>