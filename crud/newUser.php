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
    $password = $_POST['password'];
    $cpassword = $_POST['c_password'];
    $picture = $_FILES['image'];

    if(empty($firstName) || empty($lastName) || empty($email) || empty($tel) || empty($gender) || empty($nationality) || empty($username) || empty($password)|| empty($cpassword)){
           
        header("Location: form.php");
        $_SESSION['err_s'] = "All fields are required";
        exit;

    }else{

        if(strlen($username) < 4 && strlen($username) < 25 && strlen($firstName) < 4 && strlen($lastName) < 4){
            header("Location: form.php");
            $_SESSION['err_s'] = "Name must be not less than 4 or greater than 25 characters";
            exit;
        }else{

            if(is_numeric($tel) && strlen($tel) >= 10 && strlen($tel) < 15){
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    header("Location: form.php");
                    $_SESSION['err_s'] = "Email is not valid";
                    exit;
                }else{
                    if(strlen($password) < 6 && strlen($password) > 20){
                        header("Location: form.php");
                        $_SESSION['err_s'] = "Password must be more than 6 characters and must not be more than 20";
                        exit;
                    }else{
                        if($password == $cpassword){
                            
                            if(isset($_FILES['image'])){
                                $file_name = $_FILES['image']['name'];
                                $tmp_name = $_FILES['image']['tmp_name'];
                                
                                $img_explode =  explode('.', $file_name);
                                $img_ext = end($img_explode);

                                $extensions = ['jpeg','png','gif','jpg'];

                                if(in_array($img_ext, $extensions)){
                                    $time = time();
                                    $newImageName = $time.$file_name;

                                    if(move_uploaded_file($tmp_name, 'uploads/'.$newImageName)){
                                        $hashedPass = hash('md5', $password);
                                        $addQuery=mysqli_query(
                                            $connect,"INSERT INTO mis_users(firstname, lastname ,gender,telephone, nationality,email, username,password,picture) 
                                            VALUES ('$firstName','$lastName', '$gender','$tel','$nationality','$email', '$username','$hashedPass','$newImageName')");
                                    
                                        if($addQuery){
                                            header("Location: index.php");
                                            exit;
                                        }else{
                                            header("Location: form.php");
                                            $_SESSION['db_error'] = "Oops! Failed to create user, try again later";
                                            exit;
                                        }
                                    }else{
                                        header("Location: form.php");
                                        $_SESSION['db_error'] = "Oops! Failed to create user, try again later";
                                        exit;
                                    }


                                }else{
                                    header("Location: form.php");
                                    $_SESSION['err_s'] = "Only files with .jpg, png gif and jpeg extensions are allowed";
                                    exit;

                                }
                            }else{
                                header("Location: form.php");
                                $_SESSION['err_s'] = "Profile picture is required";
                                exit;
                            }
    

                        }else{
                            header("Location: form.php");
                            $_SESSION['err_s'] = "passwords do not match";
                            exit;
                        }
                    }
    
                }
            }else{
                header("Location: form.php");
                $_SESSION['err_s'] = "Invalid telephone number";
                exit;
            }
        }
   
    }
?>