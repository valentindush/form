<?php

    session_start();
    include_once 'send.php';

    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $gender = $_POST['gender'];
    $nationality = $_POST['nation'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['c_password'];

    if(empty($firstName) || empty($lastName) || empty($email) || empty($tel) || empty($gender) || empty($nationality) || empty($username) || empty($password)|| empty($cpassword)){
           echo "All fields are requrired";

    }else{

        if($password == $cpassword){

            $hashedPass = hash('md5', $password);
            $addQuery=mysqli_query(
                $connect,"INSERT INTO mis_users(firstname, lastname,telephone,gender, nationality,email, username,password) 
                VALUES ('$firstName','$lastName', '$gender','$tel','$nationality','$email', '$username','$hashedPass')");
        
            if($addQuery){
                header("Location: index.php");
                exit;
            }else{
                header("Location: form.php");
                $_SESSION['db_error'] = "Oops! Failed to create user, try again later";
            }
        }else{
            header("Location: form.php");
            $_SESSION['err_s'] = "passwords do not match";
            exit;
        }

   
}
?>