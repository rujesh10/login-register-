<?php 
require 'config.php';
if(!empty($_SESSION["id"])){
    header("Location: index.php");
}
if(isset($_POST["submit"])){
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];
    $result = mysqli_query($conn,"SELECT * FROM tb_user WHERE usernameemail = '$usernameemail'"); 
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
        if($password == $row["password"]){
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: index.php");
        } 
        else{
            echo
            "<script> alert('Wrong Password');</script>";
        }
    }
    else{
        echo
        "<script> alert('Invalid username or password!');</script>"; 
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
        <h1>Login</h1>
        <form action="" method="post">
            <span>Username</span>
            <input type="text" name="usernameemail" id="usernameemail">
            <br>
            <br>
          <span>Password</span>
            <input type="password" name="password" id="password"><br>
            <br>
            <button type="submit" name="submit">Login</button>
            <br>
            <br>
            <a href="registration.php">Registration</a>
        </form>
    </center>
</body>
</html>