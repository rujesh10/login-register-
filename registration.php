

//PHP MILYA XAINA INSERT GARA XUTTAI TABLE BANAYERA DATA BASE MA (REGISTRATION TABLE BANAYRTA) 

<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    header("Location: index.php");
}
if(isset($_POST["submit"])){
    $name= $_POST["name"];
    $usernameemail= $_POST["username"];
    $email= $_POST["email"];
    $password= $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE usernameemail = '$usernameemail' OR email = '$email'");
    if(mysqli_num_rows($duplicate) > 0){
        echo
        "<script> alert('Username or Email has already been taken!');</script>";
    }

    else{   
        if($password == $confirmpassword){
            $query = "INSERT INTO tb_user VALUES('','$name','$usernameemail','$email','$password')";
            mysqli_query($conn,$query);
            echo
            "<script> alert('Registration Sucessfull'); </script>";
        }
        else{
            echo
            "<script> alert('Password doesnt match!');</script>";
        }
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <center>
        <h1>Register!</h1>
        <form action="" method="post" autocomplete="off">
           <span>Name</span>
            <input type="text" name="name" id="name">
            <br>
            <br>               
            <span>Username</span>
            <input type="text" name="username" id="username">
            <br> 
            <br>              
          <span>Email</span>
            <input type="text" name="email" id="email">
            <br>
            <br>   
            
            <span>Password</span>
            <input type="password" name="password" id="password">
            <br>
            <br>   

         <span>Confirmpassword</span>
            <input type="password" name="confirmpassword" id="confirmpassword">
            <br>

            <br>
            <button type="submit" name="submit">Register</button>
            
        </form>
        <br>
        <a href="login.php">Login</a>
    </center>
</body>
</html>