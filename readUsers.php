<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read usersr</title>
</head>
<body>
<style>
    table, tr,td, th{
        border: 1px solid gray;
        border-collapse: collapse;
        padding: 5px;
    }
</style>
<?php

include_once 'send.php';
    $select = mysqli_query($connect, "SELECT * FROM mis_users") or die("Error");

    echo "<table>
    <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Email</th>
    <th>Gender</th>
    <th>Telephone</th>
    <th>Nationality</th>
    <th>username</th>
    <th>update</th>

    </tr>";

    while($row = mysqli_fetch_assoc($select)){
        echo "<tr>";
        echo "<td>".$row['user_id']."</td>";
        echo "<td>".$row['firstname']." " .$row['lastname']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['gender']."</td>";
        echo "<td>".$row['telephone']."</td>";
        echo "<td>".$row['nationality']."</td>";
        echo "<td>".$row['username']."</td>";
        echo "<td> <a href=useredit.php?user_id=".$row['user_id'].">update</a> </td>";
        
        echo "</tr>";
    }
    echo "</table>"
?>


    
</body>
</html>