<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form action="forgot.php" method="post">
<div class="login-box">




<?php

if (isset($_POST["login"]))
         {
           $email = $_POST["email"];
         
            require_once "database.php";
        if( $sql = "SELECT * FROM user WHERE email  = '$email' ")
        {
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if ($user) 
        {
            if ($email == $user["email"])
             {
               
                header("Location: forgotchange.php");
            }else
            {
                echo "<div class='alert alert-danger'>INVALID email !</div>";
            }
        }
        else
        {
            echo "<div class='alert alert-danger'>INVALID EMAIL</div>";
        }
    }}?>


<h2 class="text-center" style="color:white"; >Forgot Password</h2>
                    <p style="color:white"; class="text-center">Enter your email address</p>


                    <input class="form-control" type="email" name="email" placeholder="Enter email address">
                    <input class="btn btn-primary" style= "margin-left:91px ; margin-top:60px"; type="submit" name="login" value="Continue">

</form>




</div>
</body>
</html>