<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MIS USERS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="index.css">
</head>
<body>

    <div class="container">
        <div class="title">
            <h3>User Management System (MIS)</h3>
        </div>

        <div class="search">
            <form action="search.php" method="get">
                <input type="text" placeholder="search users" name="sQuery">
                <input type="submit" value="Search">
            </form>
        </div>

        <div class="users">
            <div class="user">
                <div class="i fname">First Name</div>
                <div class="i lname">Last Name</div>
                <div class="i phone">Telphone</div>
                <div class="i gender">Gender</div>
                
                <div class="i nt">Nationality</div>
                <div class="i email">Email</div>
                <div class="i username">Username</div>
                <div class="i edit">Edit/Delete</div>

            </div>

            <?php

                include_once "config.php";

                $getQuey = mysqli_query($connect, "SELECT * FROM mis_users ORDER BY user_id DESC");

                if($getQuey){

                while($row = mysqli_fetch_assoc($getQuey)){
                    ?>

                    <div class="user">
                        <div class="i fname"><?php echo $row['firstname'] ?></div>
                        <div class="i lname"><?php echo $row['lastname'] ?></div>
                        <div class="i phone"><?php echo $row['telephone'] ?></div>
                        <div class="i gender"><?php echo $row['gender'] ?></div>
                        <div class="i nt"><?php echo $row['nationality'] ?></div>
                        <div class="i email"><?php echo $row['email'] ?></div>
                        <div class="i username"><?php echo $row['username'] ?></div>
                        <div class="i edit"> <a href=<?php echo "edit.php?id=".$row['user_id'] ?>><i class="fa-solid fa-user-pen"></i></a> <a href=<?php echo "delete.php?id=".$row['user_id'] ?>><i class="fa-solid fa-trash-can"></i></a></div>
                    </div>

                    <?php
                }

                }else{
                    echo "Oops! there wa an error while getting users";
                }


            ?>
             <div class="new">
                <a href="form.php"><i class="fa-solid fa-user-plus"></i> New user</a>
            </div>
        </div>
    
       
    </div>
    
</body>
</html>