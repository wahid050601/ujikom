<?php
    session_start();
    if (isset($_SESSION["islogin"])) {
        header ("Location: index.php");
        exit;
    }

    require "connection/db.php";
    $conn = mysqli_connect($host, $user, $pass, $db);

    if(isset($_POST["loginbtn"])) {
        
        $user = $_POST["username"];
        $pass = $_POST["password"];

        $result = mysqli_query($conn, "SELECT * FROM admin WHERE username='$user' AND password='$pass'");

        if(mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            $_SESSION['islogin'] = true;
            $_SESSION['isadmin'] = $row['username'];
            echo "<script>Alert('Login Berhasil');</script>";
            header('location:index.php');
            exit;
        }
    }
    $error_login = true;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>

    <!-- CSS -->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="icon/css/all.css" />
    <link rel="stylesheet" href="css/style.css" />

</head>
<body>
    <div class="box-login">
        <div class="container">
            <div class="head-login text-center h2">
                <span class="text-white">LOGIN SISTEM LONDRE</span>
            </div>
            <form action="" method="POST">
                <div class="form-group text-white">
                    <label for=""><i class="fas fa-user"></i> username</label>
                    <input type="text" name="username" id="username" class="form-control">
                </div>
                <div class="form-group text-white">
                    <label for=""><i class="fas fa-lock"></i> password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>

                <button type="submit" name="loginbtn" class="btn btn-light"><i class="fas fa-check"></i> Login</button>
            </form>
        </div>
    </div>





    <!-- JS -->
    <script src="js/jquery-3.2.1.slim.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="icon/js/all.js"></script>

</body>
</html>