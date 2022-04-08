<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $result = mysqli_query($conn,"SELECT * FROM tb_user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
}
else{
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Index</title>
</head>
<body>
    <!-- <center>
        <h1>Welcome <?php echo $row["name"];?></h1>
        <a href="logout.php">Logout</a>
    </center> -->
    <div class="nav">
        <div class="navbar">
            <h1>Welcome <?php echo $row["usernameemail"];?></h1>
        </div>
             <div class="log">
                <a href="logout.php">Logout</a>
             </div>
        </div>
    </div>  
    <hr>  
</body>
</html>