<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update user | MIS</title>


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        .container{
            width: 100%;
            height: 100%;
        }

        .container form{
            width: 25em;
            /* height: 20em; */
            box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            margin: auto;
            padding: 1em;
            border-radius: .5em;
            margin-top: 4em;
            border-top: 1px solid #ccc;
        }

        form .field{
            width: 80%;
            margin: auto;
        }

        form .header{
            text-align: center;
            padding-bottom: 2em;
        }

        .field.name{
            display: flex;
            gap: .4em;
        }

        form input{
            width: 100%;
            height: 30px;
            margin-top: 5px;
            padding: .5em 1em;
            border: 1px solid #a7a7a7;
            outline: none;
        }
        form input:hover{
            border: 2px solid #bb2d74;
        }
        form input:focus{
            border: 2px solid #bb2d74;
        }

        .field.gender{
            display: flex;
            padding-bottom: .5em;
            padding-top: .5em;
        }
        .field.gender input[name="gender"]{
            width: 2em;
            height: 15px;
            cursor: pointer;
        }

        .field select{
            width: 100%;
            height: 30px;
            cursor: pointer;
        }

        form span{
            font-size: .9em;
        }

        .field input[type="submit"]{
            border: none;
            background-color: #bb2d74;
            color: #fff;
            cursor: pointer;
            transition: .3s ease-in;
        }

        .field input[type="submit"]:hover{
            filter: brightness(85%);
        }

        .field.submit{
            padding-bottom: 2.5em;
        }

        .err{
            text-align: center;
            padding-top: 1em;
            color: #fb8282;
            font-size: .9em;
        }
    </style>

    <?php

        session_start();

        $db_error = "";
        $err_s = "";

        if(isset($_SESSION['db_error'])){
            $db_error = $_SESSION['db_error'];
        }
        if(isset($_SESSION['err_s'])){
            $err_s = $_SESSION['err_s'];
        }
    ?>

</head>
<body>

    <div class="container">
        <?php

            include_once 'config.php';

            $userId = $_GET['id'];


            $userQuery = mysqli_query($connect, "SELECT * FROM mis_users WHERE user_id = '$userId'");
            if($userQuery){

                while($row = mysqli_fetch_assoc($userQuery)){
                    ?>

                            <form action="update.php" method="post" enctype="multipart/form-data">
                            <div class="header">Update User</div>

                            <div class="field name">
                                
                                <input type="text" placeholder="Enter first name" name="fname" value=<?php echo $row['firstname']; ?>>
                                <input type="text" placeholder="Enter Last name" name="lname"value=<?php echo $row['lastname']; ?>>
                            </div>
                            <div class="field email">
                                
                                <input type="email" placeholder="Enter your email" name="email" value=<?php echo $row['email']; ?>>
                                <input type="text" name="user_id" hidden value=<?php echo $row['user_id']; ?>>
                            </div>
                            <div class="field tel">
                            
                                <input type="tel" placeholder="Enter your telephone number" name="tel" value=<?php echo $row['telephone']; ?>>
                            </div>
                            <div class="field">
                                <label>Gender</label>
                            </div>
                            <div class="field gender">
                                
                                <input type="radio" name="gender" value="male" <?php  if($row['gender'] == "male"){echo "checked";} ?>>
                                <span>Male</span>
                                <input type="radio" name="gender" value="female" <?php  if($row['gender'] == "female"){echo "checked";} ?>>
                                <span>Female</span>
                            </div>
                            <div class="field nation">
                            
                                <select name="nation" id="">
                                    <!-- <option disabled selected>-- Select country --</option> -->
                                    <option value="Rwanda">Rwanda</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="Kenya">Kenya</option>
                                </select>

                            </div>
                            <div class="field username">
                            
                                <input type="text" placeholder="Enter your username" name="username" value=<?php echo $row['username']; ?>>
                            </div>

                            <div class="field file">
                                <span>Change Prifile picture</span>
                                <input type="file" name="image">
                            </div>
                            
                            <div class="err"><?php echo $db_error . $err_s; ?></div>
                            <div class="field submit">
                                <input type="submit" value="Update user">
                            </div>
                        </form>


                    <?php
                }
                
            }
        ?>
       
    </div>
    
</body>
</html>