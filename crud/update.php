<?php

    session_start();
    include_once 'config.php';

    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $gender = $_POST['gender'];
    $nationality = $_POST['nation'];
    $username = $_POST['username'];
    $user_id = $_POST['user_id'];

    if(empty($firstName) || empty($lastName) || empty($email) || empty($tel) || empty($gender) || empty($nationality) || empty($username)){
           
        header("Location: edit.php");
        $_SESSION['err_s'] = "All fields are required";
        exit;

    }else{

        $sql = "UPDATE mis_users SET firstName = '$firstName', lastName = '$lastName',gender='$gender', nationality='$nationality', email='$email', username='$username' WHERE user_id = '$user_id'";

        $update_query = mysqli_query($connect, $sql);
        if($update_query){
            header("Location: index.php");
            exit;
        }else{
            header("Location: form.php");
            $_SESSION['db_error'] = "Oops! Failed to create user, try again later";
            exit;
        }
}
?>