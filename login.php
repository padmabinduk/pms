<?php
session_start();
if (isset($_SESSION["login"])) {
   header("Location:index/index.html");
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
<div class="login-box">
        <?php
        if (isset($_POST["login"]))
         {
           $email = $_POST["email"];
           $password = $_POST["password"];
            require_once "database.php";
           # $ema = "SELECT * FROM login WHERE email ='$email'   ";
            #$na = "SELECT * FROM login WHERE full_name  ";

            if( $sql = "SELECT * FROM login WHERE email  = '$email' ")
            {
            $result = mysqli_query($conn, $sql);
            $login = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($login) 
            {
                if (password_verify($password, $login["password"]))
                 {
                    session_start();
                    $_SESSION["login"] = "yes";
                    header("Location: index.php");
                    die();
                }else
                {
                    echo "<div class='alert alert-danger'>INVALID PASSWORD !</div>";
                }
            }
            else
            {
                echo "<div class='alert alert-danger'>INVALID EMAIL OR PASSWORD</div>";
            }
        }
        if( $sql = "SELECT * FROM login WHERE full_name  = '$email' ")
        {
        $result = mysqli_query($conn, $sql);
        $login = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if ($login) 
        {
            if (password_verify($password, $login["password"]))
             {
                session_start();
                $_SESSION["login"] = "yes";
                header("Location: index/index.html");
                die();
            }else
            {
                echo "<div class='alert alert-danger'>INVALID PASSWORD !</div>";
            }
        }
       
    }

        
    }
        ?>
      <form action="login.php" method="post">
        <h4 style="color:white";>
        
        </style><center style="color:white";>PAY ROLL LOGIN<center></h4>
        <div class="form-group">
            <input type="text" placeholder="Enter Email or loginname:" name="email" class="form-control">
        </div>
        <div class="form-group" style="color:white";>
            <input type="password" placeholder="Enter Password:" name="password" class="form-control" id="myinput">
            <input type="checkbox" onclick="myfunction()">show password
        </div>
        <div class="form-btn">
            <input type="submit" value="Login" name="login" class="btn btn-primary">
        </div>
      </form>
     <div style="color:white";><p>FORGOT PASSWORD ! <a href="forgot.php">RESET HERE</a></p></div>
    </div>
    <script>
        function myfunction()
        {
            var x= document.getElementById("myinput")
            if(x.type==="password")
            {
                x.type="text";

            }
            else{
                x.type="password";
            }
        }
        </script>

</body>
</html>