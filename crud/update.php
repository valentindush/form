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

        if(isset($_FILES['image'])){
            $file_name = $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];
            
            $img_explode =  explode('.', $file_name);
            $img_ext = end($img_explode);

            $extensions = ['jpeg','png','gif','jpg'];

            if(in_array($img_ext, $extensions)){
                $time = time();
                $newImageName = $time.$file_name;
                $sql = "UPDATE mis_users SET firstName = '$firstName', lastName = '$lastName',gender='$gender', nationality='$nationality', email='$email', username='$username' picture='$newImageName' WHERE user_id = '$user_id'";

                $update_query = mysqli_query($connect, $sql);
                if($update_query){
                    header("Location: index.php");
                    exit;
                }else{
                    header("location: edit.php");
                    $_SESSION['db_error'] = "Failed to update user, please try again later";
                }
            }else{
                header("Location: edit.php");
                $_SESSION['err_s'] = "Only files with .jpg, png gif and jpeg extensions are allowed";
                exit;
            }
        }

        $sql = "UPDATE mis_users SET firstName = '$firstName', lastName = '$lastName',gender='$gender', nationality='$nationality', email='$email', username='$username' WHERE user_id = '$user_id'";

        $update_query = mysqli_query($connect, $sql);
        if($update_query){
            header("Location: index.php");
            exit;
        }else{
            header("Location: edit.php");
            $_SESSION['db_error'] = "Oops! Failed to update user, try again later";
            exit;
        }
}
?>