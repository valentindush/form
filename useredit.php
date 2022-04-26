<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>

    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container{
            width: 50%;
            margin: auto;
            margin-top: 10%;
        }

        form{
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            border-radius: 20px
        }

        .header{
            text-align: center;
            font-size: 18px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .field {
            margin: auto;
            display: flex;
            justify-content: center;
            position: relative;
        }

        .field input,select{
            margin: auto;
            width: 80%;
            height: 30px;
            margin: 5px;
            outline: none;
            padding: 1px 5px;
        }

        .field input:focus{
            border: 2px solid rgb(74, 73, 73);
        }

        .field.gender label{

            position: absolute;
            left: 10%;
            margin-top: 10px;
        }
        .field.gender input{
            width: auto;
            margin-left: 10px;
        }

        .field.field.gender span{
            margin-top: 6px;
        }
        .field.submit{
            display: flex;
            justify-content: center;
        }

        input[type="submit"]{
            background: rgb(69, 69, 69);
            color: #fff;
            cursor: pointer;
            border: none;
            transition: .3s ease-in;
        }
        input[type="submit"]:hover{
            background: #111;
        }

        

    
        

    </style>
</head>
<body>

<?php

    include_once 'send.php';

    if($connect){

        $user_id = $_GET['user_id'];

        $sql = "SELECT * FROM mis_users WHERE user_id=$user_id";

        $usersQuery = mysqli_query($connect, $sql);

        while($row = mysqli_fetch_assoc($usersQuery)){

            echo '

            <div class="container">
            <form action="update.php" method="post">
                <div class="header">Update account</div>
    
                <div class="field fname">
                    
                    <input type="text" placeholder="Enter first name" name="fname" >
                </div>
                <div class="field lname">
                    
                    <input type="text" placeholder="Enter Last name" name="lname">
                </div>
                <div class="field email">
                    
                    <input type="email" placeholder="Enter your email" name="email">
                </div>
                <div class="field tel">
                   
                    <input type="tel" placeholder="Enter your telephone number" name="tel">
                </div>
                <div class="field gender">
                    <label>Gender</label>
                    <input type="radio" name="gender" value="male">
                    <span>Male</span>
                    <input type="radio" name="gender" value="female">
                    <span>Female</span>
                </div>
                <div class="field nation">
                  
                    <select name="nation" id="">
                        <option value="Rwanda">Rwanda</option>
                        <option value="Uganda">Uganda</option>
                        <option value="Kenya">Kenya</option>
                    </select>
    
                </div>
                <div class="field username">
                  
                    <input type="text" placeholder="Enter your username" name="username">
                </div>
                <div class="field username">
                    
                    <input type="password" placeholder="Enter your Password" name="password">
                </div>
                <div class="field username">
                    
                    <input type="password" placeholder="Enter your username" name="c_password">
                </div>
                <div class="field submit">
                    <input type="submit" value="Update">
                </div>
            </form>
            
        </div>
            ';
        }
    }?>
    
 
    
    
</body>
</html>